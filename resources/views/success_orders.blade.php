@extends('layouts.app')
@section('content')

   <div class="content-page">
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Echobvel</a></li>
                            <li class="active">IT</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding-left:50px;">
                                <h3 class="panel-title">All Success Order</h3>
                            </div>
                            <div>
                                </br>
                                <a href="{{ route('add.order') }}" style="margin-right:50px;" class="btn btn-sm btn-info pull-right">New Order</a>
                                </br>
                            </div>
                            <div class="panel-body" style="margin-left:20px; margin-right:20px;">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Order Date</th>
                                                	<th>Delivery Date</th>
                                                    <th>Client Name</th>
                                                    <th>Quantity</th>
                                                    <th>Total Amount</th>
                                                    <th>Order Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                     
                                            <tbody>
                                                @foreach($success as $row)
                                                <tr> 
                                                    <td>{{ $row->order_date }}</td>
                                                	<td>{{ $row->delivery_date }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->total_products }}</td>
                                                    <td>{{ $row->total }}</td>
                                                    {{-- <td>{{ $row->payment_status }}</td> --}}
                                                    <td><span class="badge badge-success">{{ $row->order_status }}</span></td>
                                                    <td>
                                                        {{-- <a href="{{ URL::to('edit-product/'.$row->id) }}" class="btn btn-sn btn-info" id="edit">Edit</a>

                                                        <a href="{{ URL::to('delete-product/'.$row->id) }}" class="btn btn-sn btn-danger" id="delete">Delete</a> --}}

                                                        <a href="{{ URL::to('view-success-order/'.$row->id) }}" class="btn btn-sn btn-primary" id="view">View</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>                 			
            </div> <!-- container -->              
        </div> <!-- content -->
    </div> <!-- content-page -->

@endsection