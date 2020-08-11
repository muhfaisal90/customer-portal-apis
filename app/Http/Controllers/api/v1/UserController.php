<?php

namespace App\Http\Controllers\api\v1;
use App\Models\api\v1\UserDirectoryDetail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

//use App\Models\api\v1\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return User::all();
        return User::find(1);
        //return User::where('is_active',"0")->first();
        //return User::find([1,3]);
//        return User::where('is_active', "0")->count();
    }

    /**
     * API endpoint get user's root directories and files
     *
     * @param Request  $request
     * @return array of directories and files
     */
    public function rootDirectoriesAndFiles( Request $request){

        // validate user_id
        $validator = Validator::make($request->all(), [
            'user_id'           => 'required|int',
        ]);

        // if issue in validation stop here and send failed response
        if ($validator->fails()) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => $validator->errors(),
                'responseMessage' => 'Request Not Successful, Please try again.',
                'rootDirectoriesAndFilesData' => '',
            ]);
        }

        // get user_id from request
        $user_id = $request->user_id;

        // check if user_id exists in DB
        if (User::where('id', '=', $user_id)->count() == 0) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => 'Invalid User Id',
                'responseMessage' => 'Request Not Successful, Please try again.',
                'rootDirectoriesAndFilesData' => '',
            ]);
        }

        // get directories using relationship between "users", "user_directory_details" and "user_file_details" table
        $root_directories_and_files =  User::find($user_id)->rootDirectories()->with('files')->get();

        // if user do not have any directory yet then stop here and send response
        if ($root_directories_and_files->isEmpty()){
            return response()->json([
                'isSuccessful' => 'Yes',
                'errorMessage' => '',
                'responseMessage' => 'No Root Directories Found. Please Create One. ',
                'rootDirectoriesAndFilesData' => '',
            ]);

        }

        // success response with user's root directories and files
        return response()->json([
            'isSuccessful' => 'yes',
            'errorMessage' => '',
            'responseMessage' => 'Request Successful.',
            'rootDirectoriesAndFilesData' => $root_directories_and_files,
        ]);
    }

    /**
     *
     * API endpoint get recently uploaded and updated files
     *
     * @param Request $request
     * @return array of recent files
     */
    public function recentFiles(Request $request){

        // validate user_id
        $validator = Validator::make($request->all(), [
            'user_id'           => 'required|int',
        ]);

        // if issue in validation stop here and send failed response
        if ($validator->fails()) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => $validator->errors(),
                'responseMessage' => 'Request Not Successful, Please try again.',
                'recentFilesData' => '',
            ]);
        }


        // get user_id from request
        $user_id = $request->user_id;

        // check if user_id exists in DB
        if (User::where('id', '=', $user_id)->count() == 0) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => 'Invalid User Id',
                'responseMessage' => 'Request Not Successful, Please try again.',
                'recentFilesData' => '',
            ]);
        }

        // getting filtered data, only files which are updated_at in 48 hours
        $recentFilesData = User::find($user_id)->recentFiles()->get();


        //getting all files by user_id
        //$recentFilesData = User::find($user_id)->files()->get();

        // if user do not have any files yet then stop here and send response
        if ($recentFilesData->isEmpty()){
            return response()->json([
                'isSuccessful' => 'Yes',
                'errorMessage' => '',
                'responseMessage' => 'No Files Found.',
                'recentFilesData' => '',
            ]);
        }

        // success response with user's recent files
        return response()->json([
            'isSuccessful' => 'yes',
            'errorMessage' => '',
            'responseMessage' => 'Request Successful.',
            'recentFilesData' => $recentFilesData,
        ]);
    }

    /**
     *
     * API endpoint search keyword in directories and files
     *
     * @param Request $request
     * @return array of filtered directories and files
     */
    public function searchInDirectoriesAndFiles( Request $request){

        // validate user_id and search_term.
        $validator = Validator::make($request->all(), [
            'user_id'           => 'required|int',
            'search_term'       => 'required|string',
        ]);

        // if issue in validation stop here and send failed response.
        if ($validator->fails()) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => $validator->errors(),
                'responseMessage' => 'Request Not Successful, Please try again.',
                'searchData' => '',
            ]);
        }

        // get user_id and search_term from request.
        $user_id = $request->user_id;
        $search_term = $request->search_term;

        // check if user_id exists in DB
        if (User::where('id', '=', $user_id)->count() == 0) {
            return response()->json([
                'isSuccessful' => 'No',
                'errorMessage' => 'Invalid User Id',
                'responseMessage' => 'Request Not Successful, Please try again.',
                'searchData' => '',
            ]);
        }

        // get filtered directories
        $directories_data = User::find($user_id)->directories()->where('directory_name', 'like', '%' .$search_term. '%')->get();

        // get filtered files
        $files_data = User::find($user_id)->files()->where('file_name', 'like', '%' .$search_term. '%')->get();

        // if no data found then stop here and send response
        if ($files_data->isEmpty() && $directories_data->isEmpty()){
            return response()->json([
                'isSuccessful' => 'Yes',
                'errorMessage' => '',
                'responseMessage' => 'No Search Results Found. ',
                'searchData' => '',
            ]);

        }

        // success response with filtered directories and files.
        return response()->json([
            'isSuccessful' => 'yes',
            'errorMessage' => '',
            'responseMessage' => 'Request Successful.',
            'searchedDirectories' => $directories_data,
            'searchedFiles' => $files_data,
        ]);
    }

    /**
     * API endpoint get soft deleted file
     *
     * @param Request $request
     * @return array
     */
    public function getTrashedFile( Request $request){

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
                'trashedData' => '',
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
                'trashedData' => '',
            ]);
        }

        // get data using relationship between users and user_file_details table
        $trashed_data = User::find($user_id)->files()->onlyTrashed()->get();


        // if no data found then stop here and send response
        if ($trashed_data->isEmpty()){
            return response()->json([
                'isSuccessful' => 'Yes',
                'errorMessage' => '',
                'responseMessage' => 'No Trashed Files Found. ',
                'trashedData' => '',
            ]);

        }

        // success response with filtered directories and files.
        return response()->json([
            'isSuccessful' => 'yes',
            'errorMessage' => '',
            'responseMessage' => 'Request Successful.',
            'trashedData' => $trashed_data,
        ]);
    }

}