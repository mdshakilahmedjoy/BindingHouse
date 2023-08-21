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
                            <h3 class="panel-title">View Attendance</h3>
                        </div>
                        <h4 class="text-danger" align="center"> Attendance Date : ({{ $date->att_date }}) </h4>
                        <div class="panel-body">
                            <div class="row" style="margin-left:50px; margin-right:50px;">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                	<table {{--id="datatable"--}} class="table table-striped table-bordered">
                                    	<thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Attendance</th>
                                            </tr>
                                        </thead>
                             		
                                    	<tbody>                                  
                                    		@foreach($data as $row)
                                            <tr>
                                                <td>
                                                    <img src="{{ URL::to($row->photo) }}" style="height:60px; width:60px;">
                                                </td>

                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->attendance }}</td>

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