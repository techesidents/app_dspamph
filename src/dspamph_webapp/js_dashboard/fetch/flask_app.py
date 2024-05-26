# flask_app.py

import firebase_admin
from firebase_admin import credentials, firestore, auth
from flask_cors import CORS, cross_origin
from flask import Flask, jsonify, request
import os
import json
from datetime import datetime

# Initialize Firebase Admin SDK with service account key
cred = credentials.Certificate('C:/xampp/htdocs/web_dashboard/js_dashboard/fetch/serviceAccountKey.json')
firebase_admin.initialize_app(cred)

# Get a reference to your Firestore database
db = firestore.client()

# Specify the collection to retrieve data from
collection_ref = db.collection('spam_reports')

# Flask app
app = Flask(__name__)
CORS(app, resources={r"/get_firestore_data": {"origins": "http://localhost"}})  # Allow requests from http://localhost

# Firebase Auth
auth = firebase_admin.auth

# Counter for tracking unique numbers
global_counter = 1

class CustomJSONEncoder(json.JSONEncoder):
    def default(self, obj):
        if isinstance(obj, datetime):
            return obj.isoformat()
        return super().default(obj)

app = Flask(__name__)
app.json_encoder = CustomJSONEncoder

@app.route('/get_firestore_data', methods=['GET'])
@cross_origin(origin='http://localhost')
def get_firestore_data():

    global global_counter

    # Check if the local JSON file exists
    local_json_file_path = 'C:/xampp/htdocs/web_dashboard/js_dashboard/fetch/local_data.json'

    if os.path.exists(local_json_file_path):
        # Read data from the local JSON file
        with open(local_json_file_path, 'r') as file:
            data = json.load(file)
    else:
        # Fetch data from Firestore if the local JSON file does not exist
        data = [doc.to_dict() for doc in collection_ref.stream()]

        # Save the fetched data to the local JSON file
        with open(local_json_file_path, 'w') as file:
            json.dump(data, file, indent=2, cls=CustomJSONEncoder)  # Use the custom encoder

        # Add a unique identifier (spamID) for each entry
        for entry in data:
            date_received = get_date_from_entry(entry)
            if date_received:
                entry['spamID'] = generate_unique_id(date_received)
                global_counter += 1

    return jsonify(data)

def generate_unique_id(date_received):
    global global_counter  # Access the global counter
    # Formulate the spamID with a unique and incremental number
    spam_id = f"{date_received}-{global_counter}"

    return spam_id

def get_date_from_entry(entry):
    # Helper function to extract the date from 'date_time_received'
    date_time_received = entry.get('date_time_received', '')

    if date_time_received and isinstance(date_time_received, str):
        # Convert non-empty string to datetime object
        try:
            date_time_received = datetime.strptime(date_time_received, "%Y-%m-%d")
        except ValueError:
            # Handle invalid date format gracefully
            return ''

    return date_time_received.strftime("%Y-%m-%d") if date_time_received else ''

# Add the filter_data_by_mobile_number function
def filter_data_by_mobile_number(data, mobile_number):
    # Implement the logic to filter data based on the mobile number
    filtered_data = [entry for entry in data if entry.get('spam_sender_number', '').startswith(mobile_number)]
    return filtered_data

@app.route('/search_mobile_number', methods=['GET'])
@cross_origin(origin='http://localhost')
def search_mobile_number():

    user_request = request

    mobile_number = user_request.args.get('number')

    # If successful, proceed to fetch data
    data = [doc.to_dict() for doc in collection_ref.stream()]

    # Check if mobile_number query parameter is present
    if mobile_number:
        # Filter data based on mobile number
        filtered_data = filter_data_by_mobile_number(data, mobile_number)
        return jsonify(filtered_data)
    else:
        return jsonify({'error': 'Mobile number parameter is missing'}), 400

if __name__ == '__main__':
    app.run(debug=True)
