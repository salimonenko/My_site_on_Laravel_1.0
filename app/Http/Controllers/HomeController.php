<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Чтобы можно было использовать класс ContactController, основанный на классе Contact


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() // Эта функция вызывается из web.php
    {
        return view('home');
    }
	
	public function showOneMessage($id){ // только 1 динамический параметр // Эта функция перенесена из \app\Http\Controllers\ContactController.php
		$contact = Contact::all();
		$message_user_name = $contact->find($id)->name;  // Имя пользователя, который ранее оставил это сообщение (т.е. из базы данных)
		$user = auth()->user()->name;   // Имя пользователя, пославшего запрос
		
			if($message_user_name === $user){
				return view('one-message', ['data' => $contact->find($id)]);
				}else{
				return view('home');  // Если имя пользователя, пославшего запрос на редактирование или удаление сообщения, не совпадает с именем пользователя, создавшего это сообщение
				}
				
	}
	
	public function deleteMessage($id){   // Эта функция перенесена из \app\Http\Controllers\ContactController.php
	Contact::find($id)->delete();
	return redirect()->route('contact-data')->with('success', 'Ваше сообщение было удалено');
	}
	
}
