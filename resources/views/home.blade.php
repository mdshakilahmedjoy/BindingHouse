@extends('layouts.app')
@section('content')
    
    @php
        $invest = DB::table('invests')->sum('amount');
        $order = DB::table('orders')->count('id');
        $client = DB::table('clients')->count('id');
        $employee = DB::table('employees')->count('id');
        $product = DB::table('products')->count('id');
        $delivery = DB::table('orders')->where('order_status', 'success')->count('id');

    @endphp

    @php
        $totalexpense = DB::table('expenses')->sum('amount');
        $totalsalary = DB::table('salaries')->sum('paid_salary');
        $totaladvanced = DB::table('advance_salaries')->sum('advanced_salary');

        $tatal_all_expense = ($totalexpense + $totalsalary + $totaladvanced);
    @endphp

    <div class="content-page">
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Binding House</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $invest }}</span>
                                Invest
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Total Invest </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-danger"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $tatal_all_expense }}</span>
                                Expense
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Total Expense </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-purple"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{$invest - $tatal_all_expense}}</span>
                                Balance
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Balance</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-success"><i class="ion-ios7-cart"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $order }}</span>
                                Order
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Total Order</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- End row-->

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-info"><i class="ion-android-contacts"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $client }}</span>
                                Clients
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Clients</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-danger"><i class="ion-android-contacts"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $employee }}</span>
                                Employee
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Employee</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-purple"><i class="ion-eye"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $product }}</span>
                                Product
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Total Product </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-success"><i class="ion-ios7-cart"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $delivery }}</span>
                                Delivery
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Total Delivery</h5>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div> <!-- End row-->
            </div> <!-- container -->                 
        </div> <!-- content -->
    </div> <!-- content page -->
    
    <footer class="footer text-right">
        Copyright@ 2023 Developed & Designed By Md Shakil Ahmed Joy. 
    </footer>


@endsection
