<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegistrationController extends Controller
{

    /**
     * @param Request $request
     * @return array
     */
    public function register( Request $request){

        // validate all required fields
        $validator = Validator::make($request->all(), [
            'role_id'           => 'required|int',
            'user_first_name'   => 'required|string',
            'user_last_name'    => 'required|string',
            'user_company'      => 'required|string',
            'user_email'        => 'required|string|unique:users,user_email',
            'username'          => 'required|string',
            'password'          => 'required|string',
        ]);

        // if issue in validation stop here and send failed response
        if ($validator->fails()) {
            //return response(['message' => $validator->errors()]);
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => $validator->errors(),
                'responseMessage' => 'Registration Not Successful, Please try again.',
                'data' => '',
            ]);
        }

        // get all required fields data from $request
        $data = $request->all();

        // calling function and sending data array to function for insertion new entry in users table
        $check = $this->create($data);

        // check and response if user has been created successfully
        if ($check){
            return response()->json([
                'isSuccessful' => 'Yes',
                'errorMessage' => '',
                'responseMessage' => 'Registration Successful',
                'data' => '',
            ]);

         // something went wrong need to debug in this case
        }else{
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => 'Unknown',
                'responseMessage' => 'Registration Not Successful, Please try again.',
                'data' => '',
            ]);
        }

    }

    /**
     * @param $data
     * @return array
     */
    public function create(array $data)
    {
        return User::create([
            'role_id'           => $data['role_id'],
            'user_first_name'   => $data['user_first_name'],
            'user_last_name'    => $data['user_last_name'],
            'user_company'      => $data['user_company'],
            'user_email'        => $data['user_email'],
            'username'          => $data['username'],
            'password'          => Hash::make($data['password']),
        ]);
    }

}
