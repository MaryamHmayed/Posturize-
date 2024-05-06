<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhysiotherapistController extends Controller
{
    
    public function updateProfile(Request $req){
        $req->validate([
            'bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255'
        ]);
    
        $user = User::find(Auth::id());
    
        if (!$user) {
            return response()->json(['message' => 'No authenticated user found'], 404);
        }
    
        $user->update($req->only(['bio', 'location', 'phone_number']));
      
        return response()->json(['message' => 'Profile updated successfully', 'user' => $user]);

    }


    public function updateImage(Request $req)
    {
        $req->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = User::find(Auth::id());

        if ($req->hasFile('profile_image')) {
            $file = $req->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profile_images', $filename, 'public');

            $user->profile_image = $path;
            $user->save();
    }

        return response()->json(['message' => 'Image uploaded successfully', 'path' => $path]);
    }


    
       
}
