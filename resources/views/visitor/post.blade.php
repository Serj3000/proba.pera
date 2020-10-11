@extends('visitor.layout')

@section('blog')
<style>
    img {
        float: left;
        margin: 7px 7px 7px 0;
        }
</style>

    <div>
        <img src="{{asset('\storage\3.jpg')}}" class="mr-3" alt="..." width="250px">
            <div class="media-body">
                <h5 class="mt-0">{{$post->title}}</h5>
                <i>Autor: <b> {{$post->user->name}} </b></i>
                <br>
                <i>See: <b>{{$post->saw}}</b></i>
                <hr>
            </div>
            <p>{{$post->body}}</p>
    </div>
    <hr>
@endsection