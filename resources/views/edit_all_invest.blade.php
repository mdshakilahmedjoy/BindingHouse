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
                            <div class="panel-heading" style="padding-left:50px;"><h3 class="panel-title">Update Invest</h3></div>
                            <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                                <form role="form" action="{{ url('/update-invest/'.$edit->id )}}" method="post">
                                	@csrf
                                    <div class="form-group">
                                    	<br>
                                        <label for="exampleInputEmail1">Invest Details</label>
                                        <textarea class="form-control" rows="4" name="details">{{ $edit->details }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Amount</label>
                                        <input type="text" class="form-control" name="amount" value="{{ $edit->amount }}" required>
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

@endsection