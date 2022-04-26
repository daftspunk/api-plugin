<?php namespace RainLab\Api\Http\Controllers;

use Hash;
use Backend\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        //
        $user = User::where('login', $request->login)->first();

        //
        if (!$user) {
            return $this->failed('Invalid credentials');
        }

        if (!Hash::check($request->password, $user->password)) {
            return $this->failed('Invalid credentials');
        }

        // Create new token
        $token = $user->createToken(config('app.name') . ' token');

        //
        return $this->success([
            'token' => $token->accessToken,
        ]);
    }

    public function index(Request $request)
    {
        return $this->success([
            'user' => auth()->user(),
        ]);
    }
}