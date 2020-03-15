@extends('include.base')

@section('bodyContent')

<body class="body">
    <center>
        <div class="card mt-5" style="width:30vw">
            <div class="card-header bg-warning">
                <h1 class="text-dark">Add Product</h1>
            </div>
            <div class="card-body">
                <div style="margin:auto">
                    <form action="{{ action('ProductsController@store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}


                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control control-label" id="inputEmail3"
                                    placeholder="name" name="name" {{ $errors->has('name') ? ' has-error ' : ''}}>
                                @if($errors->has('name'))
                                <span class="help-block text-danger ml-5" style="">
                                    {{ $errors->first('name') }}
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Amount"
                                    name="amount" {{ $errors->has('amount') ? ' has-error ' : ''}}>
                            </div>
                            @if($errors->has('amount'))
                            <span class="help-block text-danger ml-5" style="">
                                {{ $errors->first('amount') }}
                            </span>
                            @endif
                        </div>


                        <label for="exampleFormControlTextarea1" class="float-left ml-3">Description: </label>
                        <textarea class="form-control col-sm-11" id="exampleFormControlTextarea1" rows="3"
                            name="description"></textarea>
                        <br>
                        <input type="file" name="image" id="fileToUpload">




                        <div class="row float-right mt-2" style="padding-right:10%">
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
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