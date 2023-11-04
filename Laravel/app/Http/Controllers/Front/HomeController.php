<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactMeRequest;
use App\Models\ContactMe;

class HomeController extends Controller
{
    public function index(){
    	return view('front.home.index');
    }

    public function contactMe(ContactMeRequest $request)
    {
    	// return $request->all();
    	if ($request->ajax()) {
	        try{
	            $contact_me = new ContactMe;
	            $contact_me->name  =  $request->name;
				$contact_me->email  =  $request->email;
				$contact_me->subject  =  $request->subject;
				$contact_me->message  =  $request->message;
	            $contact_me->save();

	            return response()->json([
	            	'status' => 200,
	            	'message'	=>	'Your query in submitted. i will reply you soon'
	            ]);
	        }catch(\Exception $e){
	        	return response()->json([
	            	'status' => 401,
	            	'message'	=>	'Oops somthing went wrong'
	            ]);
	        }
        }
    }
}
