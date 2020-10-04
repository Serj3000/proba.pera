@extends('visitor.layout')

@section('blog')
                    <div class="jumbotron">
                        <h2 class="display-4">Привет, мир!</h2>
                        <p class="lead">Это простой пример блока с компонентом в стиле jumbotron для привлечения дополнительного внимания к содержанию или информации.</p>
                        <hr class="my-4">
                        <p>Использются служебные классы для типографики и расстояния содержимого в контейнере большего размера.</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="{{route('logout-get.blog')}}" role="button">Logout</a>
                        </p>
                    </div>
@endsection