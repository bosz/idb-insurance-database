<h1>This is the confirm modifications page</h1>

{{ Form::open(array('action' => 'ownersController@action_modifyInfo')) }}
			
			<p> {{Form::label('name','Driver\'s Name')}}</p>
	        <input type="text" name= "driver_name" value="{{$selectedOwner->name}}">
	        <p> {{Form::label('address','Driver\'s Address')}}</p>
	        <input type="text" name= "driver_address" value="{{$selectedOwner->address}}">
	        <p> {{Form::label('gender','Driver Gender')}}</p>
	        <p> {{Form::select('gender',array('male_driver'=>'male','female_driver'=>'female'))}}</p>
	        <p> {{Form::label('phone_number','Phone Number')}}</p>
		        <input type="text" name= "phone_number" value="{{$selectedOwner->phone_number}}">
	        <p> {{Form::label('date_of_pbirth','Driver\'s Date of Birth')}}</p>
	        <input type="text" name= "date_of_birth" value="{{$selectedOwner->date_of_birth}}">
	        <input type="hidden" name="car_matriculation" value="{{$selectedOwner->car_matriculation}}">
			<p>{{Form::submit('update driver', array('class' => 'form-control'))}}</p>
{{Form::close()}}

{{Form::open(array('action' => 'ownersController@action_viewOwners'))}}
			<p>{{Form::submit('go back', array('class' => 'form-control'))}}</p>
{{ Form::close() }}


	