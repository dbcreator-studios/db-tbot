<?php 

$token = "1283875359:AAGN5ztnpGFmT5vw4HV_l5GKJG99GkVRYYI";
$url = "https://api.telegrarm.org/bot" . $token;
$telegram = json_decode(file_get_contents("php://input"), TRUE);
$chatid = $telegram['message']['chat']['id'];
$message = $telegram['message']['text'];

file_get_contents($url . "/sendMessage?chat_id=" . $chatid . "&text=Halo Master");


?>