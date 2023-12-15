<?php
namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact; //
class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $contact=new Person();
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->message=$request->input('message');
        $contact->save();
        $all = Person::all();
//        return redirect()->route('/welcome');
        return view('welcome', compact('all'));
    }
    public function allMessages()
    {
        return view('messages',['data'=>Contact::all()]);
    }
    public function ShowOneMessage($id)
    {
        $contact=new Contact;
        return view('oneMessage', ['data'=> $contact->find($id)]);
    }
    public function UpdateMessage($id)
    {
        $contact=new Contact;
        return view('updateMessage', ['data'=> $contact->find($id)]);
    }
    public function UpdateMessageSubmit($id, Request $request)
    {
        $contact=Contact::find($id);
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->message=$request->input('message');
        $contact->save();
        return redirect()->route('OneContact', $id);
    }
    public function DeleteMessage($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('AllContacts');
    }
}
