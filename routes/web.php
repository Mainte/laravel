<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

	Auth::routes();

	/** Index **/
	Route::get('/', function(){
	  return redirect()->route('RLogin');
	});
	
	Route::get('/register', function () {
	  return redirect()->route('RLogin');
	});
	 
	/** Login **/
	Route::get('/login', function(){
		if(Auth::user()) return redirect()->route('RHome');
		else return view('auth.login');
	})->name('RLogin');

	/** Logout **/
	Route::get('/logout', function(){
		if(Auth::user()){ Auth::logout(); return redirect()->route('RLogin'); }
		else return view('auth.login');
	})->name('RLogout');

	/** Forbidden **/
	Route::get('/forbidden', function(){
		return view('errors.403');
	})->name('403');

	/** Home **/
	Route::get('/home', 'HomeController@index')->name('RHome');

	/** PDF **/
	Route::get('/pdf', 'PDFController@PDF');

	Route::group(['middleware' => 'auth'], function(){

		Route::group(['middleware' => ['role:user|admin']], function (){

			/** Utente **/
			Route::group(['prefix' => '/utente'], function (){		
				Route::get('/password', 'UtenteController@passwordUtente');
				Route::post('/password', 'UtenteController@passwordUtenteAggiorna');			
			});

		});

		Route::group(['middleware' => ['role:admin']], function (){

			/** Utenti **/
			Route::group(['prefix' => '/utenti'], function (){
				Route::get('/', 'UtenteController@Index')->name('RUtenti');														
				Route::get('/aggiungi', 'UtenteController@aggiungi');
				Route::post('/aggiungi', 'UtenteController@salva');									
				Route::get('/{id_utente}/modifica', 'UtenteController@modifica')->name('RUtenteModifica');					
				Route::post('/{id_utente}/modifica', 'UtenteController@aggiorna');
				Route::get('/{id_utente}/ruolo', 'UtenteController@ruolo');					
				Route::post('/{id_utente}/ruolo', 'UtenteController@ruoloAggiorna');													
				Route::get('/{id_utente}/password', 'UtenteController@password');
				Route::post('/{id_utente}/password', 'UtenteController@passwordAggiorna');
				Route::get('/{id_utente}/elimina', 'UtenteController@elimina');			
				Route::post('/{id_utente}/elimina', 'UtenteController@distruggi');							
			});

			/** Azienda **/
			Route::group(['prefix' => '/azienda'], function (){
				Route::get('/', 'AziendaController@Index')->name('RAzienda');
				Route::get('/modifica', 'AziendaController@Modifica');
				Route::post('/modifica', 'AziendaController@Aggiorna');
			});

			/** Upload **/
			Route::group(['prefix' => '/uploads'], function (){
				Route::get('/', 'UploadController@index')->name('RUpload');
				Route::post('/', 'UploadController@upload');
				Route::get('/{file}', 'UploadController@mostra');
				Route::get('/{file}/elimina', 'UploadController@elimina');
				Route::post('/{file}/elimina', 'UploadController@distruggi');
			});

			/** Storico **/
			Route::group(['prefix' => '/storico'], function (){
				Route::get('/', 'StoricoController@index')->name('RStorico');
				Route::post('/', 'StoricoController@cerca');
			});

			/** Backup **/
			Route::get('/backups', 'BackupController@index')->name('RBackups');
			Route::post('/backups', function (){
				Artisan::call('backup:clean');
			    Artisan::call('backup:run');
			    return redirect()->route('RBackups')->with('info', trans('messaggi.backup'));
			});
			Route::get('/backup/{file}', function($file){
				return Response::download(Storage::disk('backups')->getDriver()->getAdapter()->applyPathPrefix($file));
			});

		});

	});
	

	
