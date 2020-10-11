@extends('visitor.layout')

@section('blog')
<h3>Посты автора: <i>{{$id->name}}</i></h3>
    <ol>
        @foreach($posts as $post)
        <br>
            <li><a href="{{route('post.blog', ['idPost'=>$post->id])}}" target="_blank">{{$post->title}}</a> ({{$post->saw}})</li>
            <i>{{$id->name}}</i>
        @endforeach
    </ol>
@endsection

@section('left')
@if(!empty(\App\Models\User::all()))
<h4>Авторы:</h4>
    <ol>
        @foreach(\App\Models\User::all() as $autor)
        <br>
            <li><a href="{{route('content.blog', ['id'=>$autor->id])}}">{{$autor->name}}</a></li>
        @endforeach
    </ol>
@endif
@endsection