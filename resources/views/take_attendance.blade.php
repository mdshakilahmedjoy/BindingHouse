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
                            <h3 class="panel-title">Take Attendance</h3>
                        </div>

                        <form action="{{ url('/insert-attendance')}}"method="post">
                        @csrf
                            <h4 class="text-success" align="center">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Select Date : </label>
                                    <input type="date" name="att_date" style="width:140px;" required> <br>
                                </div>
                            </h4>
                            <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                                <div class="row">
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
                                        		@foreach($employee as $row)
                                                <tr>
                                                    <td>
                                                        <img src="{{ $row->photo }}" style="height:60px; width:60px;">
                                                    </td>

                                                    <td>{{ $row->name }}</td>

                                                    <input type="hidden" name="user_id[]" value="{{ $row->id }}">

                                                    <td>
                                                        <input type="radio" name="attendance[{{ $row->id }}]" value="Present" required > Present

                                                        <input type="radio" name="attendance[{{ $row->id }}]" value="Absence"> Absence
                                                    </td>
                                                </tr>
                                                @endforeach                   
                                            </tbody>
                                    	</table>
                                    	<button type="submit" style="margin-right:100px;" class="btn btn-success pull-right">Attendance Submit </button>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
                <div class="col-md-1"></div> 
            </div>                 			
        </div> <!-- container -->              
    </div> <!-- content -->
</div> <!-- content-page -->

@endsection