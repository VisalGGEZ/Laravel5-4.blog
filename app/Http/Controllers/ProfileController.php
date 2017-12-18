<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.user.profile')->with('user', Auth::user());
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('password')) {
            $password = $request->password;

            $user->password = bcrypt($password);
        }

        if ($request->hasFile('avatar')) {

            $avatar = $request->avatar;

            $avatar_new = time() . $avatar->getClientOriginalName();
            $avatar->move('upload/avatar', $avatar_new);

            $user->profile->avatar = 'upload/avatar/' . $avatar_new;
        }

        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->about = $request->about;

        $user->save();
        $user->profile->save();

        Session::flash('success', 'Your profile was just updated successfully.');

        return redirect()->back();
    }
}
