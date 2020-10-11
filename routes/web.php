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

Route::view('/welcome', 'welcome');

Route::get('/forma/login', function () {
    $_POST['login_email']='kevon87@example.org';
    return view('visitor.form');
})->name('login-get.blog');

Route::post('/forma/login', function (\Illuminate\Http\Request $request) {
    if(isset($_POST['home_button'])){
        return redirect()->route('home.blog');
    }
        $data=$request->validate([
            'login_email'=>'required|email',
            'login_password'=>'required',
        ]);
        $chekauth=[
            'email'=>$data['login_email'],
            'password'=>$data['login_password'],
        ];
    if(auth()->attempt($chekauth)){
                    // $value = session(['key' => $request]);
        if(isset($_POST['login_button'])){
                    // session()->put(['login_user'=>$_POST['login_user']]);
            session()->put('login_email', $_POST['login_email']);
            session()->put('check', auth()->check());
            return redirect()->route('login-member.blog');
        }
    }else{
        session()->forget('login_email');
        echo 'Ошибка валидации!';
    }
})->name('login-post.blog'); 

Route::get('/forma/member', function (\Illuminate\Session\Store $session, \Illuminate\Cookie\CookieJar $cookie, \Illuminate\Http\Request $request) {
    if(!empty(session()->get('check'))){
        $sessions = $session->get('login_email');
                // $value = $request->session()->get('login_user');
                // $value = $request->input('login_user');
        $cookie=cookie()->make('user', true, 150);
        return view('visitor.form', ['session'=>$sessions, 'cookie'=>$cookie]);
    }else{
        return redirect()->route('home.blog');
    }
})->name('login-member.blog');

Route::get('/form/logout', function(){
    session()->forget('login_email');
    session()->forget('check');
        // dd(session()->all(), session()->pull('login_user'));
    return redirect()->route('home.blog');
})->name('logout-get.blog');

Route::get('/content/{id?}', function($id=1) {
    if(!empty(session()->get('check'))){
        if(!empty(\App\Models\User::find($id))){
            $id=\App\Models\User::find($id);
            $posts=$id->post;
            return view('visitor.content', ['id'=>$id, 'posts'=>$posts]);
        }
    }else{
        return redirect()->route('home.blog');
    }
})->name('content.blog');

Route::get('/post/{idPost?}', function(\App\Models\Post $idPost){
    if(!empty(session()->get('check'))){
        // echo asset('storage/1.jpg');
        $idPost->saw+=1;
        $idPost->save();
        return view('visitor.post', ['post'=>$idPost]);
    }else{
        return redirect()->route('home.blog');
    }
})->name('post.blog');
