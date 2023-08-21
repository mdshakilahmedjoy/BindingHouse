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
	                    <div class="panel panel-primary">
	                        <div class="panel-heading" style="padding-left:50px;"><h3 class="panel-title">View Product</h3></div>
	                        <div class="panel-body" style="margin-left:120px; margin-right:50px;">
	                        	<br>
	                        	<table width="90%" style="font-size:15px;">
	                        		<tr style="color: black;">
										<td rowspan="7"> <img style="height:180px; width:160px;" src="{{ URL::to($viewProduct->product_image) }}" /> </td>

										<td> <label for="exampleInputEmail1">Product Name : {{ $viewProduct->product_name }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputEmail1">Product Code : {{ $viewProduct->product_code }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1">Category : {{ $viewProduct->cat_name }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1">Product Size : {{ $viewProduct->product_size }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1">Binding Cost : {{ $viewProduct->binding_cost }}</label>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1">Godaun Number : {{ $viewProduct->godaun_number }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1">Route Number : {{ $viewProduct->route_number }}</label> </td>
									</tr>
	                        	</table> 
	                        	<br>                            	                   
	                        </div><!-- panel-body -->
	                    </div> <!-- panel -->
	                </div> <!-- col-->
	                <div class="col-md-1"></div>
	            </div>    
	        </div> <!-- container -->              
	    </div> <!-- content -->
	</div> <!-- content-page -->
	
@endsection