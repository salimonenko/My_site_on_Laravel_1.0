<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller{
    
/*	public function submit(Request $req){
//	dd($req->input('message')); // Вывод переменной сообщения POST с именем  message
		$validation = $req->validate([
			'message' => 'required|min:5|max:100',
			'email' => 'required'
		]);
		return "OK";
	}
*/

	public function submit(ContactRequest $req){
//		return "Ваше сообщение успешно отправлено!";

		$contact = new Contact();   // Заполняем базу данных содержимым полей формы, присланной из браузера
//		$contact->Имя_Поля_базы_Данных = $req->input('Имя_Поля_Формы');
		$contact->name = $req->input('name');
		$contact->email = $req->input('email');
		$contact->message = $req->input('message');
		
		$contact->save();  // Сохраняем объект в базе данных
		
		return redirect()->route('contact')->with('success', 'Ваше сообщение было добавлено');
	}

	public function allData(){
//		$contact = new Contact();  // Это если создавать НОВУЮ базу данных
//		$contact->all();
		$contact = Contact::all(); // Если так - в одну строчку, сразу обращаемся к классу - когда к УЖЕ ИМЕЮЩЕЙСЯ базе данных
		
		return view('messages', ['data' => $contact]);
		
	}
	
}


