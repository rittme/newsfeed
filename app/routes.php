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
	$news = News::orderby('created_at', 'desc')->paginate(20);
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

Route::post('login', array("as" => "login", function() {
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

    if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password']),true)) {
        if(Session::has('origin')){
            return Redirect::to(Session::get('origin'));
        } else {
            return Redirect::to('panel');
        }
    } else {
        Input::flash('only', array('email'));
        return Redirect::to('login')->with('error','Authentication failed!');
    }
}));

Route::get('panel', function(){
    $news = News::orderby('created_at', 'desc')->paginate(20);
    return View::make('admin.panel')->with('news',$news);
});

Route::post('panel', function(){

    $input = array(
        'name'    => Input::get('name'),
        'url'     => Input::get('url'),
        'category'=> Input::get('category')
    );

    $rule = array(
        'name'     => 'required', 
        'url'      => 'required|url',
        'category' => 'required');

    $validator = Validator::make($input, $rule);

    if ($validator->fails()) {
        $messages = $validator->messages();
        return Response::json(array("error" => $messages->first('url')));
        /*return Redirect::to('panel')->withErrors($validator);*/
    }

    $new = News::create(array(
        'name' => $input['name'],
        'url'  =>  $input['url'],
        'category' => $input['category'],
        'user_id' => Auth::user()->id,
    ));

    $new->date = $new->created_at;

    return Response::json($new->toArray());
});

Route::get('bm', array('before' => 'auth', function()
{
    $input = array(
        'name'    => Input::get('name'),
        'url'     => Input::get('url'),
        'category'=> Input::get('category')
    )
;
    $rule = array(
        'name'     => 'required', 
        'url'      => 'required|url',
        'category' => 'required');

    $validator = Validator::make($input, $rule);

    if ($validator->fails()) {
        $messages = $validator->messages();
        return var_dump($messages);
    }

    $new = News::create(array(
        'name' => $input['name'],
        'url'  =>  $input['url'],
        'category' => $input['category'],
        'user_id' => Auth::user()->id,
    ));

    return Redirect::to(Input::get('origin'));
}));