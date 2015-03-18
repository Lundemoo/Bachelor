<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateLogbookadditionRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'registrationNr' => 'required|unique|max:7',
			'startdestination' => 'required',
			'stopdestination' => 'required',
			'totalkm' => 'required',
			'date' => 'required|date'
		];
	}

}
