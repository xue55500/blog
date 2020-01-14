<?php

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
//Route::get('holle', function () {
//    return "cheng";
//});
//Route::get('/haha','Wea@test');
//
//
////路由视图
//Route::view('/aa','qwe',['name'=>'张三']);
//
//
//Route::view('/login','login');
//
//
//Route::post('/dologin','wea@dologin');
//
//Route::view('/add','add');
//
//Route::post('/admin','student@ass');
//
//
//Route::view('/qwe');
//6
//
// Route :: get('goods/{id}/{name?}',function($id){
//     return 'Index ' . $id;

// });
//Route::get('/goods/{id}/{name?}','index@goods')->where(['id'=>'[0-9]+','name'=>'[a-z]+']);

//Route::get('/admin/{ass}/{add?}','index@ass')->where(['ass'=>'[0-9]+','add'=>'[a-z]+']);
//品牌路由
Route::prefix('brand')->middleware('checklogin')->group(function(){

Route::get('create','PostController@create');
Route::post('/store','PostController@store');
Route::get('/','PostController@index');
Route::get('edit/{id}','PostController@edit');
Route::get('destroy/{id}','PostController@destroy');
Route::post('update/{id}','PostController@update');
Route::get('checkOnly','PostController@checkOnly');

});


//分类路由
Route::prefix('category')->group(function(){

   Route::get('create','categoryController@create');
   Route::post('/store','categoryController@store');
   Route::get('/','categoryController@index');
   Route::get('destroy/{id}','categoryController@destroy');

   Route::get('edit/{id}','categoryController@edit');
   Route::post('update/{id}','categoryController@update');
  
   });

   Route::prefix('goods')->middleware('checklogin')->group(function(){

   Route::get('create','GoodsController@create');
   Route::post('/store','GoodsController@store');
   Route::get('/','GoodsController@index');
   Route::get('destroy/{id}','GoodsController@destroy');
    Route::get('show/{id}','GoodsController@show');
     Route::post('addcart','GoodsController@addcart');
   Route::get('edit/{id}','GoodsController@edit');
   Route::post('update/{id}','GoodsController@update');
  
   });
//登录
   Route::view('/login','admin.login.login');
  
   Route::post('/dologin','LoginController@dologin');
   Route::get('login/index','LoginController@index');
   Route::get('login/loginDo','LoginController@loginDo');

   //路由
Route::prefix('wenzhang')->middleware('checklogin')->group(function(){

   Route::get('create','wenzhangController@create');
   Route::post('/store','wenzhangController@store');
   Route::get('/','wenzhangController@index');
   Route::get('destroy/{id}','wenzhangController@destroy');

   Route::get('edit/{id}','wenzhangController@edit');
   Route::post('update/{id}','wenzhangController@update');
   
   });


Route::get('/send','MailController@sendemail');

