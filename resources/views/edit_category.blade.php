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
                            <div class="panel-heading" style="padding-left:50px;"><h3 class="panel-title">Update Category</h3></div>
                            <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                                <form role="form" action="{{ url('/update-category/'.$edit->id)}}" method="post" enctype="multipart/form-data">
                                	@csrf
                                  
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Category Name</label>
                                        <input type="text" class="form-control" name="cat_name" value=" {{ $edit->cat_name }} " required>
                                    </div>

                                    <div class="form-group">    
                                        <label for="exampleInputPassword1">New Photo</label>
                                        <img id="image" src="#" />
                                        <input type="file" name="photo" accept="image/*" class="upload" onchange="readURL(this);"> <br>
                                    </div>

                                    <div class="form-group">
                                        <img style="height:80px; width:80px;" src="{{ URL::to($edit->photo) }}" />
                                        <input type="hidden" name="old_photo" value="{{ $edit->photo }}">
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