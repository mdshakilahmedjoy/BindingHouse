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
          			<!-- Add Employee -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding-left:100px;">
                                <h3 class="panel-title">Update Advanced Salary
                                    <span class="pull-right" style="padding-right:100px;">{{ $advancedsalary->name}}
                                    </span>
                                </h3>
                            </div>
                            <div class="panel-body" style="margin-left:100px; margin-right:100px;">
                                <form role="form" action="{{ url('/update-advancedsalary/'.$advancedsalary->id )}}" method="post" enctype="multipart/form-data">
                                	@csrf
                                    <h4 class="text-purple" align="center" style="font-size:16px;">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Advanced Paid Date: ({{ $advancedsalary->date }}) </label><br>
                                            <label for="exampleInputPassword1">Advanced Paid Month: ({{ $advancedsalary->month }}) </label>
                                        </div>
                                    </h4><hr>

                                    <div class="form-group" style="font-size:16px;">
                                        <label for="exampleInputPassword1">Advanced Salary : </label>
                                        <input style="font-size:18px; width:80%; margin-left:80px;" type="text" class="form-control" name="advanced_salary" value="{{ $advancedsalary->advanced_salary }}" required>
                                    </div><hr>
                                  
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                    <div class="col-md-1"></div>
                </div>    
            </div> <!-- container -->              
        </div> <!-- content -->
    </div> <!-- content-page -->

@endsection