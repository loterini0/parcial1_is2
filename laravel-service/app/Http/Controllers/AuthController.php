<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthContorller extends Controller{


public function register(Request $request){
    $user = new User();
    $user-> name = $request->name;
    $user-> email = $request->email;
    $user-> password = $request->password;

    $user->save();
    return response()->json([
        'message' => '$user'
    ]);

}
public function login(Request $request){

    $credential = $request->only('email', 'password');
    
    $user-> name = $request->name;
    $user-> email = $request->email;
    $user-> password = $request->password;

    $user->save();
    return response()->json([
        'message' => '$user'
    ]);

}



}

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});
