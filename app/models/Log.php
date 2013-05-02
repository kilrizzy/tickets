<?php

class Log extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'user_id' => 'required',
		'action' => 'required',
		'data' => 'required'
	);
}