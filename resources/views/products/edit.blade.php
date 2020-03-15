@extends('include.base')

@section('bodyContent')

<body class="body">
    <center>
        <div class="card mt-5" style="width:30vw">
            <div class="card-header bg-warning">
                <h1 class="text-dark">Update Product</h1>
            </div>
            <div class="card-body">
                <div style="margin:auto">
                    <form action="{{ action('ProductsController@update',$product->id)}}" method="POST">
                        {{csrf_field()}}
                        <img type="file" name="image" id="fileToUpload" src="/storage/images/{{ $product->image }}"
                            style="width:20vw">
                        <div class="form-group row mt-2">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name"
                                    value="{{$product->name}}">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{$product->amount}}" name="amount">
                            </div>
                        </div>

                        <label for="exampleFormControlTextarea1" class="float-left ml-3">Description: </label>
                        <textarea class="form-control col-sm-11" rows="3"
                            name="description">{{$product->description}}</textarea>
                        <br>





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