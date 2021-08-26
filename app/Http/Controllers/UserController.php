<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.profile', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required|before:today',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required|max:300',
        ]);

        $user  = User::find($id);
        if ($user->id == Auth::user()->id || Auth::user()->hasRole('admin')) {
            $add['name'] = $request->name;
            $add['dob'] = $request->dob;
            if ($request->has('profile_image')) {
                $profileImage = $request->file('profile_image');
                $profileName = $user->id . '_' . $user->name . '_' . rand(1, 1000) . "." . $profileImage->getClientOriginalExtension();
                $add['avatar'] = $request->file('profile_image')->storeas('profile_images', $profileName, 'public');
            }
            if ($user->update($add)) {
                $profile = UserProfile::find($user->id);
                $insert['phone_number'] = $request->phone;
                $insert['address'] = $request->address;
                $insert['description'] = $request->description;
                $insert['latlng'] = $request->lat . ',' . $request->lng;
                $insert['user_id'] = $user->id;
                if ($user->hasRole('agent')) {
                    if (!isset($request->specialities)) {
                        return redirect()->back();   
                    }
                    $insert['speciality'] = implode(',', $request->specialities);    
                }
                
                if ($request->has('cover_image')) {
                    $coverImage = $request->file('cover_image');
                    $coverName = $user->id . '_' . $user->name . '_' . rand(1, 1000) . "." . $coverImage->getClientOriginalExtension();
                    $insert['cover_image'] = $request->file('cover_image')->storeas('cover_images', $coverName, 'public');
                }
                if (empty($profile)) {
                    if (UserProfile::create($insert)) {
                        return redirect()->back()->with('success', 'Profile Updated');
                    } else {
                        return redirect()->back()->with('error', 'Something Went Wrong');
                    }
                } else {
                    if (UserProfile::where('user_id', $user->id)->update($insert)) {
                        return redirect()->back()->with('success', 'Profile Updated');
                    } else {
                        return redirect()->back()->with('error', 'Something Went Wrong');
                    }
                }
            }
        } else {
            return redirect()->back()->with('error', 'You are not allowed to update this profile');
        }
    }
}
