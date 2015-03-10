<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Participants extends Eloquent{
	
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	public static $me = " a static variable";

	public static function getDeleted($query){
		return $query->where('reportNumber', '=', 33)->get();
	}

	public static function test(){
		return " <><><<><><><><> from the model <><><><><><><><><> ";
	}

}
