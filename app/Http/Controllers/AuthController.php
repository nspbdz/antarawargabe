<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function login(Request $request)
{
    // dd($request);
  try {
    $request->validate([
      "email" => "email|required",
      "password" => "required"
    ]);
    $credentials = request(["email", "password"]);
    if (!Auth::attempt($credentials)) {
      return response()->json([
        "status_code" => 500,
        "message" => "Unauthorized"
      ]);
    }
    $user = User::where("email", $request->email)->first();
    if ( ! Hash::check($request->password, $user->password, [])) {
       throw new \Exception("Error in Login");
    }
    $tokenResult = $user->createToken("authToken")->plainTextToken;
    return response()->json([
      "status_code" => 200,
      "access_token" => $tokenResult,
      "token_type" => "Bearer",
    ]);
  } catch (Exception $error) {
    return response()->json([
      "status_code" => 500,
      "message" => "Error in Login",
      "error" => $error,
    ]);
  }
}
}
