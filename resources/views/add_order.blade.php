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
  
	            <div class="col-md-12">
	                <div class="panel panel-primary">
	                    <div class="panel-heading" style="padding-left:50px; padding-right:50px;">
	                        <h3 class="panel-title""> Product Order </h3>
	                    </div>
	                </div>
	            </div>
	        </div>

            <div class="row">
            	<div class="col-sm-6">          		
            		<div class="price_card text-center">	                    
	                    <ul class="price-features" style="border:1px solid grey;">
	                        <table class="table">
	                        	<thead>
	                        		<tr>
	                        			<th style="text-white"> Product Name </th>
	                        			<th style="text-white"> Qty </th>
	                        			<th style="text-white"> Price </th>
	                        			<th style="text-white"> Sub-Total </th>
	                        			<th style="text-white"> Action </th>
	                        		</tr>
	                        	</thead>

			                    @php
		                        	$cart_prod = Cart::content();
		                        @endphp

	                        	<tbody>
	                        		@foreach($cart_prod as $prod)
	                        		<tr> 
	                        			<th> {{ $prod->name }}</th>
	                        			<th>
	                        				<form action="{{ url('/cart-update/'.$prod->rowId) }}" method="post">
	                        				@csrf
	                        					<input type="number" name="qty" value="{{ $prod->qty }}" style="width:70px;">

	                        					<button type="submit" class="btn btn-sm btn-success" style="margin-top:-2px;"> Ok </button>
	                        				</form> 	                        		 
	                        			</th>
	                        			<th> {{ $prod->price }} </th>
	                        			<th> {{ $prod->price* $prod->qty}} </th>
	                        			<th> 
	                        				<a href="{{ URL::to('/cart-remove/'.$prod->rowId) }}" class="btn btn-sn btn-danger" style="font-size:12px;">Delate<i class="fas fa-trash-alt"></i> </a>
	                        			</th>
	                        		</tr>
	                        		@endforeach
	                        	</tbody>
	                        </table>
	                    </ul>
	                    <br>

<!-- Card Invoice -->
	                    <form action="{{ url('/create-invoice') }}" method="post">
            			@csrf
	                    <div class="pricing-footer bg-primary">
	                    	<div style="padding:5px;">
	                    		<h5 class="text-white" style="font-size:16px;"> Quantity : {{ Cart::count(); }} </h5>
	                    		<h4 class="text-white" style="font-size: 18px;"> Total : {{ Cart::subtotal(); }} </h4>
	                    	</div>
	                   		                		
							<div class="panel"> <br> <br>
								@if($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
		            			<h4 class="text-info"> Select Client
		            				<a href="#" class="btn btn-sm btn-success waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>
		            			</h4>
		            			<select class="form-control" name="cln_id">
		            				<option disabled="" selected="">Select Client</option>
		            				@foreach ($client as $cln)
		            				<option value="{{ $cln->id }}"> {{ $cln->name }} </option>
		            				@endforeach
		            			</select>
		            		</div>

	                    </div> 

	                    <button type="submit" class="btn btn-success">Create Invoice</button>

	                    </form>     
	                </div>	       
            	</div>
            	

            	<div class="col-sm-6">
            		<table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Binding Cost</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                 
                        <tbody>
                            @foreach($product as $row)
                            <tr>
                            	<form action="{{ url('/add-cart') }}">
                            	@csrf
                            	<input type="hidden" name="id" value="{{ $row->id }}">
                            	<input type="hidden" name="name" value="{{ $row->product_name }}">
                            	<input type="hidden" name="qty" value="1">
                            	<input type="hidden" name="price" value="{{ $row->binding_cost }}">
                                <td>
	                            	{{-- <a href="#" style="font-size:30px;"><i class="fas fa-plus-square"></i></a> --}}
                                    <img src="{{ $row->product_image }}" style="height:60px; width:80px;">
                                </td>                          
                                <td> {{ $row->product_name }} </td>                          
                                <td> {{ $row->product_code }} </td>
                                <td> {{ $row->binding_cost }} </td>
                                <td> 
                                	<button type="submit" class="btn btn-info btn-sm"> <i class="">Add</i> </button>       
                                </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            	</div>

            </div>
        </div> <!-- container -->                 
    </div> <!-- content -->
</div> <!-- content page -->


<!-- client add modal -->
<form action="{{ url('/insert-client')}}" method="POST" enctype="multipart/form-data">
@csrf
	<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog"> 
	        <div class="modal-content"> 
	            <div class="modal-header"> 
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
	                <h4 class="modal-title">Add a New Client</h4> 
	            </div> 

	            <div class="modal-body"> 
	                <div class="row"> 
	                    <div class="col-md-4"> 
	                        <div class="form-group">
                                <label for="exampleInputEmail1">Client Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div> 
	                    </div> 
	                    <div class="col-md-4"> 
	                        <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
	                    </div>
	                    <div class="col-md-4"> 
	                        <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div> 
	                    </div>
	                </div>
	                <div class="row">                       
	                    <div class="col-md-4"> 
	                        <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
	                    </div> 
	                    <div class="col-md-4"> 
	                        <div class="form-group">
                                <label for="exampleInputPassword1">City</label>
                                <input type="text" class="form-control" name="city" required>
                            </div>
	                    </div>
	                    <div class="col-md-4"> 
	                        <div class="form-group">
                                <label for="exampleInputPassword1">ShopName</label>
                                <input type="text" class="form-control" name="shopname"required>
                            </div>
	                    </div>
	                </div>
	                <div class="row">                                         
	                    <div class="col-md-4"> 
	                        <div class="form-group">
                                <label for="exampleInputPassword1">Account Holder</label>
                                <input type="text" class="form-control" name="account_holder" required>
                            </div>
	                    </div> 
	                    <div class="col-md-4"> 
	                        <div class="form-group">
                                <label for="exampleInputPassword1">Account Number</label>
                                <input type="text" class="form-control" name="account_number" required>
                            </div>
	                    </div> 
	                    <div class="col-md-4"> 
	                        <div class="form-group">
                                <label for="exampleInputPassword1">Bank Name</label>
                                <input type="text" class="form-control" name="bank_name" required>
                            </div>
	                    </div>
	                </div>
	                <div class="row">  
	                    <div class="col-md-4"> 
	                        <div class="form-group">
                                <label for="exampleInputPassword1">Branch name</label>
                                <input type="text" class="form-control" name="branch_name" required>
                            </div> 
	                    </div> 
	                    <div class="col-md-2"> 
	                        <div class="form-group"> 
                                <img id="image" src="#" />                                
	                        </div> 
	                    </div>
	                    <div class="col-md-4"> 
	                    	<div class="form-group">    
                                <label for="exampleInputPassword1">Photo</label>
                                <input type="file" name="photo" accept="image/*" class="upload"  required onchange="readURL(this);"> 
                            </div>
	                    </div> 
	                </div>
	            </div> 

	            <div class="modal-footer"> 
	                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
	                <button type="submit" class="btn btn-info waves-effect waves-light"> Submit</button> 
	            </div> 
	        </div> 
	    </div>
	</div><!-- /.modal -->
</form>

<script type="text/javascript">
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image')
                    .attr('src',e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
