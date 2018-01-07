<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router){

    //posts
	//$router->group(['prefix' => 'posts', 'middleware' => 'auth'], function () use ($router){  //For all posts
    //For specific
    $router->group(['prefix' => 'posts'], function() use ($router){ 
        $router->get('index','PostsController@index');
        $router->post('add','PostsController@createPost');
        $router->get('view/{id}','PostsController@viewPost');
        $router->put('edit/{id}','PostsController@updatePost');
        $router->group(['middleware' => 'auth'], function ($router){
            $router->delete('delete/{id}','PostsController@deletePost');
        });      
    });

    //users
    $router->group(['prefix' => 'users'], function () use ($router){
        $router->post('add','UsersController@add');
        //$router->put('add','UsersController@add');
        $router->get('view/{id}','UsersController@view');
        $router->put('edit/{id}','UsersController@edit');
        $router->delete('delete/{id}','UsersController@delete');
        $router->get('index','UsersController@index');
    });

});

