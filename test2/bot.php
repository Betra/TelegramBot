<?php

namespace Bot;

/**
 * Class Bot
 * @package Bot
 */
class Bot
{
    /**
     * Bot token.
     * @var string
     */
    protected $token = BOTTOKEN;

    /**
     * Botan.io tracker. Not yet
     * @var \Api\Botan
     */
    protected $tracker;

    public function __construct($tracker = null)
    {
        if($tracker) $this->tracker = new \Api\Botan($tracker);
    }

    /**
     * Sends the POST request. Mostly used probably
     * @param string $method
     * @param array|null $data
     * @return bool
     */
    private function call($method, array $data = null)
    {
        $httpData = http_build_query($data);
        $options = ['http' =>
            [
                'method'    => 'POST',
                'header'    => 'Content-type: application/x-www-form-urlencoded',
                'content'   => $httpData
            ]
        ];
        $context = stream_context_create($options);
        $post = file_get_contents(BOTSITE.$method, false, $context);
        if($post)
            return true;
        else
            return false;
    }

    /**
     * @param int $chatID
     * @param string $text
     * @param null $parseMode
     * @param bool $disablePreview
     * @param int|null $replyToMessageId
     * @param Types\ReplyKeyboardMarkup|null $replyMarkup
     * @param bool $disableNotification
     * @return Types\Message
     */
    public function sendMessage(
        $chatID,
        $text,
        $parseMode = null,
        $disablePreview = null,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = null
    ){
        return $this->call(__METHOD__, [
            'chat_id' => $chatID,
            'text' => $text,
            'parse_mode' => $parseMode,
            'disable_preview' => $disablePreview,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? null : jsonify($replyMarkup),// TODO: jsonify();
            'disable_notification' => (bool) $disableNotification
        ]);
    }
}