
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
                                    <h4>Invoice of {{ $order->name}} <br>
                                        <strong>Date : {{ $order->order_date }}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="pull-left m-t-30">
                                        <address>
                                            <strong>Name : {{ $order->name }}</strong><br>
                                            ShopNmae : {{ $order->shopname }}<br>
                                            Address : {{ $order->address }}, {{ $order->city }}.<br>
                                            Phone : {{ $order->phone }}<br>
                                        </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p class="m-t-10"><strong>Order ID: </strong>{{ $order->id }} </p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">{{ $order->order_status }}</span></p>
                                        <p><strong>Delivery Date: </strong> {{ date('d-m-Y') }} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">

                                        <table class="table m-t-30">
                                            <thead>
                                                <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                    <th>Quantity</th>
                                                    <th>Unit-Cost</th>
                                                    <th>Sub-Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $sl=1;
                                                @endphp

                                                @foreach($order_details as $details)
                                                <tr>
                                                    <td>{{ $sl++ }}</td>
                                                    <td>{{ $details->product_name }}</td>
                                                    <td>{{ $details->product_code }}</td>
                                                    <td>{{ $details->quantity }}</td>
                                                    <td>{{ $details->unitcost }}</td>
                                                    <td>{{ $details->unitcost * $details->quantity}}</td>
                                                </tr> 
                                                @endforeach                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-8" style="padding-left:50px;">
                                    <h4> Payment By : {{ $order->payment_status }} </h4>
                                    <h4 >Pay : {{ $order->pay }} </h4>
                                	<h4 >Due : {{ $order->due }} </h4>
                                </div>
                                <div class="col-md-4" style="padding-right:50px;">
                                	<br>
                                	<h3 class="text-right">Total : {{ $order->total }} </h3>
                                </div>
                            </div>
                            <hr>

                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="#" onclick="window.print()" style="margin-right:50px; padding-left:20px; padding-right:20px;"class="btn btn-primary waves-effect waves-light"><i class="fa fa-print"> Print </i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div> <!-- container -->                           
    </div> <!-- content -->
</div> <!-- content page-->

@endsection
