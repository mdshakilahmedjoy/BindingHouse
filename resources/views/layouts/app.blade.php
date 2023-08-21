<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>{{ config('app.name', 'Laravel') }}</title>

	    <!-- Scripts -->
	    <link href="{{ asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
	    <!-- Font Icons -->
	    <link href="{{ asset('public/admin/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
	    <link href="{{ asset('public/admin/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
	    <link href="{{ asset('public/admin/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
	    <!-- animate css -->
	    <link href="{{ asset('public/admin/css/animate.css')}}" rel="stylesheet" />
	    <!-- Waves-effeact -->
	    <link href="{{ asset('public/admin/css/waves-effect.css')}}" rel="stylesheet">
	    <!-- Custom Files -->
	    <link href="{{ asset('public/admin/css/helper.css')}}" rel="stylesheet" type="text/css" />
	    <link href="{{ asset('public/admin/css/style.css')}}" rel="stylesheet" type="text/css" />
	    <script src="{{ asset('public/admin/js/modernizr.min.js')}}"></script>


	    <!-- sweet alerts -->
	    <link href="{{ asset('public/admin/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('public/admin/assets/sweet-alert/sweet-alert.init.css') }}" rel="stylesheet">


	    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">

	    <!-- DataTables -->
	    <link href="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

	    <!-- Fonts -->
	    <link rel="dns-prefetch" href="//fonts.gstatic.com">
	    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3B1XeVIU" crossorigin="anonymous">

	</head>


	@php
	    $profile = DB::table('profile')->where('id', '1')->first();
	@endphp

	<body>
	    <body class="fixed-left">
	        <!-- Begin page -->
	        <div id="wrapper" style="margin-left:10px;">
	            @guest

	            @else
	            <!-- Top Bar Start -->
	            <div class="topbar">

		            <!-- LOGO -->
	                <div class="topbar-left">
	                    <div class="text-center logo" style="font-size:18px; padding-left: 10px;">
                           <i class="md md-terrain"></i> <span> {{ $profile->owner_name }} </span>
                        </div>
	                </div>
	                
	                <!-- Button mobile view to collapse sidebar menu -->
	                <div class="navbar navbar-default" role="navigation">
	                    <div class="container">
	                        <div>
	                            <div class="pull-left">
	                                <button class="button-menu-mobile open-left">
	                                    <i class="fa fa-bars"></i>
	                                </button>
	                                <span class="clearfix"></span>
	                            </div>

	                            <ul class="nav navbar-nav navbar-left pull-left" style="padding-left:8%;">
		                            <li class="hidden-xs">
		                                <div class="text-center logo" style="font-size:20px;">
		                                    <i class="md md-terrain"></i> <span> {{ $profile->company_name }} </span>
		                                </div>
		                            </li>
		                        </ul>

	                           <ul class="nav navbar-nav navbar-right pull-right" style="padding-right:20px;">

	                           		<li class="hidden-xs">
		                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
		                            </li>   

	                           		<li class="dropdown">
	                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ $profile->company_logo }}" alt="user-img" class="img-circle"> </a>

	                                    <ul class="dropdown-menu">
	                                        <li><a href="{{ route('profile') }}"><i class="md md-face-unlock"></i> Profile</a></li>

	                                        <li><a href="{{ route('logout') }}"
	                                            onclick="event.preventDefault();
	                                            document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a>
	                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	                                                @csrf
	                                            </form>
	                                        </li>
	                                    </ul>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- Top Bar End -->


	            <!-- ========== Left Sidebar Start ========== -->
	            <div class="left side-menu">
	                <div class="sidebar-inner slimscrollleft">
	         
	                    <!--- Divider -->
	                    <div id="sidebar-menu" style="font-size:14.5px;">
	                        <ul>
	                            <li>
	                                <a href="{{ route('home') }}" class="waves-effect active"><i class="md md-home"></i><span><b>Dashboard</b></span></a>
	                            </li>

	                            <li class="has_sub">
	                                <a href="#" class="waves-effect"><i class="md md-palette"></i><span> Clients </span><span class="pull-right"><i class="md md-add"></i></span></a>
	                                <ul class="list-unstyled">
	                                    <li><a href="{{ route('add.client') }}">Add Client</a></li>
	                                    <li><a href="{{ route('all.client') }}">All Client</a></li>
	                                </ul>
	                            </li>

	                            <li class="has_sub">
	                                <a href="#" class="waves-effect"><i class="fa fa-users"></i><span> Employees </span><span class="pull-right"><i class="md md-add"></i></span></a>
	                                <ul class="list-unstyled">
	                                    <li><a href="{{ route('add.employee') }}">Add Employee</a></li>
	                                    <li><a href="{{ route('all.employee') }}">All Employee</a></li>
	                                </ul>
	                            </li>


	                            <li class="has_sub">
	                                <a href="#" class="waves-effect"><i class="md md-palette"></i><span> Categories </span><span class="pull-right"><i class="md md-add"></i></span></a>
	                                <ul class="list-unstyled">
	                                    <li><a href="{{ route('add.category') }}">Add Catagory</a></li>
	                                    <li><a href="{{ route('all.category') }}">All Catagory</a></li>
	                                </ul>
	                            </li>

	                            <li class="has_sub">
	                                <a href="#" class="waves-effect"><i class="md md-palette"></i><span> Products </span><span class="pull-right"><i class="md md-add"></i></span></a>
	                                <ul class="list-unstyled">
	                                    <li><a href="{{ route('add.product') }}">Add Product</a></li>
	                                    <li><a href="{{ route('all.product') }}">All Product</a></li>
	                                </ul>
	                            </li>

	                            <li class="has_sub">
	                                <a href="#" class="waves-effect"><i class="md md-palette"></i><span> Invest </span><span class="pull-right"><i class="md md-add"></i></span></a>
	                                <ul class="list-unstyled">
	                                    <li><a href="{{ route('add.invest') }}">Add Invest</a></li>
	                                    <li><a href="{{ route('today.invest') }}">Today Invest</a></li>
	                                    <li><a href="{{ route('monthly.invest') }}">Monthly Invest</a></li>
	                                    <li><a href="{{ route('yearly.invest') }}">Yearly Invest</a></li>
	                                    <li><a href="{{ route('all.invest') }}">All Invest</a></li>
	                                </ul>
	                            </li>

	                            <li class="has_sub">
	                                <a href="#" class="waves-effect"><i class="md md-palette"></i><span> Expense </span><span class="pull-right"><i class="md md-add"></i></span></a>
	                                <ul class="list-unstyled">
	                                    <li><a href="{{ route('add.expense') }}">Add Expense</a></li>
	                                    <li><a href="{{ route('today.expense') }}">Today Expense</a></li>
	                                    <li><a href="{{ route('monthly.expense') }}">Monthly Expense</a></li>
	                                    <li><a href="{{ route('yearly.expense') }}">Yearly Expense</a></li>
	                                    <li><a href="{{ route('all.expense') }}">All Expense</a></li>
	                                </ul>
	                            </li>

	                            <li class="has_sub">
	                                <a href="#" class="waves-effect"><i class="md md-palette"></i><span> Salary (EMP) </span><span class="pull-right"><i class="md md-add"></i></span></a>
	                                <ul class="list-unstyled">
	                                    <li><a href="{{ route('pay.salary') }}">Pay Salary</a></li>
	                                    <li><a href="{{ route('pay.duesalary') }}">Pay Due Salary</a></li>
	                                    <li><a href="{{ route('add.advancedsalary') }}">Pay Advanced Salary</a></li>
	                                    <li><a href="{{ route('all.advancedsalary') }}">All Advanced Salary</a></li>
	                                    <li><a href="{{ route('all.salary') }}">Last Month Salary</a></li>
	                                </ul>
	                            </li>

	                            <li class="has_sub">
	                                <a href="#" class="waves-effect"><i class="md md-palette"></i><span> Orders </span><span class="pull-right"><i class="md md-add"></i></span></a>
	                                <ul class="list-unstyled">
	                                    <li><a href="{{ route('add.order') }}">Add Order</a></li>
	                                    <li><a href="{{ route('pending.orders') }}"> Panding Orders </a></li>
	                                    <li><a href="{{ route('success.orders') }}"> Success Orders</a></li>
	                                </ul>
	                            </li>

	                            <li class="has_sub">
	                                <a href="#" class="waves-effect"><i class="md md-palette"></i><span> Delivery </span><span class="pull-right"><i class="md md-add"></i></span></a>
	                                <ul class="list-unstyled">
	                                    <li><a href="{{ route('success.orders') }}">All Delivary</a></li>
	                                </ul>
	                            </li>

	                            <li class="has_sub">
	                                <a href="#" class="waves-effect"><i class="md md-palette"></i><span> Attendance (EMP)</span><span class="pull-right"><i class="md md-add"></i></span></a>
	                                <ul class="list-unstyled">
	                                    <li><a href="{{ route('take.attendance') }}">Take Attendance</a></li>
	                                    <li><a href="{{ route('all.attendance') }}">All Attendance</a></li>
	                                </ul>
	                            </li>

	                            <li>
	                                <a href="{{ route('logout') }}" class="waves-effect active" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="md md-settings-power"></i><b> Logout</b></a>
	                            </li>
	    
	                        </ul>
	                        <div class="clearfix"></div>
	                    </div>
	                    <div class="clearfix"></div>
	                </div>
	            </div>
	            <!-- Left Sidebar End --> 
	            @endguest
	        </div>
	    

	        <main class="py-4">
	            @yield('content')
	        </main>


	        <script>
	            var resizefunc = [];
	        </script>

	        <!-- jQuery  -->
	        <script src="{{ asset('public/admin/js/jquery.min.js') }}"></script>
	        <script src="{{ asset('public/admin/js/bootstrap.min.js') }}"></script>
	        <script src="{{ asset('public/admin/js/waves.js') }}"></script>
	        <script src="{{ asset('public/admin/js/wow.min.js') }}"></script>
	        <script src="{{ asset('public/admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
	        <script src="{{ asset('public/admin/js/jquery.scrollTo.min.js') }}"></script>
	        <script src="{{ asset('public/admin/assets/chat/moment-2.2.1.js') }}"></script>
	        <script src="{{ asset('public/admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
	        <script src="{{ asset('public/admin/assets/jquery-detectmobile/detect.js') }}"></script>
	        <script src="{{ asset('public/admin/assets/fastclick/fastclick.js') }}"></script>
	        <script src="{{ asset('public/admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
	        <script src="{{ asset('public/admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

	        <!-- sweet alerts -->
	        <script src="{{ asset('public/admin/assets/sweet-alert/sweet-alert.min.js') }}"></script>
	        <script src="{{ asset('public/admin/assets/sweet-alert/sweet-alert.init.js') }}"></script>
	        <script src="{{ asset("https://unpkg.com/sweetalert/dist/sweetalert.min.js") }}"></script>


	        <!-- Counter-up -->
	        <script src="{{ asset('public/admin/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
	        <script src="{{ asset('public/admin/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
	        
	        <!-- CUSTOM JS -->
	        <script src="{{ asset('public/admin/js/jquery.app.js') }}"></script>

	        <!-- Dashboard -->
	        <script src="{{ asset('public/admin/js/jquery.dashboard.js') }}"></script>


	        <!-- Todo -->
	        <script src="{{ asset('public/admin/js/jquery.todo.js') }}"></script>
	        <script src="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
	        <script src="{{ asset('public/admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


	        <script type="text/javascript">
	            $(document).ready(function() {
	                $('#datatable').dataTable();
	            } );
	        </script>
	        <script type="text/javascript">
	            /* ==============================================
	            Counter Up
	            =============================================== */
	            jQuery(document).ready(function($) {
	                $('.counter').counterUp({
	                    delay: 100,
	                    time: 1200
	                });
	            });
	        </script>

	        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
	        <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

	        <script>
	            @if(Session::has('message'))
	            var type="{{Session::get('alert-type','info')}}"
	            switch(type){
	                case 'info':
	                    toastr.info("{{ Session::get('message') }}");
	                    break;
	                case 'success':
	                    toastr.success("{{ Session::get('message') }}");
	                    break;
	                case 'warning':
	                    toastr.warning("{{ Session::get('message') }}");
	                    break;
	                case 'error':
	                    toastr.error("{{ Session::get('message') }}");
	                    break;
	            }
	            @endif
	        </script>


	        <script>
	            $(document).on("click", "#delete", function(e){
	                e.preventDefault();
	                var link = $(this).attr("href");
	                swal({
	                    title: "Are you want to delete?",
	                    text: "Once Delete, This will be Permanently Delete!",
	                    icon: "warning",
	                    buttons: true,
	                    dangerMode: true,
	                })
	                .then((willDelete) => {
	                    if (willDelete){
	                        window.location.href = link;
	                    }
	                    else{
	                        swal("Safe Data!");
	                    }
	                });
	            });
	        </script>

	    </body>
	</body>
</html>
