<?php

    Route::group(['middleware'=>['guest']],function(){
        Route::get('/','Auth\LoginController@showLoginForm');
        Route::post('/login','Auth\LoginController@Login')->name('login');
    });
    


    Route::group(['middleware'=>['auth']],function(){
        Route::post('/logout','Auth\LoginController@logout')->name('logout');

        Route::get('/main', function () {
            return view('contenido.contenido');
        })->name('main');
        //Producto
        Route::get('/Producto','ProductoController@index');
        Route::post('/Producto/registrar','ProductoController@store');
        Route::put('/Producto/actualizar','ProductoController@update');
        Route::get('/Producto/selectProducto','ProductoController@selectProducto');
        Route::get('/Producto/selectProductoSalida','ProductoController@selectProductoSalida');
        Route::get('/Producto/listarPdf','ProductoController@listarPdf')->name('productos_pdf');
        //Entrada
        Route::get('/Entrada','EntradaController@index');
        Route::post('/Entrada/registrar','EntradaController@store');
        Route::get('/Entrada/listarPdf/{id}','EntradaController@listarPdf')->name('entradas_pdf');
        //Salida
        Route::get('/Salida','SalidaController@index');
        Route::post('/Salida/registrar','SalidaController@store');
        //Route::get('/Salida/listarPdf/{id}','SalidaController@listarPdf')->name('entradas_pdf');
        //User
        Route::get('/User','UserController@index');
        Route::post('/User/registrar','UserController@store');
        Route::put('/User/actualizar','UserController@update');
        Route::put('/User/desactivar','UserController@desactivar');
        Route::put('/User/activar','UserController@activar');
    });

    


//Route::get('/home', 'HomeController@index')->name('home');
