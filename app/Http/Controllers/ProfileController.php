<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('webfront.user-action.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updateProfilePhoto(Request $request)
    {
        $user = Auth::user();
    
        // Validate the incoming request for the photo
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Process the photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
    
            // Delete old photo if it exists and is not default avatar
            if ($user->photo && $user->photo !== 'avatar.png') {
                $oldPhotoPath = public_path('photodata/' . $user->photo);
    
                // Check if old photo exists before deleting
                if (File::exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
    
            // Store the new photo in public/photodata directory
            $photo->move(public_path('photodata'), $photoName);
    
            // Update user's photo field in the database
            $user->photo = $photoName;
            $user->save();
        }
    
        return redirect()->route('profile.show')->with('success', 'Ảnh đại diện đã được cập nhật thành công.');
    }
    
}
