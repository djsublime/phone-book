<?php

class PhoneBookController extends BaseController {

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.default';


	public function index()
	{

		$data = Contact::paginate(10);

		Debugbar::info($data->toArray());

		$this->layout->content = View::make('pages.phone-book')
								->withData($data);
	}

	public function edit($id){

		$this->layout->content = View::make('pages.phone-book-edit')
		           				->with('contact', Contact::find($id));
	}

	public function update($id){

		Debugbar::info(Input::all());

		$data = Contact::find($id);

		if($data){

			$message = $this->message('success','Success ! ', 'Record Updated.');

			$data->fill(Input::get());

			if($data->isDirty()){

				if($data->validate()){

					return Redirect::back()->with('errors', $data->validate());
				}

				if(!$data->save()){

					$message = $this->message('danger','Error ! ', 'Record updating error !!.');

				}
			}else{

				$message = $this->message('warning','Notice ! ', 'Record not changed !!');
			}

		}else{

			$message = $this->message('danger','Error ! ', 'Record not found !!');
		}

		return Redirect::route('phone-book')->with('message', $message);
	}

	public function save(){

		$data = new Contact(Input::get());

		$message = $this->message('success','Success ! ', 'Record saved !!');

		if($data->validate()){


			return Redirect::back()->with('errors', $data->validate());
		}

		if (!$data->save()){

			$message = $this->message('danger','Error ! ', 'Record saving error !!');
			
		}

		return Redirect::route('phone-book')->with('message', $message);
	}

	public function delete($id){;

		$data = Contact::find($id);

		if($data){

			$message = $this->message('success','Success ! ', 'Record deleted.');

			$data->delete();

		}else{

			$message = $this->message('danger','Error ! ', 'Record not found !!');
		}

		return Redirect::route('phone-book')->with('message', $message);
	}

}
