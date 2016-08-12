<?php
/**
 * @author Ivan Dorofeev <IDDorofeev@yahoo.com>
 */
set_time_limit(0);

/**
 * @todo Incoming message (1) -> Checking for special char '/'(2) -> Looking for that command (3) -> Complete the requested task (4) -> Response(5) !
 */
require('Message.php');
$content = file_get_contents("php://input");
$message = new Message($content);



$com = $message->checkCommand();
$obj->send($com);