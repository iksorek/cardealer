<?php

namespace App\Http\Controllers;

use App\Car;
use App\Message;
use App\Setting;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use function __;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function flashMsg($class, $message)
    {
        Session::flash('msg', $message);
        Session::flash('alert-class', 'alert-' . $class);
    }

    public function mainPage()
    {

        $lastCars = $this->getCachedLastCarsForMainPage();
        //dd($lastCars);
        return view('mods.mainpage', ['lastCars' => $lastCars]);
    }

    public function getCachedLastCarsForMainPage()
    {
        return Cache::remember('getCachedLastCarsForMainPage', 1140, function () {
            return Car::with(['photo'])->orderBy('updated_at', 'DESC')->limit(8)->get();
        });

    }

    public static function activeRoute($route)
    {
        if ($route == Route::currentRouteName()) {
            return ' active';
        } else {
            return '';
        }
    }


    public function contact()
    {
        return view('mods.contact', ['hero' => __('messages.contact')]);
    }

    public function loguj()
    {
        return view('auth.login');
    }

    public static function CountThem($op)
    {
        if ($op == 'Car') {
            return Car::all()->count();
        }
        if ($op == 'msg') {
            return Message::where('isnew', 1)->count();
        }
    }

    public static function findSetting($key)
    {
        //Cache::flush();
        $data = Cache::remember('Setting-key-' . $key, 1140, function () use ($key) {
            return Setting::select('value')->where('key', $key)->first();

        });
        return $data->value;

    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'content' => 'required|min:10'

        ]);
        $msg = new Message;
        $msg->name = $request->input('name');
        $msg->email = $request->input('email');
        $msg->telephone = $request->input('phone');
        $msg->isnew = 1;
        $msg->content = $request->input('content');
        $msg->save();
        $this->flashMsg('info', __('messages.message_sent'));
        return redirect()->route('contact');

    }

    public function myAccount()
    {
        if (!Auth::check()) {
            redirect()->route("home");
        }
        Cache::flush();
        $myself = User::find(Auth::id());
        return view("mods.admin.myaccount", ['hero' => __('messages.my_account'), 'me' => $myself]);

    }

    public function saveMyAccount(Request $request)
    {
        $myself = User::find(Auth::id());
        if ($request->input('email') != $myself->email) {

            $request->validate([
                'email' => 'required|email',
            ]);
            $myself->email = $request->input('email');
            $this->flashMsg('info', __('messages.changes_saved'));
        }
        if($request->input('pass1') != null){
            $request->validate([
                'pass1' => 'required|min:6',
                'pass2' => 'required|same:pass1',
            ]);
            $myself->password = Hash::make($request->input('pass1'));
            $this->flashMsg('info', __('messages.changes_saved'));
        }

        $myself->save();
        return redirect()->route("myAccount");
    }

}
