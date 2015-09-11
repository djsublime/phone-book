<?php

class Contact extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contact';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('name','surname','phone','address','comment');

	public function validate()
	{	

		if(isset($this->attributes['id'])){

			$update_id = $this->attributes['id'];
			
		}else{

			$update_id = false;
		}

		$validator = Validator::make($this->attributes, array(
			'name'  => 'required|min:3',
			'surname' => 'required|min:3',
			'phone' => 'required|integer|unique:contact'. ($update_id ? ",phone,$update_id" : '')
		));

		if ($validator->fails())
		{
			return $validator->messages();
		}

		return false;
	}

}
