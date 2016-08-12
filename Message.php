<?php

/**
 * For security reasons 'constants.php' were hide via .gitignore
 * @internal
 * @const BOTTOKEN Contains Telegram Bot's token
 * @const BOTSITE Contains http path to the Bot
 */
require('constants.php');

<<<<<<< HEAD:Message.php
=======
define("BOTTOKEN","Bot ID");
define("BOTSITE","https://api.telegram.org/bot".BOTTOKEN."/");
>>>>>>> origin/master:webhook.php

class Message
{

    private $chatID;    /** @var  int | null Telegram Chat ID. */
    private $text;      /** @var string | null Message.*/

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
<<<<<<< HEAD:Message.php
}
=======
}
$content = file_get_contents("php://input");
$obj = new Message($content);
$com = $obj->checkCommand();
$obj->send($com);
>>>>>>> origin/master:webhook.php
