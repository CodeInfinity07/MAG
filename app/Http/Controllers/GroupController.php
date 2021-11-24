<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use App\Models\AccountGroupList;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $accounts = Account::get();
        // $labels = Label::with(['artists'])->get();
        // $artists = Artist::where('label_id', '=', $id)->get();
        $users = User::get();
        $groups = Group::get();
        return view('admin.group.groups-list', compact('users', 'groups'));
    }

    // attatch emails to specific mailing list
    public function add_group_to_list(Request $req)
    {   
        // dd($req->selected_list);
        // $count = count($req->selected_list);
        // for ($i=0; $i < $count; $i++) { 
        // $list = User::where('id', $req->selected_list[$i])->first();
            $list = User::where('id', $req->selected_list)->first();
            $list->users()->sync($req->list);
        // }

        return redirect()->back()->with('success', 'User Added in Group successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if ($request->isMethod('post')) {
            $request->validate([
                'group_name' => 'required',
            ]);

            $group = Group::create([
             'name' => $request->group_name,
            ]);
            
            // dd($group);
            return redirect()->back()->with('success', 'Group Added Successfully');
        } else {
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $group_user = AccountGroupList::where('group_id', '=', $id)->get();
        
        foreach($group_user as $g_user ){
            $users[] = User::where('id', '=', $g_user->user_id)->get();

        }    
        
        // dd($users);
        return view('admin.group.view_group', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::where('id', $id)->first();
        // dd($account->section);
        return view('admin.group.edit_group', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            if ($request->isMethod('put')) {
            // $request->validate([
            //     'company_name' => 'required',
            // ]);
            $group = Group::where('id', $id)->first();
            $update  = $group->update([
                'name' => $request->group_name,
                
            ]);
            return redirect()->back()->with('success', 'Group Updated Successfully');
        } else {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
 
        $group = Group::where('id', $id)->first();
        $group->delete();
        return redirect()->back()->with('success', 'Group Deleted Successfully.');

    }
}
