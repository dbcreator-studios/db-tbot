<?php
define('token', "1283875359:AAGN5ztnpGFmT5vw4HV_l5GKJG99GkVRYYI");
define('url', "https://api.telegram.org/bot" . token . "/");
$telegram = json_decode(file_get_contents("php://input"), TRUE);
$chatid = $telegram['message']['chat']['id'];
$message = $telegram['message']['text'];
$cbid = $telegram['callback_query']['from']['id'];
$cbdata = $telegram['callback_query']['data'];

function callback($up) {
    return $up["callback_query"];
}

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

function inlineKeyboard($menud , $chatid, $text) {
    $menu = $menud;
    $d2 = array(
        "inline_keyboard" => $menu,
    );
    $d2 = json_encode($d2);
    return apiReq("sendmessage?chat_id=$chatid&text=$text&parse_mode=Markdown&reply_markup=$d2");
}

if($message == "/start") {
    send($chatid, "Halo Master");
}
if($message == "/keyboard") {
    $keyboard = [
        ["Inline", "Inline2"],
        ["Inline3", "Inline4"],
    ];
    $key = array(
        "resize_keyboard" => true,
        "keyboard" => $keyboard,
    );
    keyboard($key, $chatid, "Halo Master");
}
if($message == "Inline") {
    $but = array(array(array("text" => "Button 1", "url" => "www.google.com"),),);
    inlineKeyboard($but, $chatid, "Inline");
}

if($message == "Inline2") {
    $but = array(array(array("text" => "Button 1", "url" => "www.google.com"), array("text" => "Button 2", "url" => "www.youtube.com"),),);
    inlineKeyboard($but, $chatid, "Inline2");
}

if($message == "Inline3") {
    $but[] = array(array("text" => "Button 1", "url" => "www.google.com"),);
    $but[] = array(array("text" => "Button 2", "url" => "www.google.com"),);
    inlineKeyboard($but, $chatid, "Inline3");
}

if($message == "Inline4") {
    $but[] = array(array("text" => "Button 1", "callback_data" => "ciao1"),array("text" => "Button 2", "callback_data" => "ciao2"),);
    $but[] = array(array("text" => "Button 3", "callback_data" => "ciao3"),array("text" => "Button 4", "callback_data" => "ciao4"),);
    inlineKeyboard($but, $chatid, "Inline4");
}

if(callback($telegram)) {
    if($cbdata == "ciao1"){
        send($cbid, "Yahoo!");
    }
    if($cbdata == "ciao2"){
        send($cbid, "Yahoo!!");
    }
    if($cbdata == "ciao3"){
        send($cbid, "Yahoo!!!");
    }
    if($cbdata == "ciao4"){
        send($cbid, "Yahoo!!!!");
    }
}

?>