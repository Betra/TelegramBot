<?php
require('constants.php');
class Command
{
    /**
     * @deprecated Will return menu soon
     */
    public static function start()
    {
        return file_get_contents(KUDAGO_API."/locations/?lang=ru");
    }

    public static function chooseCity()
    {
        $content = file_get_contents(KUDAGO_API."/locations/?lang=ru");
        $cities = json_decode($content, TRUE);
        return $cities['name'];

    }
}