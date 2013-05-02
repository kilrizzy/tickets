<?php

class File extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'user_id' => 'required',
		'file' => 'required'
	);
}