<?php

class Ticket extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'completion_time' => 'required',
		'description' => 'required'
	);
}