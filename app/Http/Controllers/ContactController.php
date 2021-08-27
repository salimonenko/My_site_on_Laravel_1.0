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

	public function showOneMessage($id){ // только 1 динамический параметр
		$contact = Contact::all();
		return view('one-message', ['data' => $contact->find($id)]);
	}
	
public function updateMessage($id){ 
		$contact = new Contact(); 

		return view('update-message', ['data' => $contact->find($id)]);
	}

public function updateMessageSubmit($id, ContactRequest $req){
//		return "Ваше сообщение успешно отправлено!";

		$contact = Contact::find($id);   // 
		$contact->name = $req->input('name');
		$contact->email = $req->input('email');
		$contact->message = $req->input('message');
		
		$contact->save();  // Сохраняем (обновляем) объект в базе данных
		
		return redirect()->route('contact-dataOne', $id)->with('success', 'Ваше сообщение было обновлено');
	}
	
	
public function deleteMessage($id){
	Contact::find($id)->delete();
	return redirect()->route('contact-data')->with('success', 'Ваше сообщение было удалено');
	}


	
}


