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
          			<!-- Add Product -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding-left:50px;"><h3 class="panel-title">Update Product</h3></div>
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <<li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                                <form role="form" action="{{ url('/update-product/'.$edit->id ) }}" method="post" enctype="multipart/form-data">
                                	@csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" value="{{ $edit->product_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Code</label>
                                        <input type="text" class="form-control" name="product_code" value="{{ $edit->product_code }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Category</label>
                                        @php
                                            $cat=DB::table('categories')->get();
                                        @endphp
                                        <select name="cat_id" class="form-control">
                                            @foreach($cat as $row)
                                                <option value="{{ $row->id }}" <?php if($edit->cat_id== $row->id) {echo "selected";} ?> >{{ $row->cat_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1"> Product Size </label>
                                        <input type="text" class="form-control" name="product_size" value="{{ $edit->product_size }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"> Binding Cost </label>
                                        <input type="text" class="form-control" name="binding_cost" value="{{ $edit->binding_cost }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Godaun Number</label>
                                        <input type="text" class="form-control" name="godaun_number" value="{{ $edit->godaun_number }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Route Number</label>
                                        <input type="text" class="form-control" name="route_number" value="{{ $edit->route_number }}" required>
                                    </div>                           

                                    <div class="form-group">	
                                        <label for="exampleInputPassword1">New Photo</label>
                                        <img id="image" src="#" />
                                        <input type="file" name="product_image" accept="image/*" class="upload" onchange="readURL(this);"> <br>
                                    </div>

                                    <div class="form-group">
                                        <img style="height:80px; width:80px;" src="{{ URL::to($edit->product_image) }}" />
                                        <input type="hidden" name="old_photo" value="{{ $edit->product_image }}">
                                    </div>

                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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