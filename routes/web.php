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

Route::view('/', 'welcome'); 

Route::get('/contact', 'mention@contact');
Route::get('/mentionslegales', 'mention@mentionslegales');
Route::get('/cgv', 'mention@cgv');

Route::get('/ProductList', 'liste@ShowAllProducts');
Route::get('ProductList/article{product_id}', 'liste@ShowOneProduct');

Route::get('/EventList', 'liste@ShowAllEvents');
Route::get('EventList/event{event_id}', 'liste@ShowOneEvent');

Route::get('/addproduct', 'product@voirformulaire');
Route::post('/addproduct', 'product@ajouterproduit');
	
Route::get('/addevent', 'event@voirformulaire');
Route::post('/addevent', 'event@ajouterproduit');
Route::get('/sendidea', 'event@voirsendidea');
Route::post('sendidea', 'event@sendidea');
Route::get('/eventidea', 'liste@voirboxidea');
Route::post('/ajoutcom', 'event@ajoutcom');
Route::post('/participation', 'event@participation');

Route::get('/adduser', 'user@voirformulaire');
Route::post('/adduser', 'user@adduser');

Route::get('/connection', 'connection@formulaire');
Route::post('/connection', 'connection@traitement');

Route::get('/moncompte', 'CompteController@accueil');
Route::get('/deconnexion', 'CompteController@deconnexion');
Route::post('/modification-mot-de-passe', 'CompteController@modificationMotDePasse');
Route::post('/uploadimg', 'CompteController@uploadimage');

route::get('/showcart', 'shoppingcart@showcart');
route::get('/emptycart', 'shoppingcart@emptycart');
route::get('/validcart', 'shoppingcart@validcart');
Route::post('/addtocart', 'shoppingcart@addtocart');

Route::get('/addtocart', 'CompteController@cancel');
Route::get('/uploadimg', 'CompteController@cancel');
Route::get('/modification-mot-de-passe', 'CompteController@cancel');







