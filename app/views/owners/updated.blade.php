<h1>Thank you for updating the data</h1><!-- routed the same way confirm page is routed-->
{{ Form::open(array('action' => 'ownersController@action_confirmModifications')) }}
			<input type="hidden" name= "driver_name" value="">
			<input type="hidden" name= "driver_address" value="">
			<input type="hidden" name= "phone_number" value="">
			<input type="hidden" name= "date_of_birth" value="">
			<input type="hidden" name= "car_matriculation" value="">
			<input type="hidden" name= "gender" value="">
			<input type="hidden" name= "subComit" value="commit" >
{{ Form::close()}}