<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $data_validate = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email|max:255',
            'username' => 'string|unique:users,username|required|max:255',
            'password' => 'required|string|max:255'
        ]);

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);

            $token = $user->createToken('siakad', ['*'], now()->addWeek())->plainTextToken;

            return response()->json([
                'message' => 'User created',
                'token' => $token,
                'data' => $user,
            ]);
        } catch (Exception $err) {
            return response()->json([
                'message' => $err->getMessage()
            ],500);
        }
    }
}
