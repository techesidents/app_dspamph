//firebase-init.js

// Import Firebase modules
import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.3.0/firebase-app.js';
import { getFirestore } from 'https://www.gstatic.com/firebasejs/9.3.0/firebase-firestore.js';

// Initialize Firebase
const firebaseConfig = {
    apiKey: 'AIzaSyDzWEEsqSt2tAHEFQmShcoLfMjjXNgOyMY',
    authDomain: 'phone-firebase-7cefc.firebaseapp.com',
    projectId: 'phone-firebase-7cefc',
};

// Initialize Firebase App
const app = initializeApp(firebaseConfig);

// Initialize Firestore
export const firestore = getFirestore(app);

export default app;