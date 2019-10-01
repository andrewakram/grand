@extends('home1')
@section('all_customers')


<div class="content-wrapper">
    <!-- Main content -->
    <section class="content content-header">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><b>All Customers</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Date Created</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($customers as $customer)
                                <tr>
                                    <th><a>{{$customer->c_id}}</a></th>
                                    <th><a>{{$customer->c_name}}</a></th>
                                    <th><a>{{$customer->c_email}}</a></th>
                                    <th><a>{{$customer->created_at}}</a></th>
                                    <th><a href="{{URL::to('/edit/customer/'.$customer->c_id)}}" class="btn btn-info" id="">Edit</a></th>
                                    <th><a href="{{URL::to('/delete/customer/'.$customer->c_id)}}" class="btn btn-danger" id="deletes">Delete</a></th>

                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Date Created</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
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
