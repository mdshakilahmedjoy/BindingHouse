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

                @php

                    if($month == NULL){
                        $present = 0;
                        $absence = 0;
                        $working =0;
                        $paid = 0;
                        $advanced = 0;
                    }
                    else{
                        $present = DB::table('attendances')->where('att_date','Like',"$month%")->where('user_id',"$employee->id")->where('attendance',"Present")->count('user_id');

                        $absence = DB::table('attendances')->where('att_date','Like',"$month%")->where('user_id',"$employee->id")->where('attendance',"absence")->count('user_id');

                        $working = DB::table('attendances')->where('att_date','Like',"$month%")->where('user_id',"$employee->id")->count('user_id');

                        $paid = DB::table('salaries')->where('salary_month','Like',"$month%")->where('employee_id',"$employee->id")->sum('paid_salary');

                        $advanced = DB::table('advance_salaries')->where('month','Like',"$month")->where('emp_id',"$employee->id")->sum('advanced_salary');
                    }
                    
                    if($working == 0){
                        $monthly_salary=0;
                    }
                    else{
                        $monthly_salary=(int) round(($employee->salary / $working) * ($present));

                    }

                @endphp


                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding-left:50px; padding-right:50px;">
                                <h3 class="panel-title" style="padding-left:50px;"> Pay Salary ({{$month}}) <span class="pull-right" style="padding-right:50px;"> {{ $employee->name}}____(Salary : {{$employee->salary}} Taka) </span></h3>
                            </div>

                            <div class="panel-body" style="margin-left:100px; margin-right:100px;">
                                <div align="center">
                                    <form role="form" action="{{ url('/pay-monthly-salary/'.$employee->id)}}" method="post">
                                    @csrf 
                                        <h4 class="text-success">
                                            <div class="form-group">
                                                <input type="month" name="month" required style="width:160px;"> 
                                                <button type="submit" class="btn btn-info waves-effect waves-light">Search</button><hr>
                                            </div>
                                        </h4>
                                    </form>
                                </div>

                                <div align="center">
                                    <table style="width:70%; text-align: right;">
                                        <tr>
                                            <th>Present : </th>
                                            <th>{{$present}} days.</th>
                                            <th rowspan="4" width="100px"></th>
                                            <th>Salary ({{$month}}): </th>
                                            <th> {{$monthly_salary}} Taka.</th>
                                        <tr>
                                            <th>Absence : </th>
                                            <th>{{$absence}} days.</th>
                                            <th>Advanced Salary : </th>
                                            <th>{{$paid + $advanced}} Taka.</th>
                                        </tr>
                                        <tr>
                                            <th colspan="5" height="5px"></th>
                                        </tr>
                                        <tr>
                                            <th>Working :</th>
                                            <th>{{$working}} days.</th>
                                            <th>Total Salary Due : </th>
                                            <th>{{($monthly_salary)-($paid +$advanced)}} Taka.</th>
                                        </tr>
                                    </table>
                                </div> <hr>

                                <div align="center">
                                     <form role="form" action="{{ url('/insert-salary/'.$employee->id)}}" method="post">
                                        @csrf
                                        <div class="form-group" style="font-size:18px;">
                                            <input type="text" name="paid_salary" placeholder="Amount" required style="width:150px; height:30px;"> 
                                            <input type="hidden" name="month" value="{{ $month }}">
                                            <input type="hidden" name="monthly_salary" value="{{ $monthly_salary }}">
                                            <input type="hidden" name="advanced" value="{{ $advanced }}">

                                            <button type="submit" class="btn btn-info waves-effect waves-light">Pay Salary</button><hr>
                                        </div>
                                    </form>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>                          
            </div> <!-- container -->              
        </div> <!-- content -->
    </div> <!-- content-page -->

@endsection