<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function registerForm()
    {
        return view('posts.register');
    }

    public function register(Request $request)
    {

        \Log::info('Entering register method');
        
        $data = $request->all();
        \Log::info('Request data', $data);


        $data = $request->all();
        $validator = Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        \Log::info('Validator initialized');

        $validator->validate();

        $user = User::create([
            "name" => $data["nama"],
            "email" => $data["email"],
            "password" => Hash::make($data['password'])
        ]);

        \Log::info('User created', ['user_id' => $user->id]);

        auth()->login($user);
        \Log::info('User logged in', ['user_id' => $user->id]);
        
        return redirect()->route("home");
    }
}
