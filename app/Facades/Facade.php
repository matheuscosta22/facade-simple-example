<?php

namespace App\Facades;

abstract class Facade
{
    public static function __callStatic($methodName, $arguments)
    {
        $instance = app(static::getFacadeAccessor());
        return $instance->$methodName(...$arguments);
    }

    protected static function getFacadeAccessor(){}
}
