@extends('home1')
@section('edit_customer')

    @foreach ($customers as $c)


    <div class="content-wrapper">
        <section class="content content-header">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><b>Edit Customer: </b><b style="color:#337ab7;"># {{ $c->c_id }}</b></h3>


                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            @if(session()->has('insert_message'))
                                <hr>
                                <div class="alert alert-success">
                                    {{session()->get('insert_message')}}
                                </div>
                                <hr>
                            @endif


                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data" action="{{url('/update/customer/'.$c->c_id)}}" >
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group col-md-6">
                                    <label>Customer Name</label>
                                    <input name="customerName" value="{{$c->c_name}}" type="text" class="form-control" placeholder="Enter Customer Name">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-md-6">
                                    <label>Customer Email</label>
                                    <input name="customerEmail" value="{{$c->c_email}}" type="email" class="form-control" placeholder="Enter Customer Email">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-md-6">
                                    <label>Customer Password</label>
                                    <input name="customerPassword" type="password" class="form-control" placeholder="Enter Customer Password">
                                </div>
                                <div class="clearfix"></div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>


    @endforeach


@endsection
