<?php

class Schedule extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'name' => 'required'
	);
}