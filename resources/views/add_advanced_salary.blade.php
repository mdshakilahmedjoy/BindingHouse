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
                            <div class="panel-heading" style="padding-left:50px;">
                                <h3 class="panel-title">Pay Advanced Salary</h3>
                            </div>
                            <div class="panel-body" style="margin-left:100px; margin-right:100px;">
                                <div>
                                    <a href="{{ route('pay.duesalary') }}" style="margin-right:5px;" class="btn btn-sm btn-info pull-right">Pay Due Salary</a>

                                    <a href="{{ route('pay.salary') }}" style="margin-right:5px;" class="btn btn-sm btn-purple pull-right">Pay Salary</a>
                                    </br><br>
                                </div>

                                <form role="form" action="{{ url('/insert-advancedsalary')}}" method="post" enctype="multipart/form-data">
                                	@csrf
                                    <h4 class="text-success" align="center">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Select Month : </label>
                                            <input type="month" name="month" style="width:160px;" required>
                                        </div>
                                    </h4>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Employee Name</label>
                                        @php
                                        	$emp=DB::table('employees')->get();
                                        @endphp
                                        <select class="form-control" name="emp_id">
                                            <option value=""></option>
                                            @foreach($emp as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Advanced Salary</label>
                                        <input type="text" class="form-control" name="advanced_salary" placeholder="Advanced Salary" required> <br>
                                    </div>
                                  
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
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