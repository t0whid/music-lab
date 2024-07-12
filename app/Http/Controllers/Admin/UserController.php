<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function toggleStatus(User $user)
    {
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        $message = $user->status === 'active' ? 'User activated' : 'User deactivated';

        return response()->json(['status' => $user->status, 'message' => $message]);
    }
    public function editAdminProfile()
    {
        $admin = auth()->user();
        return view('admin.profile', compact('admin'));
    }

    public function updateAdminProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . auth()->user()->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $admin = auth()->user();
    
        if ($request->hasFile('image')) {
            if ($admin->image) {
                Storage::disk('public')->delete($admin->image);
            }
    
            $imagePath = $request->file('image')->store('admin_images', 'public');
            $admin->image = $imagePath;
        }
    
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
    
        if ($request->filled('old_password') && $request->filled('password')) {
            if (Hash::check($request->input('old_password'), $admin->password)) {
                $admin->password = Hash::make($request->input('password'));
            } else {
                return redirect()->back()->with('error', 'The old password is incorrect.');
            }
        }
    
        $admin->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    
}
