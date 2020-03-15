@extends('include.base')

@section('bodyContent')

<body class="body">
    @if (auth()->guest())
    {{-- if user is notlogged in  --}}

    <div class="row mt-3" style="margin-left:2%; margin-right:auto">
        @foreach( $products as $products)

        <div class="card prd ml-5 mb-5" style="max-width:20vw;">
            <img class="card-img-top" src="/storage/images/{{ $products->image }}" style="width:18vw;height:15vw;">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">
                    {{ $products->name }}

                </h5>

                <p class="card-text" style="text-indent: 20px;">{{ $products->description }}.</p>
            </div>
            <div class=" row">
                <p class="col-sm-5 pl-5">Amount</p>
                <div class="">
                    <p>{{ $products->amount }}</p>
                </div>
            </div>
            <div class=" row">
                <p class="col-sm-5 pl-5">Quantity</p>
                <div class="">
                    @php
                    $quantity = App\productCategory::where('name', $products->id)->sum('quantity');
                    @endphp

                    <p> {{ $quantity }}</p>
                </div>

            </div>

        </div>
        @endforeach
    </div>
    @else
    {{-- if there is a login account --}}
    @if(session()->has('notif'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <center>{{ session()->get('notif') }}</center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    </div>
    @endif
    @if (Auth::User()->userType == 'admin')
    <a type="button" class="btn btn-warning font-weight-bold btnr mt-5" style="margin-left:4%"
        href="{{ route('products.create') }}"><span>Add
            Product</span></a>

    @endif
    <div class="row mt-3" style="margin-left:2%; margin-right:auto">
        @foreach( $products as $products)
        <div class="card prd ml-5 mb-5" style="max-width:20vw;">
            <img class="card-img-top" src="/storage/images/{{ $products->image }}" style="width:18vw;height:15vw;">
            <div class="card-body">
                <h5 class="card-title font-weight-bold text-dark">{{ $products->name }}

                </h5>
                <p class="card-text" style="text-indent: 20px;">{{ $products->description }}.</p>
            </div>
            <div class=" row">
                <p class="col-sm-5 pl-5 font-weight-bold">Amount</p>
                <div class="">
                    <p>{{ $products->amount }}</p>
                </div>
            </div>
            <div class=" row">
                <p class="col-sm-5 pl-5 font-weight-bold">Quantity</p>
                <div class="">

                    @php
                    $quantity = App\productCategory::where('name', $products->id)->sum('quantity');
                    @endphp

                    <p> {{ $quantity }}</p>
                </div>
                @if (Auth::User()->userType == 'admin')

                <a class="btn btn-warning font-weight-bold  btnr" href="/add/quantity/{{$products->id }}"
                    style="margin-left:25%" title="Add Quantity"> <i class="nav-icon fas fa-plus-circle"></i></a>
                @endif
            </div>
            @if (Auth::User()->userType == 'admin')
            <div class="row mx-auto">
                <a type="button" class="btn btn-success font-weight-bold btnr mr-2"
                    href="/products/{{$products->id}}/edit"><span class="p-2">Edit</span></a>



                {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $products->id] ]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger font-weight-bold btnr']) !!}
                {!! Form::close() !!}


            </div>
            @else
            <a type="button" class="btn btn-warning font-weight-bold btnr mx-5"
                href="add/cart/{{$products->id}}"><span>Add
                    to Cart</span></a>
            @endif
        </div>
        @endforeach
    </div>
    @endif
    @endsection