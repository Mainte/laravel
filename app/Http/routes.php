<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	Route::auth();

	/** Index **/
	Route::get('/', function(){
	  return redirect()->route('login');
	});
	
	Route::get('/register', function () {
	  return redirect()->route('login');
	});
	 
	/** Login **/
	Route::get('/login', function(){
		if(Auth::user()) return redirect()->route('home');
		else return view('auth.login');
	})->name('login');

	/** Home **/
	Route::get('/home', 'HomeController@index')->name('home');

	/**
		Utenti
	**/
	Route::group(['prefix' => '/utenti'], function (){
		Route::get('/', 'UtenteController@Index')												->middleware('permission:user-view')->name('RUtenti');										
		Route::get('/aggiungi', 'UtenteController@Aggiungi')									->middleware('permission:user-add');
		Route::post('/aggiungi', 'UtenteController@Salva')										->middleware('permission:user-add');				
		Route::get('/cambio-password', 'UtenteController@CambioPassword')						->middleware('permission:user-change-password')->name('RUtenteCambioPassword');	
		Route::post('/cambio-password', 'UtenteController@CambioPasswordAggiorna')				->middleware('permission:user-change-password');	
		Route::get('/{id}/modifica', 'UtenteController@Modifica')								->middleware('permission:user-edit');						
		Route::post('/{id}/modifica', 'UtenteController@Aggiorna')								->middleware('permission:user-edit');									
		Route::get('/{id}/cambio-password', 'UtenteController@CambioPasswordUtenti')			->middleware('permission:user-change-passwords');	
		Route::post('/{id}/cambio-password', 'UtenteController@CambioPasswordUtentiAggiorna')	->middleware('permission:user-change-passwords');	
		Route::get('/{id}/elimina', 'UtenteController@Elimina')									->middleware('permission:user-delete');						
		Route::post('/{id}/elimina', 'UtenteController@Distruggi')								->middleware('permission:user-delete');
	});

	/**
		Permessi
	**/
	Route::group(['prefix' => '/permessi'], function (){
		Route::get('/', 'PermessiController@Index')->middleware('permission:role-view')->name('RRegole');
		Route::get('/{id}/modifica', 'PermessiController@Modifica')->middleware('permission:role-edit');
		Route::post('/{id}/modifica', 'PermessiController@Aggiorna')->middleware('permission:role-edit');
	});

	/**
		Azienda
	**/
	Route::group(['prefix' => '/azienda'], function (){
		Route::get('/', 'AziendaController@Index')->middleware('permission:company-view')->name('RAzienda');
		Route::get('/modifica', 'AziendaController@Modifica')->middleware('permission:company-edit');
		Route::post('/modifica', 'AziendaController@Aggiorna')->middleware('permission:company-edit');
	});

	/**
		Upload
	**/
	Route::group(['prefix' => '/upload'], function (){
		Route::get('/', 'UploadController@Index')->middleware('permission:upload')->name('RUpload');
		Route::post('/', 'UploadController@Upload')->middleware('permission:upload');
	});

	/**
		PDF
	**/
	Route::get('/pdf', 'PDFController@PDF')->middleware('permission:pdf');

	/**
		Forbidden
	**/
	Route::get('/forbidden', function(){
		return view('errors.403');
	})->name('Forbidden');
