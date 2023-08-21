@extends('layouts.app')
@section('content')

    @php
        $profile = DB::table('profile')->where('id', '1')->first();
    @endphp

    <div class="wrapper-page">

         <!-- Top Bar Start -->
          <div class="topbar">
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <ul class="nav navbar-nav navbar-left pull-left" style="padding-left:5%;">
                            <li style="width:100%;">
                                <div class="text-center logo" style="font-size:20px;">
                                    <i class="md md-terrain"></i> <span> {{ $profile->company_name }} </span>
                                </div>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right pull-right" style="padding-right:20px;">
                            <li>
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><br><br>
        <!-- Top Bar End -->


        <div class="panel panel-color panel-primary panel-pages">
           
            <div class="panel-heading bg-img"> 
                <div class="bg-overlay"><br>
                    <h4 class="text-center m-t-10 text-white" style="font-size: 20px;"> <strong>ADMIN LOGIN</strong> </h4>
                </div> 
            </div> 

            <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                @csrf
                    
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control @error('email') is-Invalid @enderror input-lg" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email or Username">

                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('password') is-Invalid @enderror input-lg" id="password" type="password" name="password" value="{{ old('password') }}" required autofocus placeholder="Password">
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div> 
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary" style="padding:auto; font-size:18px; border-radius:8px;" type="submit">Log in</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7" style="font-size:15.5px;">
                            <a href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                    </div>
                </form> 
            </div>                                            
        </div>
    </div> 

    <footer class="footer text-right">
        Copyright@ 2023 Developed & Designed By Md Shakil Ahmed Joy. 
    </footer>

@endsection
