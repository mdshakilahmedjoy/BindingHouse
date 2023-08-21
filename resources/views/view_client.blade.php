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
	      			<!-- View Employee -->
	                <div class="col-md-1"></div>
	                <div class="col-md-10">
	                    <div class="panel panel-primary" >
	                        <div class="panel-heading" style="padding-left:50px;"><h3 class="panel-title">View Client</h3></div>
	                        <div class="panel-body" style="margin-left:120px; margin-right:50px;">

	                        	<br>
	                        	<table width="90%" style="font-size:15px;">
	                        		<tr style="color: black;">
										<td rowspan="10"> <img style="height:180px; width:180px;" class="img-circle" src="{{ URL::to($single->photo) }}" /> </td>
										
										<td > <label for="exampleInputEmail1"> Name : {{ $single->name }}</label></td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Email :  {{ $single->email }} </label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Phone : {{ $single->phone }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Address : {{ $single->address }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Shopname : {{ $single->shopname }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Account Holder : {{ $single->shopname }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Account Number : {{ $single->account_number }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Bank Name : {{ $single->bank_name }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Branch Name : {{ $single->branch_name }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> City : {{ $single->city }}</label> </td>
									</tr>
	                        	</table> <br>             	                                  
	                        </div><!-- panel-body -->
	                    </div> <!-- panel -->
	                </div> <!-- col-->
	                <div class="col-md-1"></div>
	            </div>    
	        </div> <!-- container -->              
	    </div> <!-- content -->
	</div> <!-- content-page -->
	
@endsection