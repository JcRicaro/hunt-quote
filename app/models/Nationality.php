<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Nationality extends Eloquent {

	use SoftDeletingTrait;
	
	protected $fillable = ['name'];

	protected $table = 'nationalities';

	public function authors()
	{
		return $this->hasMany('Author');
	}

}