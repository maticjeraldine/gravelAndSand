@extends('include.base')

@section('bodyContent')

<body class="body">
    <center>
        <div class="card mt-5" style="width:30vw">
            <div class="card-header bg-warning">
                <h1 class="text-dark">Add Product Quantity</h1>
            </div>
            <div class="card-body">
                <div style="margin:auto">
                    <form action="{{ action('ProductCategoryController@update',$product->id)}}" method="POST">
                        {{csrf_field()}}


                        <div class="row m-2">

                            {{-- <select class="form-control" id="name" name="name" required="true">
                                <option>Select Vehicle</option>
                                <!--selected by default-->
                                @foreach($products as $products)
                                <option value="{{ $products->name }}">
                            {{ $products->name }}
                            </option>
                            @endforeach
                            </select> --}}

                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Quantity</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="quantity" placeholder="Quantity">
                            </div>
                        </div>

                        <div class="row float-right mt-2" style="padding-right:10%">
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <input name="_method" type="hidden" value="PUT">
                                    <button type="submit" class="btn btn-outline-warning text-dark font-weight-bold"
                                        value="submit">Submit</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="{{ route('products.index') }}"
                                    class="btn btn-outline-warning text-dark font-weight-bold">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>
    @endsection