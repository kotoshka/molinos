<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::find(1);
        $data['settings'] = $settings;
        return View('admin.index', $data);
    }

    public function edit(Request $request)
    {
        $message = '';
        $this->validate($request, [
            'site_name' => 'required',
            'admin_email' => 'required|email',
        ]);
        $settings = Settings::find(1);
        $settings->site_name = $request->site_name;
        $settings->admin_email = $request->admin_email;
        if ($settings->save()) {
            $message = "Data successfully changed!";
        }
        return redirect()->route('admin.index')->with('message', $message);
    }
}
