<?php
namespace Bot;

use Bot\Types\User;
use Bot\Types\Message;
use Api\Botan;

set_time_limit(0);


$content = file_get_contents("php://input");
if($content == null) die; //Otherwise this page in browser will show an error. Bot will constantly try to send message to undefined chat ($chatID doesn't exist)

/**
 * Class Bot.
 * @package Bot
 */
class Bot
{
    /**
     * Bot Token.
     * @var string
     */
    protected $token = BOTTOKEN;

    /**
     * Botan tracker.
     * @source botan.io
     * @var Api\Botan
     */
    protected $tracker;

    /**
     * Bot constructor.
     * @param string|null $trackerToken Yandex AppMetrica api
     */
    public function __construct($trackerToken = null)
    {
        if($trackerToken) $this->tracker = new Botan($trackerToken);
    }

    /**
     * @param string $method
     * @param array|null $data
     * @return bool
     */
    public function call($method, array $data = null)
    {
        $httpdata = http_build_query($data);
        $options = ['http' =>
            [
                'method'    => 'POST',
                'header'    => 'Content-type: application/x-www-form-urlencoded',
                'content'   => $httpdata
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
     * Use this method to send messages.
     *
     * @param int $chatID
     * @param string $text
     * @param bool $disablePreview
     * @param int|null $replyToMessageID
     * @param Types\ReplyKeyboardMarkup|Types\ReplyKeyboardHide|Types\ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @return Types\Message
     */
    public function sendMessage(
        $chatID,
        $text,
        $parseMode = null,
        $disablePreview = null,
        $replyToMessageID = null,
        $replyMarkup = null,
        $disableNotification = false
    ){
        return Message::fromResponse($this->call('sendMessage', [
            'chat_id'               => $chatID,
            'text'                  => $text,
            'parse_mode'            => $parseMode,
            'disablePreview'        => $disablePreview,
            'reply_to_message_id'   => (int) $replyToMessageID,
            'reply_markup'          => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJSON(),
            'disable_notification'  => (bool) $disableNotification
        ]));
    }

    /**
     * @return mixed
     */
    public function getMe()
    {
        return User::fromResponse($this->call('getMe'));
    }

    /**
     * Use this method to set the Webhook.
     *
     * @param string $url
     * @param string|null $certificate
     * @return bool
     */
    public function setWebhook($url = '', $certificate = null)
    {
        return $this->call('setWebhook', [
            'url'           => $url,
            'certificate'   => $certificate
        ]);
    }

    /**
     * Use this method to send location.
     *
     * @param int $chatID
     * @param float $latitude
     * @param float $longitude
     * @param int|null $replyToMessageID
     * @param Types\ReplyKeyboardMarkup|Types\ReplyKeyboardHide|Types\ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @return Types\Message
     */
    public function sendLocation(
        $chatID,
        $latitude,
        $longitude,
        $replyToMessageID = null,
        $replyMarkup = null,
        $disableNotification = false
    ){
        return Message::fromResponse($this->call('sendLocation', [
            'chat_id'               => $chatID,
            'latitude'              => $latitude,
            'longtitude'            => $longitude,
            'reply_to_message_id'   => $replyToMessageID,
            'reply_markup'          => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJSON(),
            'disable_notification'  => $disableNotification
        ]));
    }

    /**
     * Use this method to send photos.
     *
     * @param int $chatID
     * @param string $photo
     * @param string|null $caption
     * @param int|null $replyToMessageID
     * @param Types\ReplyKeyboardMarkup|Types\ReplyKeyboardHide|Types\ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @return Types\Message
     */
    public function sendPhoto(
        $chatID,
        $photo,
        $caption = null,
        $replyToMessageID = null,
        $replyMarkup = null,
        $disableNotification = null
    ){
        return Message::fromResponse($this->call('sendPhoto', [
            'chat_id'               => $chatID,
            'photo'                 => $photo,
            'caption'               => $caption,
            'reply_to_message_id'   => $replyToMessageID,
            'reply_markup'          => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJSON(),
            'disable_notification'  => $disableNotification
        ]));
    }
}
