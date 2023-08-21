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
                                <h3 class="panel-title">All Product</h3>
                            </div>
                            <div>
                                </br>
                                <a href="{{ route('add.product') }}" style="margin-right:50px;" class="btn btn-sm btn-info pull-right">Add New</a>
                                </br>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Binding Cost</th>
                                                    <th>Godaun</th>
                                                    <th>Route</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                     
                                            <tbody>
                                                @foreach($allProduct as $row)
                                                <tr>
                                                    <td>
                                                        <img src="{{ $row->product_image }}" style="height:60px; width:60px;">
                                                    </td>                                     
                                                    <td>{{ $row->product_name }}</td>
                                                    <td>{{ $row->binding_cost }}</td>
                                                    <td>{{ $row->godaun_number }}</td>
                                                    <td>{{ $row->route_number }}</td>
                                                    <td>
                                                        <a href="{{ URL::to('edit-product/'.$row->id) }}" class="btn btn-sn btn-info" id="edit">Edit</a>

                                                        <a href="{{ URL::to('delete-product/'.$row->id) }}" class="btn btn-sn btn-danger" id="delete">Delete</a>

                                                        <a href="{{ URL::to('view-product/'.$row->id) }}" class="btn btn-sn btn-primary" id="view">View</a>
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