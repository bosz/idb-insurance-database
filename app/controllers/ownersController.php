<?php
	
	class ownersController extends BaseController{

		public function action_index(){

			$driver = Drivers::all();
			$own = Owns::all();

			$driverOnly = Drivers::query()->get(array('name', 'driver_id'));
			$regnoOnly = Cars::query()->get(array('regno'));

			return View::make('owners.home')
			->with('regnoList', $regnoOnly)
			->with('driver_idList', $driverOnly)
			->with('drivers', $driver)
			->with('owns', $own);;
		}
/*-----------------------------------------------------------------------------------ADDING OWNERS----------------------------------------------------*/
		
		public function action_linkDriverToCar(){
			$verification = Input::all();
			$rules=array(
			'driver_id' => 'required', 
			'regno' => 'required'
			);
			$validation=Validator::make($verification, $rules);
			if($validation->passes())
			{
				$own = new Owns();
				$own->regno 			= 	Input::get('regno');
				$own->driver_id 		= 	Input::get('driver_id');
				$own->user_id 			= 	Auth::user()->id;
				
				if ( $own->save()) {
					return Redirect::route('homeOwners')
					->withInput()
					->withErrors($validation)
					->with('success', 'Driver ' . Input::get('driver_id') . " succesfully linked to car " . Input::get('regno'));
				}
				else{
					return Redirect::route('homeOwners')
						->withInput()
						->with('error', 'An error occured while linking driver ' . Input::get('driver_id') . " to car " . Input::get('regno'));
				}
			}
			else
				return Redirect::route('homeOwners')
					->withInput()
					->withErrors($validation)
					->with('error', 'Input Error. Please Check you all fields to make sure they are properly formatted');
		}

		public function action_unlinkDriverFromCar($driver_id, $regno){

			$own = Owns::where('driver_id', '=', $driver_id)
					->where('regno', '=', $regno)->delete();

			return Redirect::route('homeOwners')
				->with('success', 'Link between driver ' 
					. $driver_id. " and car " 
					. $regno. " broken succesfully");
		
		}

		
		public function action_addNewOwner(){ //this services the add.blade.php page; passing all values to the confirm page
			return View::make('owners/confirm')->with('data', Input::all());
		}

		public function action_canceledEdit(){
			return Redirect::route('homeOwners')
				->with('info', 'Insertion of driver canceled');
		}

		public function action_successfullyAddedOwnerpost(){
			//get all owner information
			$verification = Input::all();
			//basic validation rules
			$rules=array(
			'name' => 'required', 
			'address'=>'required',
			'phone_number'=>'required',
			'date_of_birth' => 'required',
			'regno' => 'required'
			);
			$validation=Validator::make($verification, $rules);
			if($validation->passes())
			{

				$driver = new Drivers();
				$driver->driver_id 		= 	Input::get('driver_id');
				$driver->name 			= 	Input::get('name');
				$driver->address 		= 	Input::get('address');
				$driver->dob 			= 	Input::get('date_of_birth');
				$driver->phone_number 	= 	Input::get('phone_number');
				$driver->gender 		= 	Input::get('gender');
				$driver->user_id 		= 	Auth::user()->id;

				$own = new Owns();
				$own->regno 			= 	Input::get('regno');
				$own->driver_id 		= 	Input::get('driver_id');
				$own->user_id 			= 	Auth::user()->id;
				
				//$driver->save();
				if ($driver->save() && $own->save()) {
					return Redirect::route('homeOwners')
					->withInput()
					->withErrors($validation)
					->with('success', 'Driver succesfully added to idb');

				}
				else{
					return Redirect::route('homeOwners')
						->withInput()
						->with('error', 'Error while trying to add driver');
				}
			}
			else
				return Redirect::route('homeOwners')
					->withInput()
					->withErrors($validation)
					->with('error', 'Error while trying to add driver');
		}
/*-------------------------------------------------------------------------------------MODIFYING OWNERS----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
		public function action_viewOwners(){
			//$carOwners = Owners::all();
			$carOwners = DB::table('owners')->select('name', 'address', 'date_of_birth', 'phone_number', 'regno', 'gender')->get();
			//var_dump($carOwners);
			return View::make('owners/info')->with('carOwners', $carOwners);
		}

		public function action_deleteOwner($driver_id){
			
			$driver = Drivers::where('driver_id', '=', $driver_id)
			->delete();

			return Redirect::route('homeOwners')
				->with('success', 'Driver ' 
					. $driver_id . " deleted succesfully");
		
		}

		public function action_editDriverInfo($driver_id){
			$driverInfo = Drivers::where('driver_id', '=', $driver_id)->first();
			return View::make('owners.edit')->with('data', $driverInfo);
		}

	    public function action_commitEdit(){
	    	$driver = Drivers::where('driver_id', '=', Input::get('driver_id'))
            ->update(['name' => Input::get('name'), 
            		  'address'  => Input::get('address'),
            		  'dob' => Input::get('date_of_birth'),
            		  'phone_number' => Input::get('phone_number'),
            		  'gender' => Input::get('gender')
            		  ]);;
	    	return Redirect::route('homeOwners')
				->with('success', 'Driver ' . Input::get('driver_id') . " info succesfully updated");
			
	    }


	    
	}
	
?>