<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\AccountGroupList;
use App\Models\Role;
use App\Models\Announcement;
use App\Models\admin\Account;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;

class AnnouncementsController extends Controller
{
    public function index(){
        $roleID = Role::select('id')->where('role_name', 'Admin')->firstOrFail();
        $admin = 'admin';
        if(Auth::user()->get_role_name->role_name != 'Admin'){
            $users = \DB::select("select users.id, users.name, users.picture, users.email, count(is_read) as unread 
            from users LEFT  JOIN  announcements ON users.id = announcements.user_from and is_read = 0 and announcements.user_to = " . Auth::id() . "
            where users.id != " . Auth::id() . " and users.role_id = $roleID->id group by users.id, users.name, users.picture, users.email");
        }else{
            $users = \DB::select("select users.id, users.name, users.picture, users.email, count(is_read) as unread 
            from users LEFT  JOIN  announcements ON users.id = announcements.user_from and is_read = 0 and announcements.user_to = " . Auth::id() . "
            where users.id != " . Auth::id() . " and users.role_id != $roleID->id group by users.id, users.name, users.picture, users.email");
        }

        $groups = Group::get();
        return view('announcement.index', ['users' => $users, 'groups' => $groups]);
    }

    //send announcements
    public function sendAnnouncement(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Announcement();
        $data->user_from = $from;
        $data->user_to = $to;
        $data->message = $message;
        $data->is_read = 0; //message will be unread sending message
        $data->save();

    }

    //send multi announcements
    public function sendMultiGroupAnnouncement(Request $request)
    {   
        // dd($request);

        $from = Auth::id();

        // $name = $request->input('name');
        // alert($name);

        if($request->has('allgroups')){

            // $groups = Group::all();

            // return $groups;
            // foreach($groups as $group){
            //     $user_list = AccountGroupList::where('group_id', $group->id)->get();
            //          foreach($user_list as $user){
            //             $data[] = [
            //                 'user_from'=>$from,
            //                 'user_to'=>$user->id,
            //                 'message'=>$request->message,
            //             ];
            //         }

            // }

           
        }else{

                $user_list = AccountGroupList::where('group_id', $request->name)->get();
                foreach ($user_list as $user) {
                    $data[] = [
                    'user_from'=>$from,
                    'user_to'=>$user->user_id,
                    'message'=>$request->message,
                    ];
                }

        }


        Announcement::insert($data);    
  
        return response()->json(['success'=>'Announcement sent successfully.']);
    }


    //send multi announcements
    public function sendMultiAnnouncement(Request $request)
    {
        $from = Auth::id();
        if($request->has('allusers')){
            $users = User::all();
            foreach($users as $user){
                $data[] = [
                    'user_from'=>$from,
                    'user_to'=>$user->id,
                    'message'=>$request->message,
                ];
            }
        }elseif($request->has('allpremium')){

            $users = Account::where('account_type', 'premium')->get();

            foreach($users as $user){
                $data[] = [
                    'user_from'=>$from,
                    'user_to'=>$user->id,
                    'message'=>$request->message,
                ];
            }

        }elseif($request->has('allfree')){

            $users = Account::where('account_type', 'free')->get();

            foreach($users as $user){
                $data[] = [
                    'user_from'=>$from,
                    'user_to'=>$user->id,
                    'message'=>$request->message,
                ];
            }
      
        }else{
            foreach($request->name as $m=>$v){
                $data[] = [
                    'user_from'=>$from,
                    'user_to'=>$request->name[$m],
                    'message'=>$request->message,
                ];
            }
        }


    	Announcement::insert($data);
        return response()->json(['success'=>'Announcement sent successfully.']);
    }

    //get all announcements
    public function getAnnouncement($user_id)
    {

        $my_id = Auth::id();
        //when click to see announcement selected user's announcement will be read, update
        Announcement::where(['user_from' => $user_id, 'user_to' => $my_id])->update(['is_read' => 1]);

        $messages = Announcement::where(function ($query) use ($user_id, $my_id)
        {
            $query->where('user_from', $my_id)->where('user_to', $user_id);
        })->orWhere(function ($query) use ($user_id, $my_id)
        {
            $query->where('user_from', $user_id)->where('user_to', $my_id);
        })->get();

        return view('chat.messages', ['messages' => $messages]);
    }

    public function getAnnouncementCount($user_id){
        $my_id = Auth::id();
        $count = Announcement::where('user_from', $user_id)->where('user_to', $my_id)->where('is_read', 0)->get();
        if($count){
            return Response::json($count);
        }else{
            return Response::json();
        }
        
    }
}
