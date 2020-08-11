<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\api\v1\UserFileDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class UserFileDetailController extends Controller
{

    /**
     * API endpoint soft delete file.
     *
     * @param Request $request
     * @return boolean
     */
    public function trashFile( Request $request){

        // validate file_id
        $validator = Validator::make($request->all(), [
            'file_id'           => 'required|int',
        ]);

        // if issue in validation stop here and send failed response
        if ($validator->fails()) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => $validator->errors(),
                'responseMessage' => 'Request Not Successful, Please try again.',
                'isDeleted' => 'No',
            ]);
        }


        // get file_id from request
        $file_id = $request->file_id;

        // check if file_id exists in DB
        if (UserFileDetail::where('id', '=', $file_id)->count() == 0) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => 'Invalid File Id or File Already Trashed',
                'responseMessage' => 'Request Not Successful, Please try again.',
                'isDeleted' => 'No',
            ]);
        }

        // filter file id and delete it
        $is_deleted = UserFileDetail::find($file_id)->delete();


        // success response file deleted
        if ($is_deleted == 1){
            return response()->json([
                'isSuccessful' => 'Yes',
                'errorMessage' => '',
                'responseMessage' => 'File Has Been Trashed Successfully.',
                'isDeleted' => 'Yes',
            ]);
        }


    }

    /**
     * API endpoint retrieve soft deleted file.
     *
     * @param Request $request
     * @return boolean
     */
    public function restoreTrashedFile( Request $request){

        // validate file_id
        $validator = Validator::make($request->all(), [
            'file_id'           => 'required|int',
        ]);

        // if issue in validation stop here and send failed response
        if ($validator->fails()) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => $validator->errors(),
                'responseMessage' => 'Request Not Successful, Please try again.',
                'isRestored' => 'No',
            ]);
        }


        // get file_id from request
        $file_id = $request->file_id;

        // check if file_id exists in DB with trashed status
        if (UserFileDetail::onlyTrashed()->where('id', '=', $file_id)->count() == 0) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => 'Invalid File Id or File Already Restored',
                'responseMessage' => 'Request Not Successful, Please try again.',
                'isRestored' => 'No',
            ]);
        }

        // filter file id and restore it
        $is_deleted = UserFileDetail::onlyTrashed()->find($file_id)->restore();


        // success response file restored
        if ($is_deleted == 1){
            return response()->json([
                'isSuccessful' => 'Yes',
                'errorMessage' => '',
                'responseMessage' => 'File Has Been Restored Successfully.',
                'isRestored' => 'Yes',
            ]);
        }


    }

    /**
     * API endpoint get file details.
     *
     * @param Request $request
     * @return boolean
     */
    public function getFileDetails( Request $request){

        // validate file_id
        $validator = Validator::make($request->all(), [
            'file_id'           => 'required|int',
        ]);

        // if issue in validation stop here and send failed response.
        if ($validator->fails()) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => $validator->errors(),
                'responseMessage' => 'Request Not Successful, Please try again.',
                'fileDetails' => '',
            ]);
        }


        // get file_id from request.
        $file_id = $request->file_id;

        // check if file_id exists in DB
        if (UserFileDetail::where('id', '=', $file_id)->count() == 0) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => 'Invalid File Id',
                'responseMessage' => 'Request Not Successful, Please try again.',
                'fileDetails' => '',
            ]);
        }

        // get file details from table
        $file_details = UserFileDetail::find($file_id);

        // success response with file details.
        return response()->json([
            'isSuccessful' => 'yes',
            'errorMessage' => '',
            'responseMessage' => 'Request Successful.',
            'fileDetails' => $file_details,
        ]);
    }

}
