@extends('layouts.app')
@section('content')
            
<div class="content-page">
    <div class="content">
        <div class="container">


            <div class="row">
            	<div class="col-sm-1"> </div>
            	<div class="col-sm-10">

            		<div class="panel panel-primary" >
	                        <div class="panel-heading" style="padding-left:50px;"><h3 class="panel-title">My  Profile</h3></div>
	                        <div class="panel-body" style="margin-left:100px; margin-right:50px;">

	                        	<br>
	                        	<table width="90%" style="font-size:15px;">
	                        		<tr style="color: black;">
										<td rowspan="10"> <img style="height:180px; width:180px;" class="img-circle" src="{{ URL::to($profile->company_logo) }}" /> </td>
										
										<td > <label for="exampleInputEmail1">Owner Name : {{ $profile->owner_name }}</label></td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Company Name :  {{ $profile->company_name }} </label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Email Address : {{ $profile->email_address }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Phone Number : {{ $profile->phone_number }}</label> </td>
									</tr>
									<tr style="color: black;">
										<td> <label for="exampleInputPassword1"> Address : {{ $profile->address }}</label> </td>
									</tr>

	                        	</table> <br>  


	                        	<div>
	                        		<a href="#" class="btn btn-sm btn-info waves-effect waves-light pull-right" style="font-size:15px;" data-toggle="modal" data-target="#con-close-modal">Edit Information</a>
	                        	</div><hr>

	                        </div><!-- panel-body -->
	                    </div> <!-- panel -->  
            		</div>
            	<div class="col-sm-1"> </div>
            </div>
        </div> <!-- container -->                 
    </div> <!-- content -->
</div> <!-- content page -->


<!-- Edit Profile -->
<form action="{{ url('/update-profile')}}" method="POST" enctype="multipart/form-data">
@csrf
	<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog"> 
	        <div class="modal-content"> 
	            <div class="modal-header"> 
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
	                <h4 class="modal-title">Update Profile</h4> 
	            </div> 

	            <div class="modal-body"> 
	                <div class="row"> 
	                    <div class="col-md-6"> 
	                        <div class="form-group">
                                <label for="exampleInputEmail1">Owner Name</label>
                                <input type="text" class="form-control" name="owner_name" value="{{ $profile->owner_name }}" required>
                            </div> 
	                    </div> 
	                    <div class="col-md-6"> 
	                        <div class="form-group">
                                <label for="exampleInputEmail1">Company Name</label>
                                <input type="text" class="form-control" name="company_name" value="{{ $profile->company_name }}" required>
                            </div>
	                    </div>
	                </div>
	                <div class="row"> 
	                    <div class="col-md-6"> 
	                        <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="text" class="form-control" name="email_address" value="{{ $profile->email_address }}" required>
                            </div> 
	                    </div> 
	                    <div class="col-md-6"> 
	                        <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ $profile->phone_number }}" required>
                            </div>
	                    </div>
	                </div>
	                <div class="row"> 
	                    <div class="col-md-12"> 
	                        <div class="form-group">
                                <label for="exampleInputEmail1"> Address </label>
                                 <textarea class="form-control" rows="2" name="address">{{ $profile->address }}</textarea>
                            </div> 
	                    </div> 
	                </div>
	                <div class="row"> 
	                    <div class="col-md-6"> 
	                        <div class="form-group" style="padding-left: 60px;">
                                <img style="height:80px; width:80px;" src="{{ URL::to($profile->company_logo) }}" />
                                <input type="hidden" name="old_logo" value="{{ $profile->company_logo }}">
                            </div> 
	                    </div> 
	                    <div class="col-md-6"> 
	                        <div class="form-group">
                                <label for="exampleInputPassword1">New Logo</label>
                                <img id="image" src="#" />
                                <input type="file" name="company_logo" accept="image/*" class="upload" onchange="readURL(this);"> <br>
                            </div>
	                    </div>
	                </div>
	            </div> 

	            <div class="modal-footer"> 
	                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
	                <button type="submit" class="btn btn-info waves-effect waves-light"> Update </button> 
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
