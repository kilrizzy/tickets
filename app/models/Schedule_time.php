<?php

class Schedule_time extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'day' => 'required'
	);
}