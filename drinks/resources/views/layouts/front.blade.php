@inject('cart', 'App\Services\CartService')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400&family=Sarpanch:wght@400;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/front/app.scss', 'resources/js/front/app.js']) --}}
        {{-- @vite(['resources/sass/back/app.scss', 'resources/js/back/app.js']) --}}
    <link rel="stylesheet" href="{{asset('build\assets\app-0f22e892.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('build\assets\app-fa1b4628.css')}}"> --}}
    <script src={{asset('build\assets\app-d5fa8b22.js')}} defer></script>
    <script src={{asset('build\assets\app-efa1a525.js')}} defer></script>
    <script src={{asset('build\assets\axios-8fd06c34.js')}} defer></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src="{{asset('img/logo.jpg')}}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="cartDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <div class="cart-svg">
                                    <svg class="cart">
                                        <use xlink:href="#cart"></use>
                                    </svg>
                                    <span class="count">{{$cart->count}}</span>
                                    <span>{{$cart->total}} eur </span>
                                </div>
                            </a>
                            <a href="{{route('cart')}}" class="dropdown-menu dropdown-menu-end" aria-labelledby="cartDropdown">
                                @forelse($cart->list as $product)
                                <div class="dropdown-item">
                                    {{$product->title}}
                                    <b>X</b> {{$product->count}} bt.
                                    {{$product->sum}} eur
                                </div>
                                @empty
                                <span class="dropdown-item">Empty</span>
                                @endforelse
                            </a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.svg')
</body>
</html>
