<?php
define('token', "1283875359:AAGN5ztnpGFmT5vw4HV_l5GKJG99GkVRYYI");
define('url', "https://api.telegram.org/bot" . token . "/");
$telegram = json_decode(file_get_contents("php://input"), TRUE);
$chatid = $telegram['message']['chat']['id'];
$message = $telegram['message']['text'];

function apiReq($query) {
    return file_get_contents(url.$query);
}

function send($chatid, $text) {
    return apiReq("sendmessage?chat_id=$chatid&text=$text");
}

function keyboard($tasti, $chatid, $text) {
    $tasti2 = $tasti;
    $tasti3 = json_encode($tasti2);
    apiReq("sendmessage?chat_id=$chatid&text=$text&parse_mode=Markdown&reply_markup=$tasti3");
}

if($message == "/start") {
    send($chatid, "Halo Master");
}
if($message == "/keyboard") {
    $keyboard = [
        ["A1", "A2"],
        ["A3", "A4"],
    ];
    $key = array(
        "resize_keyboard" => true,
        "keyboard" => $keyboard,
    );
    keyboard($key, $chatid, "Halo Master");
}

?>

<!-- <script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-app.js"></script>
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
</script> -->