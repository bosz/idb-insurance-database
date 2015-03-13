<?php 
	/**
	* 
	*/
	class Owners extends Eloquent
	{
		use SoftDeletingTrait;

		protected $dates = ['deleted_at'];
		protected $table = 'owners';
		protected $fillable = array('name', 'address', 'date_of_birth', 'phone_number', 'car_matriculation', 'gender');
		public $timestamp = true;
		//validation rules
		public static $form_rules = array(
			'driver_name' =>  'required', 
			'driver_address' => 'required',
			'phone_number' => 'required',
			'date_of_birth' => 'required',
			'car_matriculation' => 'required'
			);
	}
 ?>