<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class msgControll extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            redirect()->route("home");
        }
        Cache::flush();
    }


    public function list()
    {
        $msgs = Message::orderBY('isnew', 'DESC')->orderBy('created_at')->get();
        return view("mods.admin.mesasges", ['msgs' => $msgs, 'hero' => __('messages.messages')]);
    }

    public function delete($id)
    {
        $msg = Message::find($id);
        return $msg->delete();
    }

    public function ajaxRead($id)
    {
        $msg = Message::find($id);
        if ($msg->isnew == 1) {
            $label = ' <span class="label label-default">' . __('messages.new') . '</span>';
        } else {
            $label = '';
        }
        $msg->isnew = 0;
        $msg->save();
        return '<h3>' . __('messages.msg_from') . ': ' . $msg->name . $label . '</h3>'
            . '<p>' . $msg->content . '</p>
<p>' . __('messages.contact') . ':. ' . $msg->email . '<br>'
            . $msg->telephone . '</p>';
    }


}

