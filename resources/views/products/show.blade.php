@extends('include.base')

@section('bodyContent')

<body class="body">
    @if(session()->has('notif'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <center>{{ session()->get('notif') }}</center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    </div>
    @endif
    <div class="card mt-5 border-warning" style="width:60vw; margin-left:20%;">

        <table class="table">
            <thead>
                <tr class="bg-warning">
                    <th scope="col">Item Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $user_order as $order)
                <tr>
                    <td>{{ $order->product_name}}</td>
                    <td>

                        {!! Form::open(['method' => 'DELETE', 'route' => ['name.destroy', $order->id] ]) !!}
                        {!! Form::submit('Remove', ['class' => 'btn btn-danger font-weight-bold btnr']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    @endsection