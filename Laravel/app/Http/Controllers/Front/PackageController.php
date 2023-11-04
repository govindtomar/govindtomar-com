<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function userRolePermission(){
    	return view('front.package.user-role-permission');
    }

    public function crudGenerator(){
    	return view('front.package.crud-generator');
    }
}
