<?php
set_time_limit(0);
$content = file_get_contents("php://input");
if(is_null($content)) die;

require('Bot.php');

$update = json_decode($content);
$message = $update['message'];
$chatID = $message['chat']['id'];
$text = $message['text'];

$bot = new \Bot\Bot;
$bot->sendMessage($chatID,$text);
