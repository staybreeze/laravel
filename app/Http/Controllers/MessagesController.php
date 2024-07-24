<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Message;

class MessagesController extends Controller
{
    public function create(Request $request)
    {

        $message = new Message();
        $message->sender = $request['sender'];
        $message->subject = $request['subject'];
        $message->text = $request['text'];
        $message->save();

        return redirect()->back()->with('message_success', '收到你的來信囉～');
    }
}
