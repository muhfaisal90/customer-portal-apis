<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\api\v1\UserDirectoryDetail;
use Validator;
use Illuminate\Http\Request;

class UserDirectoryDetailController extends Controller
{

    /**
     * API endpoint get directories and files
     *
     * @param Request $request
     * @return array of directories and files
     */
    public function directoriesAndFiles( Request $request){

        // validate directory_id
        $validator = Validator::make($request->all(), [
            'directory_id'           => 'required|int',
        ]);

        // if issue in validation stop here and send failed response
        if ($validator->fails()) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => $validator->errors(),
                'responseMessage' => 'Request Not Successful, Please try again.',
                'directoriesAndFilesData' => '',
            ]);
        }

        // get directory_id from request
        $directory_id = $request->directory_id;

        // check if directory_id exists in DB
        if (UserDirectoryDetail::where('id', '=', $directory_id)->count() == 0) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => 'Invalid Directory ID',
                'responseMessage' => 'Request Not Successful, Please try again.',
                'directoriesAndFilesData' => '',
            ]);
        }

        // get directories using relationship between "user_directory_details" and "user_file_details" table
        $directories_and_files =  UserDirectoryDetail::find($directory_id)->subDirectories()->with('files')->get();

        // if requested directory_id not associated with any directory yet then stop here and send response
        if ($directories_and_files->isEmpty()){
            return response()->json([
                'isSuccessful' => 'Yes',
                'errorMessage' => '',
                'responseMessage' => 'No Directories Found. Please Create One. ',
                'directoriesAndFilesData' => '',
            ]);

        }

        // success response with directories and files
        return response()->json([
            'isSuccessful' => 'yes',
            'errorMessage' => '',
            'responseMessage' => 'Request Successful.',
            'directoriesAndFilesData' => $directories_and_files,
        ]);
    }
}
