<?php

Route::group(['prefix'=>'business'],function(){
    Route::get('searchdate','BookRoom\BookRoomController@searchdate');
    Route::resource('bookroom','BookRoom\BookRoomController');
    Route::resource('roomprice','RoomPrice\RoomPriceController');
    Route::resource('service','Service\ServiceController');
    Route::resource('serviceuser','ServiceUser\ServiceUserController');
    Route::resource('leaseroom','LeaseRoom\LeaseRoomController');
    Route::resource('storage', 'Storage\StorageController');
    Route::resource('bill','Bill\BillController');
    Route::resource('guest','Guest\GuestController');
    Route::resource('room','Room\RoomController');
    Route::resource('roomtype', 'Roomtype\RoomtypeController');

    Route::get('searchlease',['as'=>'searchlease','uses'=>'LeaseRoom\LeaseRoomController@search']);
    Route::get('searchbookroom', ['as' => 'searchbookroom', 'uses' => 'BookRoom\BookRoomController@search']);
    Route::get('ssearch',['as' => 'guestsearch', 'uses'=>'Guest\GuestController@getSearch' ]);
    Route::get('hotelsearch',['as' => 'hotelsearch', 'uses' => 'Hotel\HotelController@search']);
});
    Route::resource('hotel', 'Hotel\HotelController');
//-------------------------------LAYOUT------------------------------------------------
Route::group(['prefix'=>'indexx','as'=>'indexx'],function(){
    Route::get('/','Index\IndexController@index');
    Route::get('getcity','Index\IndexController@getCity');
    Route::get('/{id}/{checkin}/{checkout}','Index\IndexController@show');
    Route::get('/hotell','Index\IndexController@show');
});

Route::get('searchcountries','Search\SearchCountries@searchCountries');




Route::group(['prefix'=>'user'],function(){
  Route::get('home','User\UserController@index');
  Route::get('login','User\LoginController@getLogin');
  Route::post('login','User\LoginController@postLogin');
  Route::get('register','User\RegisterController@getRegister');
  Route::post('register','User\RegisterController@postRegister');
  Route::post('logout','User\LoginController@logout');
});

Route::group(['prefix'=>'admin'],function(){
  Route::get('home','Admin\AdminController@index');
  Route::get('login','Admin\LoginController@getLogin');
  Route::post('login','Admin\LoginController@postLogin');
  Route::get('register','Admin\RegisterController@getRegister');
  Route::post('register','Admin\RegisterController@postRegister');
  Route::post('logout','Admin\LoginController@logout');
});


Route::group(['prefix'=>'business'],function(){
    Route::get('/home', ['as'=>'homebusiness','uses'=>'Business\BusinessController@index']);
    Route::get('/login','Business\LoginController@getLogin');
    Route::post('login','Business\LoginController@postLogin');
    Route::get('register','Business\RegisterController@getRegister');
    Route::post('register','Business\RegisterController@postRegister');
    Route::post('logout','Business\LoginController@logout');
});














// Route::post('countries','File\FileController@countries'); 
// Route::get('testajax',function(){
//   return view('testajax');
// });

// Route::post('testbothajax',function(){
//   echo 'both ';
// });

// Route::get('auto','Search\SearchCountries@index'); 

// Route::get('autoindex',function(){
//   return view('testauto');
// });