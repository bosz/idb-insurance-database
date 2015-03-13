<?php
	
	class reportsController extends BaseController{

		protected $tableCont;

		public function action_index(){

			$type = "Drivers";
			$drivers 	= Drivers::orderBy('driver_id')->get();

			$this->tableCont = $this->formDrivers($drivers);

			return View::make('reports.home', 
				array('reportTable' => 	$this->tableCont, 
					  'type' 		=>	$type));
			
		}

		public function action_categorical($type){

			$this->defaultEmptyMsg($type);

			/*if($type != "")
				echo "type is :: " . $type;*/

			switch (strtolower($type)) {
				case 'cars':
					$cars 	= Cars::orderBy('regno')->get();
					$this->tableCont = $this->formCars($cars);
					break;

				case 'accidents':
					$this->tableCont = $this->formAccidents();
					break;

				case 'drivers':
					$drivers 	= Drivers::orderBy('driver_id')->get();
					$this->tableCont = $this->formDrivers($drivers);
					break;
				
				default:
					# code...
					break;
			}
			

			return View::make('reports.home', 
				array('reportTable' => 	$this->tableCont, 
					  'type' 		=>	$type));
		}

		private function defaultEmptyMsg($type){
			$this->tableCont = "<center><br><br>
				<strong class='warning'>
					No Records for $type so far
				</strong>
					<br><br></center>";
		}

		private function formDrivers($driver_m){
			$cont1=null;
			 foreach ( $driver_m as  $value ) { 

			     $cont1 .= "<tbody>
					        <tr>
					          <td>" .  $value->driver_id 	. 	" </td>
					          <td>" .  $value->name 		.  	"</td>
					          <td>" .  $value->address 		. 	"</td>
					          <td>" .  $value->created_at 	. 	"</td>
					        </tr>
					      </tbody>
					      "; 
					  } ;
			$tableContent = 
				"<table class='table table-hover reportTable display' id='filteringTable' cellspacing='0' >
			      <thead>
			        <tr>
			          <th>Driver Id</th>
			          <th>Driver Name</th>
			          <th>Address</th>
			          <th>Creation Date</th>
			        </tr>
			      </thead>"
			      . $cont1 . 
			    "</table>"
			;
			return $tableContent;
		}

		private function formAccidents(){
			$type = "Accidents";
			$affectedDrivers = "";
			/*where('driver_id', '=', $driver_id)->*/
			$driverWithCars = Owns::get(array('driver_id', 'regno'));
			$crushedCars = Participants::get(array('regno', 'driver_id'));


			$affectedDrivers .= "<table class='table table-hover reportTable accidentReport' >";
			$affectedDrivers .= "<thead><tr><th>Driver's ID</th><th>Vehicles involved in Accident</th></tr></thead>";
			foreach ($driverWithCars as $key1 => $driverWithCar) {
				$affectedDrivers .= "<tr>" . "<td>" . $driverWithCar->driver_id . "</td><td><ul class=''>";
				echo $counter = (int)0;
				foreach ($crushedCars as $key2 => $crushedCar) {
					if($driverWithCar->regno == $crushedCar->regno){
						$affectedDrivers .= "<li>" . $driverWithCar->regno . "</li>" ;
						$counter++;
					}
				}
				$affectedDrivers .= "<li><strong>Total : " . $counter . " </strong></li>";
				$affectedDrivers .= "</ul></td></tr>";
			}
			$affectedDrivers .= "</table>";
			return $affectedDrivers;
		}


		public function driversCarInvolvedInAccident(){
			$driver_id = Input::get('driver_id');
			$type = "Accidents";
			$affectedDrivers = "";
			/*where('driver_id', '=', $driver_id)->*/
			$driver_id = explode(',', $driver_id);
			$driverWithCars = Owns::whereIn('driver_id', $driver_id)->get(array('driver_id', 'regno'));
			$crushedCars = Participants::get(array('regno', 'driver_id'));


			$affectedDrivers .= "<table class='table table-hover reportTable display'>";
			$affectedDrivers .= "<thead><tr><th>Driver's ID</th><th>Vehicles involved in Accident</th></tr></thead>";
			foreach ($driverWithCars as $key1 => $driverWithCar) {
				$affectedDrivers .= "<tr>" . "<td>" . $driverWithCar->driver_id . "</td><td><ul>";
				$counter = 0;
				foreach ($crushedCars as $key2 => $crushedCar) {
					if($driverWithCar->regno == $crushedCar->regno)
						$affectedDrivers .= "<li>" . $driverWithCar->regno . "</li>" ;
						++$counter;
				}
				$affectedDrivers .= "<li><strong>Total : " . $counter . " </strong></li>";
				$affectedDrivers .= "</ul></td></tr>";
			}
			$affectedDrivers .= "</table>";
			//echo sizeof($affectedDrivers);

			return View::make('reports.home')
			->with('reportTable', $affectedDrivers)
			->with('type', $type); 
		}

		private function formCars($car_m){
			$cont1=null;
			 foreach ( $car_m as  $car ) { 

			     $cont1 .= "<tbody>
					        <tr>
					          <td>" .  $car->regno 	. 	" </td>
					          <td>" .  $car->model 		.  	"</td>
					          <td>" .  $car->year 		. 	"</td>
					          <td>" .  $car->created_at 	. 	"</td>
					          <td class='delEditOptions'>
					          	<button class='warning'>Edit</button>
					          	<button class='danger'>Delete</button>
					          </td>
					        </tr>
					      </tbody>
					      "; 
					  } ;
			$tableContent = 
				"<table class='table table-hover reportTable'>
			      <thead>
			        <tr>
			          <th>Car RegNo</th>
			          <th> Name</th>
			          <th>Address</th>
			          <th>Creation Date</th>
			          <th>Options</th>
			        </tr>
			      </thead>"
			      . $cont1 . 
			    "</table>"
			;
			return $tableContent;
		}


	}
	
?>