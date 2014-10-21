<?php

class Page extends Eloquent {

	protected $table = 'pages';

	protected $fillable = ['id', 'key', 'value'];

}