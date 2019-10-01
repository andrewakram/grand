@extends('home1')
@section('edit_barber')

    @foreach ($barbers as $b)


    <div class="content-wrapper">
        <section class="content content-header">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><b>Edit Barber: </b><b style="color:#337ab7;"># {{ $b->b_id }}</b></h3>


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
                        <form role="form" method="post" enctype="multipart/form-data" action="{{url('/update/barber/'.$b->b_id)}}" >
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group col-md-6">
                                    <label>Barber Name</label>
                                    <input name="barbertName" value="{{$b->b_name}}" type="text" class="form-control" placeholder="Enter Barber Name">
                                </div>
                                <div class="form-group col-md-1">
                                    @if($b->b_photo != NULL)
                                        <img src="{{URL::to('/storage/barber_images/'.$b->b_photo)}}" alt="{{$b->b_photo}}" width="40px" height="40px">
                                    @else
                                        No Image Found
                                    @endif
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Barber Image</label>
                                    <input name="barberImage" type="file" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Barber Price</label>
                                    <input name="barberPrice" value="{{$b->b_price}}" type="number" class="form-control" placeholder="Enter Barber Price">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Active / Not Active</label>
                                    <select name="barberActive" class="form-control select2">
                                        <option disabled selected>Choose Status</option>
                                        <option value="1" {{$b->b_active == 1 ? "selected" : ""}}>Active</option>
                                        <option value="0" {{$b->b_active == 0 ? "selected" : ""}}>Not Active</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Barber Link</label>
                                    <input name="barberLink" value="{{$b->b_link}}" type="text" class="form-control" placeholder="Enter Barber Link">
                                </div>


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
