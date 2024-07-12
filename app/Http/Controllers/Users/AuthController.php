<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        // Validate the user input
        $validator = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Full name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already in use.',
            'phone.required' => 'Phone is required.',
            'phone.unique' => 'This phone number is already in use.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ]);
        //dd($validator);
        // Calculate the subscription expiry date (30 days from registration)
        $subscriptionExpiry = now()->addDays(30);
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'subscription_type' => 'Free',
            'subscription_expiry' => $subscriptionExpiry,
        ]);

        //return view('auth.login')->with('success', 'Ok');

        return redirect()->route('login')->with('success', 'Sign Up successfully! Please log in!');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->status === 'active' && Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->put('header', 'users.header');
            $request->session()->put('sidebar', 'users.sidebar');
            return redirect()->route('user.home')->with('success', "Logged in successfully! Enjoy!");
        } elseif ($user && $user->status !== 'active') {
            return redirect()->back()->with('error', 'Your account is deactivated.');
        }

        return redirect()->back()->with('error', 'Invalid email or password');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    public function adminLoginForm()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->put('header', 'admin.header');
            $request->session()->put('sidebar', 'admin.sidebar');
            return redirect()->route('admin.home')->with('success', "Logged in successfully! Enjoy!");
        }

        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

   
}
