<?php
	
	class homeController extends BaseController{

		
		public function action_index(){
			return View::make('welcomeView');
		}

		public function action_aboutUs(){
			echo "this is the about us page";
		}


	}

?>