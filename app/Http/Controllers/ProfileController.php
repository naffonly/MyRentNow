<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
  
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'indetityFace' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'indetityCard' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);
        
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
       
        if ( $faceImg =  $request->indetityFace) {
            $imageFaceName = time().random_int(2,5).'.'.$faceImg->extension();
            Storage::putFileAs('public/user/face',$faceImg,$imageFaceName);
            $user->indetityFace = 'storage/user/face/' .  $imageFaceName;
        }else{
            unset( $user->indetityFace);
        }
        

        if ($cardImg = $request->indetityCard) {
            $imageCardName = time().random_int(2,5).'.'. $cardImg->extension(); 
            Storage::putFileAs('public/user/card',$cardImg,$imageCardName);
            $user->indetityCard =  'storage/user/card/' .  $imageCardName;
        } else {
            unset($user->indetityCard);
        }
        
        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }
     
        $user->save();

        return redirect()->route('profile')->withSuccess('Profile updated successfully.');
    }
}
