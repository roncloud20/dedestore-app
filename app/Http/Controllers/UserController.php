<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Registration of New User
    function register(Request $request){
        try {
            $user = new User;
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->username = $request->input('username');
            $user->user_role = $request->input('user_role');
            $user->password = Hash::make($request->input('password'));
            if($request->hasFile('user_picture')) {
                $user->user_picture = $request->file('user_picture')->store('user_dp');
            } else {
                $user->user_picture = 'default_dp.jpg'; // Set a default profile picture if no image is provided.
            }
            $user->save();
            return response() -> json($user, 201);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
