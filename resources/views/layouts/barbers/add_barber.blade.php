@extends('home1')
@section('add_barber')

<div class="content-wrapper">
    <section class="content content-header">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Add New Barber</b></h3>


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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/add/new/barber')}}" >
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label>Barber Name</label>
                                <input name="barbertName" type="text" class="form-control" placeholder="Enter Barber Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Barber Image</label>
                                <input name="barberImage" type="file" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Barber Price</label>
                                <input name="barberPrice" type="number" class="form-control" placeholder="Enter Barber Price">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Active / Not Active</label>
                                <select name="barberActive" class="form-control select2">
                                    <option disabled selected>Choose Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Barber Link</label>
                                <input name="barberLink" type="text" class="form-control" placeholder="Enter Barber Link">
                            </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>


@endsection