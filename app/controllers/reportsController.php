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

			if($type != "")
				echo "type is :: " . $type;

			switch (strtolower($type)) {
				case 'cars':
					$cars 	= Cars::orderBy('regno')->get();
					$this->tableCont = $this->formCars($cars);
					break;

				case 'accidents':
					# code ...
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
					No Content for $type so far
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
					          <td class='delEditOptions'>
					          	<button class='warning'>Edit</button>
					          	<button class='danger'>Delete</button>
					          </td>
					        </tr>
					      </tbody>
					      "; 
					  } ;
			$tableContent = 
				"<table class='table table-hover reportTable' id='example' cellspacing='0' >
			      <thead>
			        <tr>
			          <th>Driver Id</th>
			          <th>Driver Name</th>
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



		private function formCars($car_m){
			$cont1=null;
			 foreach ( $car_m as  $car ) { 

			     $cont1 .= "<tbody>
					        <tr>
					          <td>" .  $car->regno 	. 	" </td>
					          <td>" .  $car->model 		.  	"</td>
					          <td>" .  $car->year 		. 	"</td>
					          <td>" .  $car->user_id 	. 	"</td>
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