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
                            <div class="panel-heading" style="padding-left:50px;"><h3 class="panel-title">Add Product</h3></div>
                            <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                                <form role="form" action="{{ url('/insert-product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" placeholder="Product Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Code</label>
                                        <input type="text" class="form-control" name="product_code" placeholder="Product Code" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Category</label>
                                        @php
                                        	$cat=DB::table('categories')->get();
                                        @endphp
                                        <select name="cat_id" class="form-control">
                                        	@foreach($cat as $row)
                                        		<option value="{{ $row->id }}"> {{ $row->cat_name }} </option>
                                        	@endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Size</label>
                                        <input type="text" class="form-control" name="product_size" placeholder="Product Size" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Binding Cost</label>
                                        <input type="text" class="form-control" name="binding_cost" placeholder="Binding Cost" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Godaun Number</label>
                                        <input type="text" class="form-control" name="godaun_number" placeholder="Godaun Number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Route Number</label>
                                        <input type="text" class="form-control" name="route_number" placeholder="Route Number" required>
                                    </div><br>
                                    <div class="form-group">    
                                        <label for="exampleInputPassword1">Product Photo</label>
                                        <img id="image" src="#" />
                                        <input type="file" name="product_image" accept="image/*" class="upload"  required onchange="readURL(this);"> <br>
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