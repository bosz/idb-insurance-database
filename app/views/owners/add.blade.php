<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
			<h1>this is the add page</h1>
	{{ Form::open(array('action' => 'ownersController@action_addNewOwner')) }}
			<p> {{Form::label('name','Driver\'s Name')}}</p>
	        <p>{{ Form::text('driver_name', '', array('class' => 'form-control','placeholder' => 'driver\'s name')) }}</p>
	        <p> {{Form::label('address','Driver\'s Address')}}</p>
	        <p>{{ Form::text('driver_address', '', array('class' => 'form-control','placeholder' => 'driver\'s address')) }}</p>
	        <p> {{Form::label('gender','Driver Gender')}}</p>
	        <p> {{Form::select('gender',array('male_driver'=>'male','female_driver'=>'female'))}}</p>
	        <p> {{Form::label('phone_number','Phone Number')}}</p>
	        <p>{{ Form::text('phone_number', '', array('class' => 'form-control','placeholder' => 'phone number')) }}</p>
	        <p> {{Form::label('date_of_pbirth','Driver\'s Date of Birth')}}</p>
	        <!--<p>{{ Form::text('date_of_birth', '', array('class' => 'form-control','placeholder' => 'date of birth','type' => 'date')) }}</p>-->
	        <input type="date" class="form-control" id="datepicker" placeholder='date of birth' name='date_of_birth'>
	        <p>{{Form::label('car_matriculation','Car Matriculation')}}</p>
			<p>{{Form::text('car_matriculation', '',array('class' => 'form-control', 'placeholder' => 'car matriculation number '))}}</p>
	        <p>{{ Form::submit('add driver', array('class' => 'btn btn-danger')) }}</p>
	  {{ Form::close() }}
</body>
</html>