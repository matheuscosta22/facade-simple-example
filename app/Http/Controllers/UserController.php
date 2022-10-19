<?php

namespace App\Http\Controllers;

//It's possible use facade like this
//use Facades\App\Services\UserService;

use App\Facades\UserServiceFacade;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $token = UserServiceFacade::login($request->input('email'), $request->input('password'));

        if ($token){
            return response()->json($token);
        }

        return response()->json([], Response::HTTP_UNAUTHORIZED);
    }
}
