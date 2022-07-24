<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;

class ArtisanController extends Controller
{
	public function __construct(){
        $this->middleware(['permission', 'auth']);
    }

    public function migrateTable(){
        Artisan::call('migrate');
    }

    public function migrateTableFresh(){
    	Artisan::call('migrate:fresh');
    }
}
