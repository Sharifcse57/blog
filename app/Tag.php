<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
	public $timestamps = true;
	protected $guarded = array('id');

}
