<?php

Route::group([env('ROUTE_BALIN_ATTRIBUTE') => env('ROUTE_BALIN_VALUE')], function() 
{
	/* Home info */
	Route::get('/', 													['uses' => 'HomeController@index', 			'as' => 'balin.home.index']);

	/* BALIN info */
	Route::get('/about-us', 											['uses' => 'InfoController@aboutus', 		'as' => 'balin.about.us']);
	Route::get('/contact-us', 											['uses' => 'InfoController@contactus', 		'as' => 'balin.contact.us']);
	Route::post('/contact-us', 											['uses' => 'InfoController@emailus', 		'as' => 'balin.email.us']);

	/* Product info */
	Route::get('products',		 										['uses' => 'ProductController@index', 		'as' => 'balin.product.index']);
	Route::get('product/{slug}',										['uses' => 'ProductController@show', 		'as' => 'balin.product.show']);

	/* Cart info */
	Route::get('cart',													['uses' => 'CartController@index', 			'as' => 'balin.cart.index']);
	Route::any('cart/add/{slug}',										['uses' => 'CartController@store', 			'as' => 'balin.cart.store']);
	Route::any('cart/update/{slug}/{varian_id}',						['uses' => 'CartController@update', 		'as' => 'balin.cart.update']);
	Route::any('cart/change/list/dropdown',								['uses'	=> 'CartController@getListBasket', 	'as' => 'balin.cart.list']);
});
