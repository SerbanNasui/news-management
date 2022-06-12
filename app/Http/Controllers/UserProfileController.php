<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Models\User;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function __construct(){
        $this->middleware(function($request, $next){
            $authUser = auth()->user();
            $routeParams = $request->route()->parameters();
            if($authUser->id != $routeParams['id']){
                toastr()->error('You are not authorized to access this page.');
                return redirect()->route('backoffice.index');
            }
            return $next($request);
        });
    }
    public function index($id){
        $user = User::findOrFail($id);

        return view('back-office.user-profile.index', compact('user'));
    }

    public function create(Request $request){
        $request->validate([
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'avatar' => 'required|mimes:jpeg,png,jpg,gif,svg|max:20000|dimensions:min_width=10,min_height=10',
        ]);

        $avatar = null;
        if($request->hasFile('avatar')) {
            $avatar = (new UploadImageService())->uploadAvatar($request, auth()->user());
        }

        UserProfile::create([
            'user_id' => auth()->user()->id,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'avatar' => $avatar
        ]);
        toastr()->success('Profile created successfully.');
        return redirect()->back();
    }

    public function update(Request $request){
        $request->validate([
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'avatar' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:20000|dimensions:min_width=10,min_height=10',
        ]);

        $userProfile = UserProfile::where('user_id', auth()->user()->id)->first();
        $userProfile->facebook = $request->facebook;
        $userProfile->twitter = $request->twitter;
        $userProfile->instagram = $request->instagram;
        $userProfile->linkedin = $request->linkedin;
        if($request->hasFile('avatar')) {
            $userProfile->avatar = (new UploadImageService())->uploadAvatar($request, auth()->user());
        }
        $userProfile->save();

        toastr()->success('Profile updated successfully.');
        return redirect()->back();
    }

    public function changePassword(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        toastr()->success('Password changed successfully.');
        return redirect()->back();
    }
}
