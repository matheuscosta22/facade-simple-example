<?php

namespace App\Facades;

use App\Services\UserService;
//use Illuminate\Support\Facades\Facade;

class UserServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserService::class;
    }
}
