<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMailToContactList;
use App\Models\admin\Account;
use App\Models\admin\Artist;
use App\Models\admin\Label;
use App\Models\MailingList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailingListController extends Controller
{
    // to show account emails in contacts section
    public function index()
    {
        $contacts = Account::with(['user'])->get();
        $mailing_lists = MailingList::get();

        return view('admin.mailing.contacts', compact('contacts', 'mailing_lists'));
    }
    // attatch emails to specific mailing list
    public function add_contact_to_list(Request $req)
    {
        $list = User::where('id', $req->selected_list)->first();
        $list->contacts()->sync($req->list);
        return redirect()->back()->with('success', 'Contact Attached to list successfully');
    }
    // to show mailing list in mailing list section
    public function mailing_list()
    {
        $mailing_lists = MailingList::get();
        return view('admin.mailing.mailing_list', compact('mailing_lists'));
    }
    // to show list contacts
    public function list_contacts($id = null)
    {
        $contacts = MailingList::with(['contacts'])->where('id', $id)->first()->contacts;
        return view('admin.mailing.list-contacts', compact('contacts'));
    }
    public function store_mailing_list(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'list_name' => 'required',
            ]);
            MailingList::create(['list_name' => $request->list_name]);
            return redirect()->back()->with('success', 'List Added Successfully');
        } else {
            return abort(404);
        }
    }
    public function editMailingListView($id = null)
    {
        $mailing_list = MailingList::where('id', $id)->first();
        // dd($mailing_list);
        return view('admin.mailing.edit_mailing_list', compact('mailing_list'));
    }
    public function update_mailing_list(Request $req, $id = null)
    {
        $mailing_list = MailingList::where('id', $id)->update(['list_name' => $req->list_name]);
        // dd($mailing_list);
        return redirect()->route('mailing_list')->with('success', 'List Name Updated Successfully');
    }
    public function deleteMailingList($id = null)
    {
        $list = MailingList::where('id', $id)->first();

        if ($list->contacts() != null) {
            $list->contacts()->detach();
        }
        $list->delete();
        return redirect()->back()->with('success', 'List Deleted Successfully');
    }
    // to show view send mail to contact list
    public function send_mail_view()
    {
        $mailing_lists = MailingList::get();
        // dd($mailing_lists);
        return view('admin.mailing.send-mail-view', compact('mailing_lists'));
    }
    // send mail selected list
    public function send_mail(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'selected_list' => 'required',
                'logo' => 'required',
                'message' => 'required',
                'subject' => 'required',
                'image' => 'required',
                'url' => 'required',
                'choose_template' => 'required',
            ], [
                'logo.required' => 'Please Choose an Logo',
            ]);
            $contacts = MailingList::where('id', $request->selected_list)->first()->contacts;
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            $image->move(public_path('assets/temp_images_for_mail'), $file_name);
            foreach ($contacts as $contact) {
                $username = $contact->user->username;
                $message = $request->message;
                $subject = $request->subject;
                $choose_template = $request->choose_template;
                $url = $request->url;
                $logo = $request->logo;
                Mail::to(($contact->email == "") ? 'dummy@gmail.com' : $contact->email)
                    ->queue(new SendMailToContactList($subject, $logo, $file_name, $message, $choose_template, $url, $username));
            }
            File::delete(public_path('assets/temp_images_for_mail/') . $file_name);
            return redirect()->back()->with('success', 'Mails Sent Successfully');
        }
    }
    // to show view send mail to account list, labels or artists individually
    public function send_mail_to_individual_view()
    {
        $accounts = Account::get();
        // dd($mailing_lists);
        return view('admin.mailing.send-mail-individually', compact('accounts'));
    }
    // get labels for account with ajax
    public function get_labels(Request $req)
    {
        $labels = Label::where('account_id', $req->account_id)->get();
        $data = "";
        $data .= "<option value=''>Please Select...</option>";
        foreach ($labels as $label) {
            $data .= "<option value='$label->id'>$label->label_name</option>";
        }
        return response($data, 200)
            ->header('Content-Type', 'text/plain');
    }
    // get artists for labels with ajax
    public function get_artists(Request $req)
    {
        $artists = Artist::where('label_id', $req->label_id)->get();
        $data = "";
        $data .= "<option value=''>Please Select...</option>";
        foreach ($artists as $artist) {
            $data .= "<option value='$artist->id'>$artist->name</option>";
        }
        return response($data, 200)
            ->header('Content-Type', 'text/plain');
    }
    // send mail to selected user such as
    public function send_mail_individually(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'selected_account' => 'required',
                'logo' => 'required',
                'message' => 'required',
                'subject' => 'required',
                'image' => 'required',
                'url' => 'required',
                'choose_template' => 'required',
            ], [
                'logo.required' => 'Please Choose an Logo',
            ]);
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            $image->move(public_path('assets/temp_images_for_mail'), $file_name);
            $message = $request->message;
            $subject = $request->subject;
            $logo = $request->logo;
            $choose_template = $request->choose_template;
            $url = $request->url;
            if (!empty($request->selected_artist)) {
                $contact = Artist::where('id', $request->selected_artist)->first();
                $username = $contact->name;
                Mail::to(($contact->contact_email == "") ? 'dummy@gmail.com' : $contact->contact_email)
                    ->queue(new SendMailToContactList($subject, $logo, $file_name, $message, $choose_template, $url, $username));
                goto sentToArtist;
            }
            if (!empty($request->selected_label)) {
                $contact = Label::where('id', $request->selected_label)->first();
                $username = $contact->label_name;
                Mail::to(($contact->email == "") ? 'dummy@gmail.com' : $contact->email)
                    ->queue(new SendMailToContactList($subject, $logo, $file_name, $message, $choose_template, $url, $username));
                goto sentToLabel;
            }
            $contact = Account::where('id', $request->selected_account)->first();
            $username = $contact->user->username;
            Mail::to(($contact->user->email == "") ? 'dummy@gmail.com' : $contact->user->email)
                ->queue(new SendMailToContactList($subject, $logo, $file_name, $message, $choose_template, $url, $username));
            sentToArtist:;
            sentToLabel:;
            File::delete(public_path('assets/temp_images_for_mail/') . $file_name);
            return redirect()->back()->with('success', 'Mail Sent Successfully');
        }
    }
}
