@extends('Layouts.app')

@section('title-block')
	Cообщение №{{ $data->id }} 
@endsection

@section('title-block')
Это содержимое сообщения 
@endsection

@section('top')
	<h1>Сообщение от {{  $data->name }} детально:</h1>
@endsection
	
	
@section('content')
	
		<div class="alert-messages">
			<div class="message">Имя: {{ $data->name }}</div>
			<div class="message">Дата, время: {{ $data->created_at }}</div>
			<div class="message">Текст: {{ $data->message }}</div>
			<a href="{{ route('contact-update', $data->id) }}"><button>Редактировать</button></a>
			<a href="{{ route('contact-delete', $data->id) }}"><button>Удалить</button></a>
		</div>
	
	
@endsection


