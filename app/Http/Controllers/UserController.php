<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class UserController extends Controller
{

    public function myProfile()
    {
        $user = auth()->user();
        return view('backend.users.profile', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('backend.users.edit', compact('user'));
    }

    public function update(Request $request)
    {

        $user = auth()->user();
        $userData = $request->only('name', 'email');
        $profileData = $request->only('facebook_url', 'twitter_url', 'bio');

        if ($request->hasFile('picture')){
            $this->unlink($user->profile->picture);
            $profileData['picture'] = $this->uploadImage($request->picture, $user->name);
        }

        $user->update($userData);

//        $profile = Profile::where('user_id', $user->id)->findOrFail();
//        $profile->update($profileData);

        $user->profile()->update($profileData);

        return redirect()->route('my_profile');
    }

   private function uploadImage($file, $name)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());//formatting the name for unique and readable
        $file_name = $timestamp .'-'.$name. '.' . $file->getClientOriginalExtension();
        $pathToUpload = storage_path().'/app/public/users/';
        Image::make($file)->resize(80,100)->save($pathToUpload.$file_name);
        return $file_name;
    }

    private function unlink($file)
    {

        $pathToUpload = storage_path().'/app/public/users/';

        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

}


