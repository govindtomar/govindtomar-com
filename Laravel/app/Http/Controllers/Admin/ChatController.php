<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Message;
use Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ChatController extends Controller
{

    public function __construct(){
        $this->middleware(['permission', 'auth']);
    }

    public function index(){
    	$users = User::whereNotIn('id', [ Auth::id() ])->get();
    	return view('admin.chat.user', compact('users'));
    }

    public function chat($id){
    	$this->id = Crypt::decryptString($id);
    	$receiver = User::where('id', $this->id)->first(); 
    	$users = User::whereNotIn('id', [ Auth::id(), $this->id ])->get(); 
    	$messages = Message::where('sender_id', Auth::id())
	    	->where('receiver_id', $this->id)
	    	->orWhere(function ($query) {
           		$query->where('sender_id', $this->id)
			    	->where('receiver_id', Auth::id());				    	
           	})
	    	->orderBy('created_at', 'desc')
	    	->take(40)
	    	->get()->reverse();

    	return view('admin.chat.index', compact('users', 'receiver', 'messages'));
    }

    public function refreshMessage(Request $request){
    	$this->receiver_id = Crypt::decryptString($request->rec);
	    $messages = Message::where('id', '>', $request->lmi)
	    	->where(function ($query) {
           		$query->where('sender_id', Auth::id())
			    	->where('receiver_id', $this->receiver_id)
			    	->orWhere(function ($add) {
		           		$add->where('sender_id', $this->receiver_id)
			    			->where('receiver_id', Auth::id());				    	
		           	});				    	
           	})
           	->orderBy('created_at', 'desc')
	    	->get()->reverse();
    	// return $messages;
    	if ($messages->isNotEmpty()) {
    		$data['html'] = view('admin.chat.chat-message-render', compact('messages'))->render();
    		$data['lmi'] = $messages[0]['id'];
    		return $data;
    	}	    
    }

    public function sendMessage(Request $request){
    	// return $request->all();
    	$mess = new Message;
    	$mess->sender_id = Auth::id();
    	$mess->receiver_id = Crypt::decryptString($request->rec);
    	$mess->message = $request->message;
    	$mess->save();
    	return $mess;
    }

    public function translate(Request $request){
    	$tr = new GoogleTranslate();
		$tr->setSource('en');
		$tr->setTarget('hi');
		$tr = $tr->translate($request->message);
		return $tr;
    }
}
