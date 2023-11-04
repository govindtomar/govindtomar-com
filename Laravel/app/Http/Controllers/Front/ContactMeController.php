<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMeRequest;
use GovindTomar\CrudGenerator\Helpers\CRUDHelper;
use App\Models\ContactMe;
use DB;
use Auth;

class ContactMeController extends ApiController
{
    public function store(ContactMeRequest $request)
    {
        try{
            $contact_me = new ContactMe;
            $contact_me->name  =  $request->name;
			$contact_me->email  =  $request->email;
			$contact_me->phone  =  $request->phone;
			$contact_me->message  =  $request->message;
            $contact_me->save();

            return $this->response([
                'status' => $this->getStatusCode(),
                'message' => 'Thanks, We will contact you soon',
            ]);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

}
