<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
	public $timestamps = true;
	protected $guarded = array('id');

	public function tags() {
		return $this->belongsToMany('App\Tag');
	}
}
