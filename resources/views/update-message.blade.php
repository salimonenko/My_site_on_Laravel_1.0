@extends('Layouts.app')

@section('title-block')
	Редактирование и отправка сообщения заново
@endsection


@section('top')
	<h1>Редактирование сообщения от: {{ $data->name }}</h1>
@endsection


@section('content')
	
	
	@if($errors->any())
		<div class="alert alert-error">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	
	@if(session('success'))
		<div class="alert alert-success">
			Ваше сообщение отправлено!
		</div>
	@endif
	
	
<!--  <form action="/contact/submit" method="post"> - это напрямую  -->
	  <form action="{{ route('contact-updateSubmit', $data->id) }}" method="post">  <!--  это при помощи имени обработчика, указанного в файле web.php  -->
	
		@csrf  <!--  Защищенный ключ - специфика Laravel  -->
		<div class="form-contacts">
			<h2>Форма редактирования:</h2>
			<div class="form-contacts" >
				<label for="name">Имя отправителя: </label>
				<input type="text" name="name" value="{{$data->name}}" placeholder="Имя..." id="name" />
			</div>
			
			<div class="form-contacts" >
				<label for="email">e-mail отправителя: </label>
				<input type="text" name="email" value="{{$data->email}}" placeholder="e-mail..." id="email" />
			</div>
			
			<div class="form-contacts" >
				<label for="message">Текст сообщения:</label>
				<textarea type="text" name="message"  placeholder="Текст..." id="message" >{{$data->message}}</textarea>
			</div>		
			
			<button type="submit" class="btn-success">Обновить</button>
		
		</div>
	</form>

	
@endsection