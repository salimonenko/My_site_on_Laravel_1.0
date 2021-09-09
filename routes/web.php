<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home_about', function () {
    return view('home_about');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


/* Route::post('/contact/submit', function () {
    return "OK";
});
*/

/*Route::post('/contact/submit', function () {
//    return dd(Request::all());  // ����� ������, ���������� �� �����, � ���� ��������
 })->name('form-contacts-handler'); // ��� ����������� ������� �������
*/

Route::post('/contact/submit', 'App\Http\Controllers\ContactController@submit')->name('form-contacts-handler');

//Route::get('/', [App\Http\Controllers\Cover::class, 'index'])->name('cover');


Route::get('/contact/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessage')->name('contact-update'); // {id} - ��� ����� ������������ ��������, ������������ �� get-�������

Route::post('/contact/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessageSubmit')->name('contact-updateSubmit'); // {id} - ��� ����� ������������ ��������, ������������ �� get-�������
/*
Route::get('/contact/all/{id}/delete', 'App\Http\Controllers\ContactController@deleteMessage')->name('contact-delete'); // {id} - ��� ����� ������������ ��������, ������������ �� get-�������
*/


Route::get('/contact/all/{id}', 'App\Http\Controllers\ContactController@showOneMessage')->name('contact-dataOne'); // {id} - ��� ����� ������������ ��������, ������������ �� get-�������

Route::get('/contact/all', 'App\Http\Controllers\ContactController@allData')->name('contact-data');

Auth::routes();  // ����� ���� ��������, ��� ������� ��������� �������������
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact/all/{id}', [App\Http\Controllers\HomeController::class, 'showOneMessage'])->name('contact-dataOne');
Route::get('/contact/all/{id}/delete', [App\Http\Controllers\HomeController::class, 'deleteMessage'])->name('contact-delete');
