<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Label;
use App\Models\admin\Artist;
use App\Models\admin\Section;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        // $accounts = Account::get();
        $accounts = Account::get();
        return view('admin.accounts.accounts', compact('accounts'));
    }
    public function store_account(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'company_name' => 'required',
                'username' => 'required|unique:users,username',
                'email' => 'required|email|unique:users,email|unique:accounts,email',
                'password' => 'required|confirmed',
            ]);
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => 5,
            ]);
            $user_id = $user->id;
            $account = Account::create([
                'user_id' => $user_id,
                'company_name' => $request->company_name,
                'email' => $request->email,
            ]);
            $account_id = $account->id;
            Section::create([
                'account_id' => $account_id,
                'distribution' => $request->DISTRIBUTION ? 1 : 0,
                'discography' => $request->DISCOGRAPHY ? 1 : 0,
                'promotions' => $request->PROMOTIONS ? 1 : 0,
                'label_artist' => $request->LABEL_ARTIST ? 1 : 0,
                'mailing' => $request->MAILING ? 1 : 0,
                'katorz' => $request->KATORZ ? 1 : 0,
            ]);
            return redirect()->back()->with('success', 'Account Added Successfully');
        } else {
            return abort(404);
        }
    }
    public function edit_account($id)
    {
        $account = Account::where('id', $id)->first();
        // dd($account->section);
        return view('admin.accounts.edit_account', compact('account'));
    }

     public function view_account_labels($id)
    {
        // $labels = Label::with(['artists'])->get();
        $labels = Label::where('account_id', '=', $id)->get();
        // $accounts = Account::where('role_id', null)->orWhere('role_id', 0)->get();
        $accounts = Account::get();
        return view('admin.accounts.view_labels', compact('labels', 'accounts'));
    }
    public function view_account_artists($id)
    {
        // $labels = Label::with(['artists'])->get();
        $artists = Artist::where('label_id', '=', $id)->get();
        // $accounts = Account::where('role_id', null)->orWhere('role_id', 0)->get();
        $accounts = Account::get();
        return view('admin.accounts.view_artists', compact('artists', 'accounts'));
    }

    public function update_account(Request $request)
    {
        if ($request->isMethod('post')) {
            // $request->validate([
            //     'company_name' => 'required',
            // ]);
            $account = Account::where('id', $request->id)->first();
            $update  = $account->update([
                'company_name' => $request->company_name,
                'telephone' => $request->telephone,
                'fax' => $request->fax,
                'vat_no' => $request->vat_no,
                'building_name_no' => $request->building_name_no,
                'street' => $request->street,
                'area' => $request->area,
                'town' => $request->town,
                'county' => $request->county,
                'post_code' => $request->post_code,
                'country' => $request->country,
                'update_logo' => $request->update_logo,
                'show_feedback' => $request->show_feedback,
                'facebook' => $request->facebook,
                'my_space' => $request->my_space,
                'sound_cloud' => $request->sound_cloud,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'biography' => $request->biography,
            ]);
            $account_id = $account->id;
            $section =  Section::where('account_id', $account_id)->count();
            if ($section > 0) {
                Section::where('account_id', $account_id)->update([
                    'distribution' => $request->DISTRIBUTION ? 1 : 0,
                    'discography' => $request->DISCOGRAPHY ? 1 : 0,
                    'promotions' => $request->PROMOTIONS ? 1 : 0,
                    'label_artist' => $request->LABEL_ARTIST ? 1 : 0,
                    'mailing' => $request->MAILING ? 1 : 0,
                    'katorz' => $request->KATORZ ? 1 : 0,
                ]);
            } else {
                Section::create([
                    'account_id' => $account_id,
                    'distribution' => $request->DISTRIBUTION ? 1 : 0,
                    'discography' => $request->DISCOGRAPHY ? 1 : 0,
                    'promotions' => $request->PROMOTIONS ? 1 : 0,
                    'label_artist' => $request->LABEL_ARTIST ? 1 : 0,
                    'mailing' => $request->MAILING ? 1 : 0,
                    'katorz' => $request->KATORZ ? 1 : 0,
                ]);
            }

            return redirect()->back()->with('success', 'Account Updated Successfully');
        } else {
            return abort(404);
        }
    }
    public function delete_account($id)
    {
        $account = Account::where('id', $id)->first();
        if ($account->user()->delete()) {
            $account->delete();
            return redirect()->back()->with('success', 'Account Deleted Successfully.');
        }
        return abort(404);
    }
    public function users()
    {
        return view('admin.accounts.users');
    }
    public function edit_user()
    {
        // $accounts = Account::get();
        return view('admin.accounts.edit_user');
    }
}
