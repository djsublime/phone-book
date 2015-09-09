<?php

class PhoneBookController extends BaseController {

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.default';


	public function index()
	{

		$data = Contact::paginate(10);

		$this->layout->content = View::make('pages.phone-book')->withData($data);
	}

}
