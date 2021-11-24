<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;

class MessagesController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roleID = Role::select('id')->where('role_name', 'Admin')->firstOrFail();
        $admin = 'admin';
        if(Auth::user()->get_role_name->role_name != 'Admin'){
            $users = \DB::select("select users.id, users.name, users.picture, users.email, count(is_read) as unread
            from users LEFT  JOIN  messages ON users.id = messages.user_from and is_read = 0 and messages.user_to = " . Auth::id() . "
            where users.id != " . Auth::id() . " and users.role_id = $roleID->id group by users.id, users.name, users.picture, users.email");
        }else{
            $users = \DB::select("select users.id, users.name, users.picture, users.email, count(is_read) as unread
            from users LEFT  JOIN  messages ON users.id = messages.user_from and is_read = 0 and messages.user_to = " . Auth::id() . "
            where users.id != " . Auth::id() . " and users.role_id != $roleID->id group by users.id, users.name, users.picture, users.email");
        }

        return view('chat.index', ['users' => $users]);

        // $users = User::all();
        // $roleID = Role::select('id')->where('role_name', 'Admin')->firstOrFail();
        // $admin = User::where('role_id', $roleID->id)->firstOrFail();
        // return view('chat.index', compact('users', 'admin'));

    }

    //send message
    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->user_from = $from;
        $data->user_to = $to;
        $data->message = $message;
        $data->is_read = 0; //message will be unread sending message
        $data->save();

        // $options = array(
        //     'cluster' => 'ap2',
        //     'useTLS'  => true
        // );

        // $pusher = new Pusher(
        //     env('PUSHER_APP_KEY'),
        //     env('PUSHER_APP_SECRET'),
        //     env('PUSHER_APP_ID'),
        //     $options
        // );

        // $data = ['user_from' => $from, 'user_to' => $to];   // sending from and to user id when pressed enter
        // $pusher->trigger('my-channel', 'my-event', $data);
    }

    //get all messages
    public function getMessage($user_id)
    {

        $my_id = Auth::id();
        //when click to see message selected user's message will be read, update
        Message::where(['user_from' => $user_id, 'user_to' => $my_id])->update(['is_read' => 1]);

        $messages = Message::where(function ($query) use ($user_id, $my_id)
        {
            $query->where('user_from', $my_id)->where('user_to', $user_id);
        })->orWhere(function ($query) use ($user_id, $my_id)
        {
            $query->where('user_from', $user_id)->where('user_to', $my_id);
        })->get();

        return view('chat.messages', ['messages' => $messages]);
    }

    public function getMessageCount($user_id){
        $my_id = Auth::id();
        $count = Message::where('user_from', $user_id)->where('user_to', $my_id)->where('is_read', 0)->get();
        if($count){
            return Response::json($count);
        }else{
            return Response::json();
        }

    }
}
