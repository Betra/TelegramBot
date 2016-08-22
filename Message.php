<?php

/**
 * For security reasons 'constants.php' were hide via .gitignore
 * @internal
 * @const BOTTOKEN Contains Telegram Bot's token.
 * @const BOTSITE Contains http path to the Bot.
 * @const WEATHER_API Contains url to the JSON string.
 * @const KUDAGO_API Contains url  to the JSON string, properties are needed.
 */
require('constants.php');
require('commands.php'); /** class Command */

class Message
{
    private $chatID;    /** @var  int | null Telegram Chat ID. */
    public $text;      /** @var string | null Message.*/

    /**
     * @param $content
     * Takes the ID  and the Message from JSON string
     */
    public function __construct($content)
    {
        $update = json_decode($content, TRUE);
        $message = $update['message'];
        $this->chatID = $message['chat']['id'];
        $this->text = $message['text'];
    }

    /**
     * @return string Response
     */
    public function searchCommand()
    {
        switch($this->text) {
            case '/start':
                return Command::start(); break;
            case 'Выбрать город':
                return Command::chooseCity(); break;
            default:
                return 'Sorry, sir'; break;
        }
    }

    /**
     * @param $message string Response
     */
    public function send($message)
    {

        $data = [
            'chat_id'   => $this->chatID,
            'text'      => $message
        ];

        $opts = ['https' =>
            [
                'method'    => 'POST',
                'header'    => 'Content-type: application/x-www-form-urlencoded',
                'content'   => $data
            ]
        ];
       // file_get_contents(BOTSITE."sendmessage?chat_id=".$this->chatID."&text=".$message);
       $context = stream_context_create($opts);
        file_get_contents(BOTSITE.'sendmessage', false, $context);
    }
}