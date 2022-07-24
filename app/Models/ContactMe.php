<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactMe extends Model
{
	use SoftDeletes;

	protected $table = 'contact_me';
	
    protected $fillable = ['name','email','subject','message',];

    

    
}