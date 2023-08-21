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

                @php
        			$investment = DB::table('invests')->sum('amount');
                @endphp

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding-left:50px;">
                                <h3 class="panel-title"> All Invest</h3>
                            </div>
                            
                            <div>
                            	<br>
                            	<h3 style="color: red; font-size: 22px; margin-left: 150px;" align="center">Total Investment : {{$investment}} Taka.

                            	<a href="{{ route('add.invest') }}" class="btn btn-sm btn-success pull-right" style="margin-right: 100px;">Add Invest</a> </h3>
                            </div>

                            <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Details</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                     
                                            <tbody>
                                                @foreach($invest as $row)
                                                <tr>
                                                    <td>{{ $row->date }}</td>
                                                    <td>{{ $row->details }}</td>
                                                    <td>{{ $row->amount }}</td>

                                                    <td>
                                                        <a href="{{ URL::to('/edit-invest/'.$row->id) }}" class="btn btn-sn btn-info" id="edit">Edit</a>

                                                        <a href="{{ URL::to('/delete-invest/'.$row->id) }}" class="btn btn-sn btn-danger" id="delete">Delete</a>  
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