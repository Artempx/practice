<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email'    => 'required|string|email|max:255|unique:users',
    ]);

    if($validator->fails()){
        return response()->json($validator->errors(),422);
    }
    $user= User::create([
        'name' => $request->name,
        'surname' =>$request->surname,
        'middlename' =>$request->middlename,
        'nickname' => $request->nickname,
        'gender' => $request->gender,
        'country' => $request->country,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->noContent(201);
}
}