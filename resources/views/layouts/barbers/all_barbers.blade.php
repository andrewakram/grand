@extends('home1')
@section('all_barbers')

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content content-header">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><b>All Barbers</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Barber Name</th>
                                <th>Barber Rate</th>
                                <th>Barber Photo</th>
                                <th>Barber Price</th>
                                <th>Active / Not Active</th>
                                <th>Barber Link</th>
                                <th>Date Created</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($barbers as $barber)
                                <tr>
                                    <th><a>{{$barber->b_id}}</a></th>
                                    <th><a>{{$barber->b_name}}</a></th>
                                    <th><a>
                                            {{DB::table("barbersrates")->where('barber_id',$barber->b_id)->pluck('b_rate')->AVG()}}
                                    </a></th>
                                    @if($barber->b_photo != NULL)
                                        <th>
                                            <img src="{{URL::to('/storage/barber_images/'.$barber->b_photo)}}" alt="{{$barber->b_photo}}" width="40px" height="40px">
                                        </th>
                                    @else
                                        <th> - </th>
                                    @endif
                                    <th><a>{{$barber->b_price}} $</a></th>
                                    @if($barber->b_active == 1)
                                        <th><a>Active</a></th>
                                    @else
                                        <th>Not Active</th>
                                    @endif
                                    <th><a>{{$barber->b_link}}</a></th>
                                    <th><a>{{$barber->created_at}}</a></th>
                                    <th><a href="{{URL::to('/edit/barber/'.$barber->b_id)}}" class="btn btn-info" id="">Edit</a></th>
                                    <th><a href="{{URL::to('/delete/barber/'.$barber->b_id)}}" class="btn btn-danger" id="deletes">Delete</a></th>

                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Barber Name</th>
                                <th>Barber Rate</th>
                                <th>Barber Photo</th>
                                <th>Barber Price</th>
                                <th>Active / Not Active</th>
                                <th>Barber Link</th>
                                <th>Date Created</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>


@endsection
