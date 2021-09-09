<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
	 * Правила валидации прописаны в файле \project1\resources\lang\ru\validation.php
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
    public function rules(){ // Валидация полей формы (правила)
        return [
            'message' => 'required|min:5|max:20',
			'email' => 'required',
			'name' => 'required',
        ];
    }
	
	public function messages(){ // СТАНДАРТНАЯ функция, переопределяющая сообщения об ошибках валидации
		return [
			'email.required' => 'Поле "email" является обязательным!',
			'name.required' => 'Поле "Имя" является обязательным!',
			'message.min' => 'Слишком короткий текст: требуется не менее 5 символов',
			'message.max' => 'Слишком длинный текст: допустимо не более 20 символов',
		];
	}
}
