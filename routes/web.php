<?php

use Illuminate\Support\Facades\Route;

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
    return view('visitor.index');
})->name('home.blog');

Route::get('/forma/login', function () {
    $_POST['login_user']='a1sd@rt ';
    return view('visitor.form');
})->name('login-get.blog');

Route::post('/forma/login', function (\Illuminate\Http\Request $request) {
                // $value = session(['key' => $request]);
    if(isset($_POST['login_button'])){
                // session()->put(['login_user'=>$_POST['login_user']]);
        session()->put('login_user', $_POST['login_user']);
        return redirect()->route('login-member.blog');
    }
    if(isset($_POST['home_button'])){
        return redirect()->route('home.blog');
    }
})->name('login-post.blog'); 

Route::get('/forma/member', function (\Illuminate\Session\Store $session, \Illuminate\Cookie\CookieJar $cookie, \Illuminate\Http\Request $request) {
    $sessions = $session->get('login_user');

            // $value = $request->session()->get('login_user');
            // $value = $request->input('login_user');
    $cookie=cookie()->make('user', true, 150);
    return view('visitor.form', ['session'=>$sessions, 'cookie'=>$cookie]);
})->name('login-member.blog');

Route::get('form/logout', function(){
    session()->forget('login_user');
    // dd(session()->all(), session()->pull('login_user'));
    return redirect()->route('home.blog');
})->name('logout-get.blog');
