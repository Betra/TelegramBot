<?php
namespace Bot\Types;


/**
 * Class User
 * @package Bot\Types
 */
class User implements TypeInterface
{
    /**
     * Unique user's identifier
     * @var int
     */
    protected $ID;

    /**
     * First Name of the user
     * @var string
     */
    protected $firstName;

    /**
     * Login of the user
     * @var string
     */
    protected $username;

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
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
}