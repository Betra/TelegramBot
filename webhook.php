<?php
/**
 * @author Ivan Dorofeev <IDDorofeev@yahoo.com>
 * @version 0.1
 *
 *
 */
set_time_limit(0);

define("BOTTOKEN","267292241:AAHq1lS36feGwAsD5_ko77zKMllh9ZVlaDg");
define("BOTSITE","https://api.telegram.org/bot".BOTTOKEN."/");

class Message
{
    /** @var  int | null Telegram Chat ID. */
    private $chatID;
    /** @var string | null Message.*/
    private $text;

    /**
     * Message constructor.
     * @param $content
     * Takes the the ID  and Message from JSON
     */
    public function __construct($content)
    {
        $update = json_decode($content, TRUE);
        $message = $update['message'];
        $this->chatID = $message['chat']['id'];
        $this->text = $message['text'];

    }

    /**
     * @return string Command
     * @deprecated That's just a poor beginning, okay?
     */
    public function checkCommand()
    {
       switch($this->text) {

           case '/begin': return 'Good morning, sir'; break;
           default: return 'Sorry, sir'; break;
       }
    }

    /**
     * @param $message string Answer
     * Sends the bot's answer to the client
     */
    public function send($message)
    {
        file_get_contents(BOTSITE."/sendmessage?chat_id=".$this->chatID."&text=".$message);
    }
}
$content = file_get_contents("php://input");
$obj = new Message($content);
$com = $obj->checkCommand();
$obj->send($com);