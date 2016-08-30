<?php
namespace Bot\Types;
use Bot\Types\TypeInterface;

/**
 * Class Message
 * @package Bot\Types
 */
class Message implements TypeInterface
{
    /**
     * Unique indentifier for message
     * @var int
     */
    protected $ID;

    /**
     * Text of the message
     * @var string
     */
    protected $text;

    /**
     * @param $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return int
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}