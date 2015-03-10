<?php

/*AUTHOR :: NKWETEYIM DAISY @ idb_dev*/
class CarController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all cars
		$carsList=Cars::all();
		return View::make('cars.index', compact ('carsList'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//add new car
		return View::make('cars.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//rule validation
		//$date = date("Y");
		$rules=array(
			'regno' => 'required', 
			'model'=>'required',
			'year'=>'required|integer|digits_between:4,4'
		);

		/*$regno_validate = array('regno.unique'	=>	'Car registration number already existing.
													 Please try another one',);*/

		//get all car information
		$carInfo = Input::all();

		//validate car information with the rules
		$validation=Validator::make($carInfo, $rules);
		if($validation->passes())
		{

			$cars = new Cars();
			$cars->regno = Input::get('regno');
			$cars->model = Input::get('model');
			$cars->year  = Input::get('year');
			$cars->user_id = Auth::user()->id;

			$cars->save();

			return Redirect::route('cars.index')
			->withInput()
			->withErrors($validation)
			->with('success', 'Successfully created car.');
      	}
      	//show error message
      	return Redirect::route('cars.index')
           ->withInput()
           ->withErrors($validation)
           ->with('message', 'Some fields are incomplete.');
	}
		

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$car = Cars::find($id);
        if (is_null($car))
        {
            return Redirect::route('cars.index');
        }
        return View::make('cars.show', compact('car'));
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($regno)
	{
		//delete car
		echo "just changed";
		Cars::where('regno', '=', $regno)->delete();
        return Redirect::route('cars.index')
            ->withInput()
            ->with('success', 'Successfully deleted car.');

	}

	public function action_deleteCar($regno)
	{
		//delete car
		echo "just changed";
		Cars::where('regno', '=', $regno)->delete();
        return Redirect::route('cars.index')
            ->withInput()
            ->with('message', 'Successfully deleted entry.');

	}

	public function action_editCar($regno){
		//echo Request::segment(1);
		$car = Cars::where('regno', '=', $regno)->firstOrFail();

        if (is_null($car))
        {
            return Redirect::route('cars.index');
        }

        return View::make('cars.edit')->with('car' , $car);
	}

	public function action_commitEdits(){
		//create a rule validation
		$rules=array(
            'model'=>'required',
            'year'=>'required|numeric'
        );
        $carInfo = Input::all();
        $validation = Validator::make($carInfo, $rules);
        if ($validation->passes())
        {
            $car = Cars::where('regno', '=', Input::get('regno'))
            ->update(['model' => Input::get('model'), 
            		  'year'  => Input::get('year')]);
           
            return Redirect::route('cars.index')
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'Successfully updated entry.');
        }
        return Redirect::route('cars.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}
}