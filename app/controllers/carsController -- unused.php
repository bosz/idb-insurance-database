<?php
	
	class carsController extends BaseController{

		
		
		public function action_index(){
			
			$restful = array("this is from the controller");
			return View::make('cars.home', array('user' => $restful));
    
		}

		public function action_addCar(){
			return View::make('cars/add');
		}

		public function action_viewCars(){
			return View::make('cars/info');
		}

	}
	
?>