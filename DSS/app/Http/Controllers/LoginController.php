<?php

namespace App\Http\Controllers;

use App\Branch;
use App\DeviceGroup;
use App\Organization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;
use OrganizationSeeder;

class LoginController extends Controller
{
    public function login_view()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                Auth::login($user);

                return redirect('/');
            } else {
                return redirect('login')->with('success', 'Password is in-correct');
            }
        } else {
            return redirect('login')->with('error', 'User not found');
        }
    }

    public function logout()
    {
        if (Auth::check() == true) {
            Auth::logout();

            return redirect('login')->with('success', 'logged out successfully');
        }
    }
}
