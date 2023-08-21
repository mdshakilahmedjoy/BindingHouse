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
          			<!-- Add Supplier -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding-left:50px;">
                                <h3 class="panel-title">Add Expense </h3>
                            </div>
                            
                            <div>
                                <a href="{{ route('all.expense') }}" class="btn btn-sm btn-purple pull-right" style="margin-right:100px;">All Expense</a>

                                <a href="{{ route('yearly.expense') }}" class="btn btn-sm btn-info pull-right" style="margin-right:5px;">Yearly Expense</a>

                            	<a href="{{ route('monthly.expense') }}" class="btn btn-sm btn-success pull-right" style="margin-right:5px;">Monthly Expense</a>    

                            	<a href="{{ route('today.expense') }}" class="btn btn-sm btn-danger pull-right"style="margin-right:5px;">Today Expense</a>
                            </div> <br>
                            

                            <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                                <form role="form" action="{{ url('/insert-expense')}}" method="post">
                                	@csrf

                                    <h4 class="text-success" align="center">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Select Date : </label>
                                            <input type="date" name="date" style="width:140px;" required> 
                                        </div>
                                    </h4>

                                    <div class="form-group">
                                    	<br>
                                        <label for="exampleInputEmail1">Expense Details</label>
                                        <textarea class="form-control" rows="3" name="details"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Amount</label>
                                        <input type="text" class="form-control" name="amount" placeholder="Amount" required>
                                    </div>                                                                    
                                    <button type="submit" class="btn btn-purple waves-effect waves-light" style="margin-left: 50px;">Submit</button>
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