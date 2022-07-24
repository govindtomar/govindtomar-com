<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMeRequest;
use GovindTomar\CrudGenerator\Helpers\CRUDHelper;
use App\Models\ContactMe;
use DB;
use Auth;

class ContactMeController extends Controller
{
    public function index()
    {
        try{
            $contact_mes = ContactMe::paginate(20);
            return view("admin/contact-me/index", compact("contact_mes"));
        }catch(\Exception $e){
            return back();
        }
    }

    public function create()
    {
        try{
            return view("admin/contact-me/create");
        }catch(\Exception $e){
            return back();
        }
    }

    public function store(ContactMeRequest $request)
    {
        try{
            $contact_me = new ContactMe;
            $contact_me->name  =  $request->name;
			$contact_me->email  =  $request->email;
			$contact_me->subject  =  $request->subject;
			$contact_me->message  =  $request->message;
            $contact_me->save();
            return redirect('admin/contact-me/'.$contact_me->id)->with('success', 'You have successfully inserted new contact me');
        }catch(\Exception $e){
            return back()->with('error','Your record has been not submitted successfully ');
        }
    }

    public function show($id)
    {
        try{
            $contact_me = ContactMe::find($id);            
            return view("admin/contact-me/show", compact("contact_me"));
        }catch(\Exception $e){
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $contact_me =  ContactMe::find($id);
            return view("admin/contact-me/edit", compact("contact_me"));
        }catch(\Exception $e){
            return back();
        }

    }

    public function update(ContactMeRequest $request, $id)
    {
        try{
            $contact_me =  ContactMe::find($id);
            $contact_me->name  =  $request->name;
			$contact_me->email  =  $request->email;
			$contact_me->subject  =  $request->subject;
			$contact_me->message  =  $request->message;
            $contact_me->save();
            
            return back()->with('success','You have successfully updated contact me');
        }catch(\Exception $e){
            return back()->with('error','Your record has been not updated successfully');
        }
    }

    public function destroy($id)
    {
        try{
            ContactMe::find($id)->delete();
            return redirect("admin/contact-me")->with('success','Successfully delete contact me');

        }catch(\Exception $e){
            return back()->with('error','contact me was delete');
        }
    }
    


}
