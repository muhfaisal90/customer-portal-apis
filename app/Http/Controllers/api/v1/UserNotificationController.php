<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\api\v1\UserNotification;
use App\User;
use Validator;
use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    /**
     * API endpoint get notifications.
     *
     * @param Request $request
     * @return array
     */
    public function getNotifications( Request $request){

        // check if user_id requested
        if ($request->user_id){

            // validate user_id.
            $validator = Validator::make($request->all(), [
                'user_id'           => 'required|int',
            ]);

            // if issue in validation stop here and send failed response.
            if ($validator->fails()) {
                return response()->json([
                    'isSuccessful' => 'No',
                    'errorMessage' => $validator->errors(),
                    'responseMessage' => 'Request Not Successful, Please try again.',
                    'notificationData' => '',
                ]);
            }

            // get user_id from request.
            $user_id = $request->user_id;

            // check if user_id exists in DB
            if (User::where('id', '=', $user_id)->count() == 0) {
                return response()->json([
                    'isSuccessful' => 'No',
                    'errorMessage' => 'Invalid User Id',
                    'responseMessage' => 'Request Not Successful, Please try again.',
                    'notificationData' => '',
                ]);
            }

            // get requested user data from user notifications table
            $notification_data = UserNotification::where('user_id',$user_id)->get();

        }else{

            // get all users data from user notifications table
            $notification_data = UserNotification::get();
        }


        // if no data found then stop here and send response
        if ($notification_data->isEmpty()){
            return response()->json([
                'isSuccessful' => 'Yes',
                'errorMessage' => '',
                'responseMessage' => 'Notifications not Found. ',
                'notificationData' => '',
            ]);

        }

        // success response with notifications.
        return response()->json([
            'isSuccessful' => 'yes',
            'errorMessage' => '',
            'responseMessage' => 'Request Successful.',
            'notificationData' => $notification_data,
        ]);
    }

}
