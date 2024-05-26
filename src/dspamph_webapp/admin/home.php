<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spam Message Counter</title>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-firestore.js"></script>
    <style>
        body {
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            height: 100vh;
        }

        .container {
            width: 100%;
            height: 100%;
           
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* padding: 10px;
            padding-left: 20px; */
        }

        .welcome-container {
            text-align: center;
            width: 100%;
            background-color: #f9ddb1;

            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 5px;
        }

        .counter-container {
            width: 50%;
            height: 70%;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            box-sizing: border-box;
            text-align: center;
            margin-bottom: 20px;
        }

        #counter {
            font-size: 50px; /* Adjust the font size as needed */
        }

        .D-SpamPH-container {
            width: 50%;
            height: 70%;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            box-sizing: border-box;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-container">
            <h1>Welcome to D-SpamPH</h1>
            <hr>
        </div>

        <div class="counter-container">
            <!-- Spam Counter -->
            <h2>Spam Message Recorded</h2>
            <p id="counter">Counting...</p>
        </div>

        <div class="D-SpamPH-container">
            <img src="../uploads/logo.png" width="120px" height="120px">
            <h1>D-Spam Philippines</h1>
            <p>Our system is dedicated to addressing and monitoring spam incidents specifically within the Philippines. 
                D-SpamPH offers comprehensive solutions by furnishing authorities and other entities with detailed spam logs collected nationwide.</p>
        </div><br>
    </div>










<!--paste the codes above to the new directory -->




    
   <script>
    fetch('http://127.0.0.1:5000/get_firestore_data')
        .then(response => response.json())
        .then(data => {
            // Assuming the count is the last item in the array
            const spamDataCount = data[data.length - 1].count;

            if (spamDataCount !== undefined) {
                document.getElementById("counter").innerText = spamDataCount;
            } else {
                console.error('Count is undefined in the data:', data);
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
</script>

</body>
</html>
