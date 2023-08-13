<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;

use Illuminate\Http\Request;

class PassportController extends Controller
{

    /**
     * Register a new user
     *
     * @param App\Http\Requests\RegisterRequest $request
     * @return response user details and access_token
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->cart()->create();

        $token = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token'=> $token]);
    }

    /**
     * log in.
     *
     * @param App\Http\Requests\LoginRequest $request
     * @return response user details and access_token
     */
    public function login(LoginRequest $request)
    {
        $loginData = $request->all();

        if(!auth()->attempt($loginData))
        {
            return response(['message'=> 'Invalid Crediantials']);
        }

        $token = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token'=> $token]);
    }


    /**
     * logout current user
     *
     * @param Illuminate\Http\Request $requst
     * @return object of success message
     */
    public function logout(Request $request){

        $userTokens = $request->user()->token();

        $userTokens->revoke();

        return ['message' => 'user successfully logged out.'];
    }
}
