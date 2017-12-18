<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'site_name' => 'required',
            'contact_email' => 'required|email',
            'contact_number' => 'required',
            'address' => 'required',
        ]);

        $settings = Setting::find($id);
        $settings->site_name = $request->site_name;
        $settings->contact_email = $request->contact_email;
        $settings->contact_number = $request->contact_number;
        $settings->address = $request->address;

        if($settings->save()){
            Session::flash('success', 'You have been updated settings.');
        }else{

        }
        return redirect()->back();
    }

    public function index()
    {
        $settings = Setting::first();

        return view('admin.setting.settings')->with('settings', $settings);
    }
}
