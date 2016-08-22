<?php
/**
 * @author Ivan Dorofeev <IDDorofeev@yahoo.com>
 * Bot works with WebHook
 */
set_time_limit(0);

/**
 * @todo Incoming message (1) -> Checking for special char '/'(2) -> Looking for the command (3) -> Complete the requested task (4) -> Response(5) !
 */


require('Message.php');
$content = file_get_contents("php://input");
$message = new Message($content);
unset($content);

//if(!Message::isRequest($message->text)) die; // Not required

$obj = (string) $message->searchCommand();
$message->send($obj);
