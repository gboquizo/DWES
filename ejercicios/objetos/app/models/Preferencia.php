<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 16/11/2018
 * Time: 8:29
 */
namespace App\Models;
class Preferencia
{
    public static $timezone;
    public static $language;
    public static $music;
    public static $color;
    private static $init = false;

    public static function init()
    {
        if (!self::$init) {
            $prefs['timezone'] = "Europe/Madrid";
            $prefs['language'] = "es";
            $prefs['music'] = "on";
            $prefs['color'] = "negro";

            self::$timezone = $prefs['timezone'];
            self::$language = $prefs['language'];
            self::$music = $prefs['music'];
            self::$color = $prefs['color'];

            self::$init = true;
        }
    }

}