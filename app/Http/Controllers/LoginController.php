<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
         'email'    => 'required|string|email|max:255',
    ]);

    if($validator->fails()){
        return response()->json($validator->errors(),422);
    }
    
    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['error' => 'Invalid login or password'], 401);
    }

    return response()->json(['message' => 'Login Succesfull'], 200);
}
}
