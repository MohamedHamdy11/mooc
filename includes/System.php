<?php


class System
{
    private static $objects;


    public static function Set($Key,$Value)
    {
        self::$objects[$Key] = $Value;
    }

    public static function Get($Key)
    {
        if(isset(self::$objects[$Key]))
            return self::$objects[$Key];

        return null;
    }

}