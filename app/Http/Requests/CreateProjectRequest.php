<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProjectRequest extends Request {

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
            'projectID' => 'required',
            'projectName' => 'required',
            'projectAddress' => 'required',
            'budget' => 'required',
            'startDate' => 'required',
            'description' => 'required',
            'expectedCompletion' => 'required',
            'done' => 'required'

        ];
    }

}
