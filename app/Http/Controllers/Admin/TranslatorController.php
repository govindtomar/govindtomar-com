<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslatorController extends Controller
{
	public function create(){
    	$tr = new GoogleTranslate();
		$tr->setSource('en');
		$tr->setTarget('hi');
		$tr = $tr->translate('Hello World!');
		return view('translate.create', compact('tr'));
	}

	public function sendMessage(){}
    public function translate(){
    	$tr = new GoogleTranslate();
		$tr->setSource('en');
		$tr->setTarget('hi');
		$tr = $tr->translate('Hello World!');
		return view('translate.create', compact('tr'));
    }
}
