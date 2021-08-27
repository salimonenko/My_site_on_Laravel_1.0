@extends('Layouts.app')

@section('title-block')
	Cообщения 
@endsection

@section('title-block')
Здесь присутствуют все сообщения
@endsection

@section('top')
	<h1>Все сообщения</h1>
@endsection
	
	
@section('content')
	<h1>Сообщения:</h1>
	
	@foreach($data as $element)
		<div class="alert-messages">
			<div class="message">Имя: {{ $element->name }}</div>
			<div class="message">Дата, время: {{ $element->created_at }}</div>
			<div class="message">Сообщение: {{ $element->message }}</div>
			<a href="{{ route('contact-dataOne', $element->id) }}"><button>Редактировать</button></a>
			<a href="{{ route('contact-delete', $element->id) }}"><button>Удалить</button></a>
		</div>
	@endforeach
	
@endsection


