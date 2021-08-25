<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Если true, то для ВСЕХ пользователей (в т.ч. неавторизованных)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){ // Валидация полей формы
        return [
            'message' => 'required|min:5|max:100',
			'email' => 'required'
        ];
    }
	
	public function messages(){
		return [
			'email.requred' => 'Поле "email" является обязательным!'
		];
	}
}
