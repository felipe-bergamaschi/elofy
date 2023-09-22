<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Driver;

class Auth extends Controller
{
    public function auth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (!$email|| !$password){
            return response()->json(['message' => 'Login invalido'], 400);
        }

        if (strlen($password) < 6){
            return response()->json(['message' => 'Login invalido'], 400);
        }

        $user = Driver::where('email')->find($email);

        echo $user;

        // return Driver::findOrFail($id);
    }
}
