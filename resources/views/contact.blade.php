@extends('Layouts.app')

@section('title-block')
	Заголовок страницы: Контакты 
@endsection

@section('title-block')
Здесь страница контактов: на деревню к Салимоненко Д.А.
@endsection

@section('top')
	<h1>На деревню к Салимоненко Д.А.</h1>
@endsection


@section('content')
	<h1>contact (Контакты)</h1>
	<p>Мои контакты - на этом сайте: <a href="//4846d.ru">4846d.ru</a>.</p>

	
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
	  <form action="{{ route('form-contacts-handler') }}" method="post">  <!--  это при помощи имени обработчика, указанного в файле web.php  -->
	
		@csrf  <!--  Защищенный ключ - специфика Laravel  -->
		<div class="form-contacts">
			<p>Или Вы можете отправить мне сообщение:</p>
			<div class="form-contacts" >
				<label for="name">Ваше имя: </label>
				<input type="text" name="name" placeholder="Введите Ваше имя..." id="name" />
			</div>
			
			<div class="form-contacts" >
				<label for="email">Ваш e-mail: </label>
				<input type="text" name="email" placeholder="Введите Ваш e-mail..." id="email" />
			</div>
			
			<div class="form-contacts" >
				<label for="message">Текст сообщения:</label>
				<textarea type="text" name="message" placeholder="О чем Вы хотите написать мне?..." id="message" ></textarea>
			</div>		
			
			<button type="submit" class="btn-success">Отправить сообщение</button>
		
		</div>
	</form>

	
@endsection