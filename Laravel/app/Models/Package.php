<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

	protected $table = 'packages';
	
    protected $fillable = ['name','user_id','slug','path','description','image','publish','meta_title','meta_description','meta_keyword',];

    public function user(){
		return $this->belongsTo(User::class);
	}

    
}