<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Cars extends Eloquent{
	
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

}
