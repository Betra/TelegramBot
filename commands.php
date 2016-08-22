<?php
require('constants.php');
class Command
{
    public static function start()
    {
        return file_get_contents(KUDAGO_API."/locations/?lang=ru");
    }
}