<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

	protected $table = 'blogs';
	
    protected $fillable = ['name','user_id','slug','path','description','image','publish','meta_title','meta_description','meta_keyword',];

    public function user(){
		return $this->belongsTo(User::class);
	}

    
}