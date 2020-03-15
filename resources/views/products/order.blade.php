@extends('include.base')

@section('bodyContent')

<body class="body">
    <div class="row">
        <!-- /.card -->
        <div class="col-md">
            <div class="card m-5">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">

                        <li class="nav-item"><a class="nav-link active" href="#schoolYear" data-toggle="tab">Pending</a></li>
                        <li class="nav-item"><a class="nav-link" href="#targetSheet" data-toggle="tab">Approved</a></li>
                        <li class="nav-item"><a class="nav-link" href="#reject" data-toggle="tab">Reject</a></li>
                        <li class="nav-item"><a class="nav-link" href="#delivered" data-toggle="tab">Delivered</a></li>

                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="schoolYear">
                            1
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="targetSheet">
                            2

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="reject">
                            3
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="delivered">
                            4
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @endsection