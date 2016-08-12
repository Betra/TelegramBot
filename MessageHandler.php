<?php
/**
 * @author Ivan Dorofeev <IDDorofeev@yahoo.com>
 * Bot works with WebHook
 */
set_time_limit(0);

/**
 * @todo Incoming message (1) -> Checking for special char '/'(2) -> Looking for that command (3) -> Complete the requested task (4) -> Response(5) !
 */

/**
 * For security reasons 'constants.php' were hide via .gitignore
 * @internal
 * @const BOTTOKEN Contains Telegram Bot's token
 * @const BOTSITE Contains http path to the Bot
 */
require('constants.php');


require('Message.php');
$content = file_get_contents("php://input");
$message = new Message($content);
if(!Message::isRequest($message->text)) {
    die;
} else {
$obj = $message->checkCommand();
$message->send($obj);
}