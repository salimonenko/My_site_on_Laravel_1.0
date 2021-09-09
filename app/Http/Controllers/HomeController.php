<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // ����� ����� ���� ������������ ����� ContactController, ���������� �� ������ Contact


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
    public function index() // ��� ������� ���������� �� web.php
    {
        return view('home');
    }
	
	public function showOneMessage($id){ // ������ 1 ������������ �������� // ��� ������� ���������� �� \app\Http\Controllers\ContactController.php
		$contact = Contact::all();
		$message_user_name = $contact->find($id)->name;  // ��� ������������, ������� ����� ������� ��� ��������� (�.�. �� ���� ������)
		$user = auth()->user()->name;   // ��� ������������, ���������� ������
		
			if($message_user_name === $user){
				return view('one-message', ['data' => $contact->find($id)]);
				}else{
				return view('home');  // ���� ��� ������������, ���������� ������ �� �������������� ��� �������� ���������, �� ��������� � ������ ������������, ���������� ��� ���������
				}
				
	}
	
	public function deleteMessage($id){   // ��� ������� ���������� �� \app\Http\Controllers\ContactController.php
	Contact::find($id)->delete();
	return redirect()->route('contact-data')->with('success', '���� ��������� ���� �������');
	}
	
}
