<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateUserProfile;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin(User $user){
        $user->role = 'admin';

        $user->save();

        return redirect()->back()->with('success', 'You have successfully made '.$user->name.' an Admin');

    }

    public function edit(){
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateUserProfile $request){

        $user = auth()->user();

        $user->update([
           'name' => $request->name,
           'about' => $request->about
        ]);

        return redirect(url('/home'))->with('success', 'Your Profile data is updated successfully ! ');

    }

}
