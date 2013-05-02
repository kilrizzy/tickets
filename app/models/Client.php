<?php

class Client extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'user_id' => 'required',
		'name' => 'required'
	);
}