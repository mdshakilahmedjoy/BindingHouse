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
                                <h3 class="panel-title">Pay Due Salary 
                                    <span class="pull-right" style="padding-right:50px;">{{ $duesalary->name}}
                                    </span>
                                </h3>
                            </div>
                            <div class="panel-body" style="margin-left:100px; margin-right:100px;">
                                <form role="form" action="{{ url('/update-duesalary/'.$duesalary->id )}}" method="post">
                                    @csrf
                                    <h4 class="text-danger" align="center">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Total Due Amount : {{ $duesalary->due_salary }} Taka. </label>
                                        </div><hr>
                                    </h4>
                                   
                                    <div>
                                        <label for="exampleInputEmail1">Due Salary Paid</label>
                                        <input type="text" class="form-control" name="paid_duesalary" placeholder="Due Amount" required><hr>
                                    </div>

                                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
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