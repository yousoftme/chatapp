<?php

namespace App\Http\Controllers;
use App\Events\ChatEvent;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Message;
class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * view chat page
     *
     * @return view
     */
    public function chat()
    {
        # code...
        return view('chat');
    }
        /**
     * send ajax request
     *
     *
     */
    public function send(request $request)
    {
        # code...

        $user = User::find(Auth::id());
        $message = new Message();

        $message->message = $request->message;
        $message->user_id = Auth::id();
        $message->booking_id = 168;

        $message->save();
        event(new ChatEvent($request->message, $user));

    }
    // public function send()
    // {
    //     # code...
    //     $message = 'Hello';
    //     $user = User::find(Auth::id());
    //     event(new ChatEvent($message, $user));
    // }
}
