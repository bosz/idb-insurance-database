@extends('layouts.car')
@section('main')
<a href="{{ URL::to('logout') }}">Logout</a>
<h1>View Car</h1>
{{ Form::model($car, array('method' => 'PATCH', 
'route' =>array('cars.update', $car->id))) }}
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Model</th>
        <th>Year</th>
    </tr>
    </thead>

    <tbody>
    
    <tr>
      <td>{{ $car->id }}</td>
      <td>{{ $car->model }}</td>
      
      <td>{{ $car->year }}</td>
       
      <td>{{ link_to_route('cars.edit', 'Update', array($car->id),
                array('class' => 'btn btn-primary')) }}</td>
      <td>
        {{ Form::open(array('method'=> 'DELETE', 'route' =>
              array('cars.destroy', $car->id))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
      </td>
    </tr>
   
    </tbody>
</table>

<p>{{ link_to_route('cars.index', 'Vehicle Database') }}</p>
