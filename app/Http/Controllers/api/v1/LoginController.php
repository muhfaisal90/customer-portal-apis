<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function login( Request $request ){

        // validate all required fields
        $login = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        // if validation or authentication filed return failed response
        if ( !Auth::attempt($login)){
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => 'Invalid Login Credentials.',
                'responseMessage' => 'Login Not Successful, Please try again.',
                'userData' => '',
            ]);
        }

        // creating a token using laravel "passport"
        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        // return success response with $accessToken which is use for further request(s)
        return response()->json([
            'isSuccessful' => 'Yes',
            'errorMessage' => '',
            'responseMessage' => 'Login Successful',
            'userData' => Auth::user(),
            'access_token' => $accessToken
        ]);
    }
}
