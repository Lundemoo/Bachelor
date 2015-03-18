<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTimelisteprosjektRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;//må forandres hvis vi skal bruke metoden
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'projectId' => 'required|unique',
			'date' => 'required|date',
			'starttime' => 'required',
			'endtime' => 'required',
			'comment' => 'required'
		];
	}

}
