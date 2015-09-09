<?php

class ContactController extends \BaseController {

	protected $contact;

	public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$data = $this->model->orderBy('name')->get();

		return Response::json($data->toArray());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = new $this->model();

		return Response::json($data['fillable'], 200);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = new $this->model(Input::get());

		//$data->validate();

		if (!$data->save()){

			App::abort(500, 'Record was not saved');
			
		}

		return Response::json($data->toArray(), 201);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = $this->model->find($id);

		if(!$data){

			App::abort(404, 'Record not found');

		}

		return Response::json($data->toArray(), 201);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = $this->model->find($id);

		if(!$data){

			App::abort(404, 'Record not found');

		}

		return Response::json($data->toArray(), 200);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = $this->model->find($id);

		if(!$data){

			App::abort(404, 'Record not found');

		}

		$data->fill(Input::get());

		//$data->validate();

		if(!$data->save()){

			App::abort(500, 'Record not updated');

		}

		return Response::json($data->toArray(), 201);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = $this->model->find($id);

		if(!$data){

			App::abort(404, 'Record not found');

		}

		$data->delete();

		return Response::make(null, 204);
	}


}
