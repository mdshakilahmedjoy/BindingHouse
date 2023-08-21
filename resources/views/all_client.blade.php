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
                                <h3 class="panel-title">All Client</h3>
                            </div>
                            <div>
                                </br>
                                <a href="{{ route('add.client') }}" style="margin-right:50px;" class="btn btn-sm btn-info pull-right">Add New</a>
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
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>ShopName</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                     
                                            <tbody>
                                                @foreach($allClient as $row)
                                                <tr>
                                                    <td>
                                                        <img src="{{ $row->photo }}" style="height:60px; width:60px;">
                                                    </td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->phone }}</td>
                                                    <td>{{ $row->address }}</td>
                                                    <td>{{ $row->shopname }}</td>
                                                    <td>
                                                        <a href="{{ URL::to('edit-client/'.$row->id) }}" class="btn btn-sn btn-info" id="edit">Edit</a>

                                                        <a href="{{ URL::to('delete-client/'.$row->id) }}" class="btn btn-sn btn-danger" id="delete">Delete</a>

                                                        <a href="{{ URL::to('view-client/'.$row->id) }}" class="btn btn-sn btn-primary" id="view">View</a>
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