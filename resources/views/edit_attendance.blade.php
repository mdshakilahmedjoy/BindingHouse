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
                            <h3 class="panel-title">Update Attendance</h3>
                        </div>

                        <div class="form-group">
                            <h4 class="text-success" align="center">Update Attendance : ({{ $date->att_date }}) </h4>
                        </div>
                            
                        <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                	<form action="{{ url('/update-attendance')}}"method="post">
                                		@csrf
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

	                                                <input type="hidden" name="id[]" value="{{ $row->id }}">

                                                    <input type="hidden" name="att_date[]" value="{{ $row->att_date }}">

	                                                <td>
	                                                    <input type="radio" name="attendance[{{ $row->id }}]" value="Present" required <?php if($row->attendance=='Present') echo "checked"; ?> > Present

	                                                    <input type="radio" name="attendance[{{ $row->id }}]" value="Absence" <?php if($row->attendance=='Absence') echo "checked"; ?> > Absence
	                                                </td>

	                                            </tr>
	                                            @endforeach                   
                                            </tbody>
                                    	</table>
                                    	<button type="submit" style="margin-right:100px;" class="btn btn-success pull-right">Update Attendance</button>
                                    </form>  
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