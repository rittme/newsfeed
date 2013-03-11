<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	$news = News::paginate(20);
    return View::make('list')->with('news',$news);
});

Route::any('link/{id}', function($id) {
    $news = News::find($id);
    $news->addPoint();
    return Redirect::to($news->url);
});

Route::get('login', function() {
   return View::make('admin.login');
});

Route::post('login', function() {
    $input = array(
        'email'    => Input::get('email'),
        'password' => Input::get('password')
    );

    $validator = Validator::make(
        $input,
        array('email' => 'required|email', 
              'password' => 'required')
    );

    if ($validator->fails()) {
        return Redirect::to('login')->withErrors($validator);
    }

    if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) {
        return Redirect::to('panel');
    } else {
        Input::flash('only', array('email'));
        return Redirect::to('login')->with('error','Authentication failed!');
    }
});

Route::get('panel', function(){
    $news = News::paginate(20);
    return View::make('admin.panel')->with('news',$news);
});