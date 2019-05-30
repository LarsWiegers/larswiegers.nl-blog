<?php


namespace App\Modules\People\Application\Requests;


use Illuminate\Foundation\Http\FormRequest;

class SavePersonRequest extends FormRequest
{
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
			'name' => 'required',
			'id' => 'nullable',
			'birthday' => 'required',
			'email' => 'required'
		];
	}
}
