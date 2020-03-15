@extends('include.base')
@section('bodyContent')

<body class="na1">

    <div class="flex-center position-ref full-height">
        {{-- @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @endif --}}


    <div class="card mr-auto mb-auto welcome text-center">
        <p class="mb-0">Welcome !!</p>
        <p class="quote mt-0 mb-5">Order now and we will deliver</p>
        <a type="button" class="btn btn-warning font-weight-bold btnr" href="{{ route('products.index') }}"><span>View
                our
                Products</span></a>


    </div>
    </div>
    @endsection