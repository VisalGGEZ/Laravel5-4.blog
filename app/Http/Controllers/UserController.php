<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();

        return view('admin.user.index')->with('users', $users);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('123456')
        ]);


        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'upload/avatar/man.png',
        ]);

        Session::flash('success', 'You have need created new user.');

        return redirect()->back();
    }

    public function beAdmin($id)
    {
        $user = User::find($id);

        $user->admin = 1;

        $user->save();

        Session::flash('success', 'User: ' . $user->name . ' has been promoted successfully.');

        return redirect()->back();
    }

    public function beUser($id)
    {
        $user = User::find($id);

        $user->admin = 0;

        $user->save();

        Session::flash('success', 'User: ' . $user->name . ' has been de-promoted successfully.');

        return redirect()->back();
    }

    public function delete($id)
    {
        $user = User::find($id);

        Session::flash('success', 'User: ' . $user->name . ' has been deleted permanently successfully.');

        $user->profile->delete();

        $user->delete();

        return redirect()->back();
    }
}
