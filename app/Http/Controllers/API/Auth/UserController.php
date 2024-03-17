<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUser()
    {
        try{
            $users = User::all();

            return response()->json([
                'message' => 'Successfully get users',
                'data' => $users
            ]);
        }catch(Exception $err)
        {
            return response()->json([
                'message' => $err->getMessage()
            ],500);
        }
    }

    public function getUserByUuid($userid){
        try {
            $user = User::find($userid);

            return response()->json([
                'message' => 'Successfully get user',
                'data' => $user
            ]);
        } catch (Exception $err) {
            return response()->json([
                'message' => $err->getMessage()
            ],500);
        }
    }

    public function register(Request $request)
    {
        try {
            $user = User::find($userid);

            return response()->json([
                'message' => 'Successfully get user',
                'data' => $user
            ]);
        } catch (Exception $err) {
            return response()->json([
                'message' => $err->getMessage()
            ],500);
        }
    }
}
