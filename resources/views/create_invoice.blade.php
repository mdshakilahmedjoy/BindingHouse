@extends('layouts.app')
@section('content')

<!-- ============================================================== -->
<!-- Start Invoice here -->
<!-- ============================================================== -->                      
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Invoice</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Binding House</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Invoice</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-body" style="margin-left:30px; margin-right:30px;">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right">Shakil Binding House</h4>
                                    {{-- <h4 class="text-right"><img src="images/logo_dark.png" alt="Shakil Binding House"></h4> --}}
                                    
                                </div>
                                <div class="pull-right">
                                    <h4>Invoice of {{ $client->name}} <br>
                                        <strong>Date : {{ date("j F Y") }}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left m-t-30">
                                        <address>
                                            <strong>Name : {{ $client->name }}</strong><br>
                                            ShopNmae : {{ $client->shopname }}<br>
                                            Address : {{ $client->address }}, {{ $client->city }}.<br>
                                            Phone : {{ $client->phone }}<br>
                                        </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Order Date: </strong> {{ date('j F Y') }} </p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr><th>#</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit-Cost</th>
                                                <th>Sub-Total</th>
                                            </tr></thead>
                                            <tbody>
                                                @php
                                                    $sl=1;
                                                @endphp

                                                @foreach($contents as $cont)
                                                <tr>
                                                    <td>{{ $sl++ }}</td>
                                                    <td>{{ $cont->name }}</td>
                                                    <td>{{ $cont->qty }}</td>
                                                    <td>{{ $cont->price }}</td>
                                                    <td>{{ $cont->price * $cont->qty}}</td>
                                                </tr> 
                                                @endforeach                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-4 col-md-offset-8" style="padding-right:50px;">
                                    <h3 class="text-right">Total : {{ Cart::subtotal() }} </h3>
                                </div>
                            </div>
                            <hr>


                            <form action="{{ url('/insert-invoice')}}" method="POST">
                            @csrf
                            <div class="hidden-print">
                                <div class="pull-right">               
                                     <input type="hidden" name="client_id" value="{{ $client->id}}">
                                    <input type="hidden" name="order_date" value="{{ date('d/m/y') }}">
                                    <input type="hidden" name="order_status" value="pending">
                                    <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                                    <input type="hidden" name="total" value="{{ Cart::subtotal() }}">


                                    <button type="submit" class="btn btn-primary waves-effect waves-light" style="margin-right:50px;">Order Submit</button>
                                    
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div> <!-- container -->                           
    </div> <!-- content -->
</div> <!-- content page-->



{{-- <!-- Payable Modal -->
<form action="{{ url('/final-invoice')}}" method="POST">
@csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title text-info">Invoice of {{ $client->name}} <span class="pull-right">Total : {{ Cart::total() }}</span></h4> 
                </div> 

                <div class="modal-body"> 
                    <div class="row"> 
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="exampleInputEmail1">Payment</label>
                                <select class="form-control" name="payment_status">
                                    <option value="HandCash"> HandCash </option>
                                    <option value="Cheque"> Cheque </option>
                                    <option value="Due"> Due </option>
                                </select>
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pay</label>
                                <input type="text" class="form-control" name="pay">
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Due</label>
                                <input type="text" class="form-control" name="due">
                            </div> 
                        </div>
                    </div>
                </div> 

                <input type="hidden" name="client_id" value="{{ $client->id}}">
                <input type="hidden" name="order_date" value="{{ date('d/m/y') }}">
                <input type="hidden" name="order_status" value="pending">
                <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                <input type="hidden" name="total" value="{{ Cart::total() }}">

                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                    <button type="submit" class="btn btn-info waves-effect waves-light"> Submit</button> 
                </div> 
            </div> 
        </div>
    </div><!-- /.modal -->
</form> --}}

@endsection
