<?php
namespace Bot\Types;

/**
 * Class Chat.
 * @package Bot\Types
 */
class Chat
{
    /**
     * Unique identifier of the chat.
     * @var int
     */
    protected $ID;

    /**
     * Type of the chat.
     * @var string
     */
    protected $CType;

    /**
     * @param int $ID
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
     * @param string $CType
     */
    public function setCType($CType)
    {
        $this->CType = $CType;
    }

    /**
     * @return string
     */
    public function getCType()
    {
        return $this->CType;
    }

}