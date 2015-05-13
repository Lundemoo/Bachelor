<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;
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
			'projectID' => 'required',
			'date' => 'required',
			'starttime' => '',
			'endtime' => '',
			'comment' => 'required'


		];
	}

}
