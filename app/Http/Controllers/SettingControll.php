<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SettingControll extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            redirect()->route("home");
        }
        Cache::flush();

    }

    public function index()
    {

        return view('mods.admin.settings', ['hero' => __('messages.website_settings')]);
    }

    public function saveChanges(Request $request)
    {
        Setting::where('key', 'telephone')->update(['value' => $request->input('telephone')]);
        Setting::where('key', 'email')->update(['value' => $request->input('email')]);
        Setting::where('key', 'address')->update(['value' => $request->input('address')]);
        Setting::where('key', 'opentimes')->update(['value' => $request->input('opentimes')]);
        Setting::where('key', 'slogan')->update(['value' => $request->input('slogan')]);
        Setting::where('key', 'mainpagetext')->update(['value' => $request->input('mainpagetext')]);

        $this->flashMsg('info', __('messages.changes_saved'));
        return view('mods.admin.settings', ['hero' => __('messages.website_settings')]);
    }
}
