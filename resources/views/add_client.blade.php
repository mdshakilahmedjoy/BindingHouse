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
                            <div class="panel-heading" style="padding-left:50px;"><h3 class="panel-title">Add Client</h3></div>
                            <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                                <form role="form" action="{{ url('/insert-client')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Client Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ShopName</label>
                                        <input type="text" class="form-control" name="shopname" placeholder="ShopName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account Holder</label>
                                        <input type="text" class="form-control" name="account_holder" placeholder="Account Holder" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account Number</label>
                                        <input type="text" class="form-control" name="account_number" placeholder="Account Number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Name</label>
                                        <input type="text" class="form-control" name="bank_name" placeholder="Bank Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Branch name</label>
                                        <input type="text" class="form-control" name="branch_name" placeholder="Branch Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <input type="text" class="form-control" name="city" placeholder="City" required> <br>
                                    </div>

                                    <div class="form-group">    
                                        <label for="exampleInputPassword1">Photo</label>
                                        <img id="image" src="#" />
                                        <input type="file" name="photo" accept="image/*" class="upload"  required onchange="readURL(this);"> <br>
                                    </div>

                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                    <div class="col-md-1"></div>
                </div>    
            </div> <!-- container -->              
        </div> <!-- content -->
    </div> <!-- content-page -->

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