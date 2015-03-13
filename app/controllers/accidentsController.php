<?php
	
	class accidentsController extends BaseController{

		public function action_index(){
			$regno = Cars::query()->get(array('regno'));

			$driver = Drivers::query()->get(array('name', 'driver_id'));

			$accidents = Accidents::orderBy('created_at', 'desc')->get();
			$participants = Participants::orderBy('created_at', 'desc')->get();

			return View::make('accidents.home')
			->with('regnoList', $regno)
			->with('driver_idList', $driver)
			->with('accidents', $accidents)
			->with('participants', $participants);
		}

		public function action_recordAccidentDisplay(){
			$regno = Cars::query()->get(array('regno'));

			$driver = Drivers::query()->get(array('name', 'driver_id'));


			return View::make('accidents.add')
			->with('regnoList', $regno)
			->with('driver_idList', $driver);
		}

		public function action_recordAccidents(){

			$rules=array(
				'regno' => 'required', 
				'driver_id'=>'required',
				'date'=>'required|date',
				'location'=>'required'
				);

			$validation=Validator::make(Input::all(), $rules);
			if($validation->passes()){

				$accidents = new Accidents();
				$accidents->location = Input::get('location');
				$accidents->date = Input::get('date');
				$accidents->user_id = Auth::user()->id;

				$accidents->save();

				$reportNumberR = $this->getLastAccidentRecord();

				foreach ($reportNumberR as $key => $value) {
					$rn = $value['reportNumber'];
				}

				$participants = new Participants();
				$participants->reportNumber = $rn;
				$participants->regno = Input::get('regno');
				$participants->driver_id = Input::get('driver_id');
				$participants->damage_amount = Input::get('damage_amount');
				$participants->user_id = Auth::user()->id;

				$participants->save();

				return Redirect::route('homeAccidents')
				->withInput()
				->withErrors($validation)
				->with('success', 'Successfully saved accident record.');
			}

			return Redirect::route('homeAccidents')
           ->withInput()
           ->withErrors($validation)
           ->with('message', 'Some fields are incomplete.');

		}

		public function action_addParticipantForm(){
			$regno = Cars::query()->get(array('regno'));

			$driver = Drivers::query()->get(array('name', 'driver_id'));

			$accidents = Accidents::all();
			$participants = Participants::all();

			return View::make('accidents.participate')
			->with('regnoList', $regno)
			->with('driver_idList', $driver)
			->with('accidents', $accidents)
			->with('participants', $participants);
		}

		public function action_addParticipant(){

			$rules=array(
				'reportNumber' => 'required', 
				'driver_id'=>'required',
				'regno'=>'required'
				);

			$validation=Validator::make(Input::all(), $rules);

			if($validation->passes()){
				$participants = new Participants();
				$participants->reportNumber = Input::get('reportNumber');
				$participants->regno = Input::get('regno');
				$participants->driver_id = Input::get('driver_id');
				$participants->damage_amount = Input::get('damage_amount');
				$participants->user_id = Auth::user()->id;

				$participants->save();

				return Redirect::route('homeAccidents')
				->withInput()
				->withErrors($validation)
				->with('success', 'Participant added to accident with record number ' . Input::get('reportNumber') . "<br> Succesfull insertion");
			}

			return Redirect::route('homeAccidents')
           ->withInput()
           ->withErrors($validation)
           ->with('message', 'Some fields are incomplete.');

		}

		public function action_viewAccidents(){
			return View::make('accidents/info');
		}


		public function getLastAccidentRecord(){
			return Accidents::query()->orderBy('reportNumber', 'DESC')->take(1)->get(array('reportNumber'));
		}

		public function action_editAccident($reportNumber){
			$accident = Accidents::where('reportNumber', '=', $reportNumber)->first();

	        if (is_null($accident))
	        {
	            return Redirect::route('homeAccidents');
/*	            ->with('errors', 'Something went wrong along the way');
*/	        }

	        return View::make('accidents.editAccidentDetails')->with('accidents' , $accident);
	    }

		public function action_deleteAccident($reportNumber){
			/*i am going to try using soft delete*/

			/*delet all the participants first of all*/
			$participant = Participants::where('reportNumber', '=', $reportNumber)->delete();

			/*now, delete the accident record*/
			$accident = Accidents::where('reportNumber', '=', $reportNumber)->delete();

			return Redirect::route('homeAccidents')
				->with('success', 'Deletion succesfull');
			
		}

		public function action_commitEditedAccident(){
			//create a rule validation
			$rules=array(
	            'date'=>'required',
	            'location'=>'required'
	        );
	        $accident = Input::all();
	        $validation = Validator::make($accident, $rules);
	        if ($validation->passes())
	        {
	            $accident = Accidents::where('reportNumber', '=', Input::get('reportNumber'))
	            ->update(['date' => Input::get('date'), 
	            		  'location'  => Input::get('location')]);
	           
	            return Redirect::route('homeAccidents')
	                ->with('success', 'Successfully updated entry.');
	        }
	        return Redirect::route('homeAccidents')
	            ->withErrors($validation)
	            ->with('errors', 'There were validation errors.');
		}

		public function action_editParticipant($reportNumber, $regno){
			$participant = Participants::where('regno', '=', $regno)
			->where('reportNumber', '=', $reportNumber)->first();

			
	        if (is_null($participant))
	        {
	            return Redirect::route('homeAccidents');
	        }

			$regno = Cars::query()->get(array('regno'));
			$driver = Drivers::query()->get(array('name', 'driver_id'));

			return View::make('accidents.editParticipants')
			->with('participantInfo', $participant)
			->with('regnoList', $regno)
			->with('driver_idList', $driver);
		}

		public function action_commitEditParticipants(){
		//create a rule validation
			$rules=array(
				'driver_id'		=>	'required',
				'regno'			=>	'required',
				'damage_amount' => 	'required'
				);
	        $participant = Input::all();
	        $validation = Validator::make($participant, $rules);
	        if ($validation->passes())
	        {
	            $participant = Participants::where('regno', '=', Input::get('oldregno'))
	            ->where('reportNumber', '=', (int)Input::get('reportNumber'))
	            ->update(['driver_id' => Input::get('driver_id'), 
	            		  'damage_amount' => Input::get('damage_amount'),
	            		  'regno'  => Input::get('regno')]);
	           
	            return Redirect::route('homeAccidents')
	                ->with('success', 'Successfully updated participant info.');
	        }
	        return Redirect::route('homeAccidents')
	            ->withErrors($validation)
	            ->withInput()
	            ->with('message', 'There were validation errors.');


		}
	}
	
?>