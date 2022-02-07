<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ['name','slug','status','user_id','description'];
	protected $attributes = [
		'hit'=>1 ,
		'status' => 1 ,
	];
	
    public function categories()
	{
		return $this->belongsToMany(Category::class);
	}
	
	    public function user()
	{
		return $this->belongsTo(User::class);
	}
}
