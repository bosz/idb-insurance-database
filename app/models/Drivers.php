<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Drivers extends Eloquent{
	
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	public function getAllCars(){
		
	}

}
