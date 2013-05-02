<?php

class Address extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'client_id' => 'required',
		'zipcode' => 'required'
	);
}