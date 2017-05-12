<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function reviews() {
		return $this->hasMany('App\Review');
	}
	
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}
}
