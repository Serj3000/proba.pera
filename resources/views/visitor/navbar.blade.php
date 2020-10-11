                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home.blog')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login-get.blog')}}">Forma</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('content.blog')}}">Content</a>
                    </li>
                    <li class="nav-item justify-content-end">
                        <p class="nav-link">{{session()->get('login_email') ?? 'no login user'}}</p>
                    </li>
                </ul>