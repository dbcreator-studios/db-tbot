<?php
$token = "1283875359:AAGN5ztnpGFmT5vw4HV_l5GKJG99GkVRYYI";
$url = "https://api.telegram.org/bot" . $token;
$telegram = json_decode(file_get_contents("php://input"), TRUE);
$chatid = $telegram['message']['chat']['id'];
$message = $telegram['message']['text'];
file_get_contents($url . "/sendMessage?chat_id=" . $chatid . "&text=Halo Master " . $telegram['message']['chat']['first_name'] . " " . $telegram['message']['chat']['last_name']);
?>

<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-firestore.js"></script>
<script>
    firebase.initializeApp({
        apiKey: "AIzaSyBMJLEFC-XqMAQlZYDe5ZYtPqqlTXAdWqg",
        authDomain: "db-tbot.firebaseapp.com",
        databaseURL: "https://db-tbot.firebaseio.com",
        projectId: "db-tbot",
        storageBucket: "db-tbot.appspot.com",
        messagingSenderId: "680265122937",
        appId: "1:680265122937:web:232a4b0b7232112c7cc0a8",
        measurementId: "G-EJ8LWJ7X1C"
    });
    firebase.analytics();
    const db = firebase.firestore();
    db.collection('Test').add({'telegram': <?= $message ?>});
</script>