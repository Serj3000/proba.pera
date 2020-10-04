@extends('visitor.layout')

@section('blog')
    <h2>Форма регистрации</h2>

    <form method="post" action="{{route('login-post.blog')}}">
    @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Login (E-mail)</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="login_user" aria-describedby="emailHelp" value="{{session()->get('login_user') ?? $_POST['login_user']  }}">
            {{-- a1sd@rt --}}
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="login_password" value="12345">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary" name="login_button">Login</button>
        <button type="submit" class="btn btn-primary" name="home_button">Home</button>
    </form>
    <hr>
    Session:
    <br>{{session()->get('login_user')}}
    <br>{{$session??''}}
    <br>
    Cookie:
    <br>{{cookie('user')??''}}
    <br>{{$cookie??''}}
    </pre>
    @if(!empty($_POST))
        <pre>
            {{print_r($_POST)}}
        </pre>
    @endif
@endsection