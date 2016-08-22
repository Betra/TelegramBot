<?php
/**
 * @author Ivan Dorofeev <IDDorofeev@yahoo.com>
 * Bot works with WebHook
 */
set_time_limit(0);

require('Message.php');
$content = file_get_contents("php://input");
if($content == null) die; //Otherwise this page in browser will show an error. Bot will constantly try to send message to undefined chat ($chatID doesn't exist)

$message = new Message($content);
unset($content);

$obj = (string) $message->searchCommand();
$message->send($obj);
