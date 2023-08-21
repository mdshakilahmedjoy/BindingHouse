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
                    $totalexpense = DB::table('expenses')->sum('amount');
                    $totalsalary = DB::table('salaries')->sum('paid_salary');
                    $totaladvanced = DB::table('advance_salaries')->sum('advanced_salary');

                    $tatal_all_expense = ($totalexpense + $totalsalary + $totaladvanced);
                @endphp


                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding-left:50px;">
                                <h3 class="panel-title"> All Expanse</h3>
                            </div>
                            
                            <div>
                            	<br>
                            	<h3 style="color: red; font-size: 22px; margin-left: 150px;" align="center">Total Expanse : {{$tatal_all_expense}} Taka.

                            	<a href="{{ route('add.expense') }}" class="btn btn-sm btn-success pull-right" style="margin-right: 100px;">Add Expanse</a> </h3>
                            </div>

                            <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Details</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                     
                                            <tbody>
                                                @foreach($expense as $row)
                                                <tr>
                                                    <td>{{ $row->date }}</td>
                                                    <td>{{ $row->details }}</td>
                                                    <td>{{ $row->amount }}</td>

                                                    <td>
                                                        <a href="{{ URL::to('/edit-expense/'.$row->id) }}" class="btn btn-sn btn-info" id="edit">Edit</a>

                                                        <a href="{{ URL::to('/delete-expense/'.$row->id) }}" class="btn btn-sn btn-danger" id="delete">Delete</a>  
                                                    </td>                                         
                                                </tr>
                                                @endforeach
                                            </tbody>

                                            <tbody>
                                                @foreach($salary as $row)
                                                <tr>
                                                    <td>{{ $row->date }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->paid_salary }}</td>
                                                    <td>Salary Paid</td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                            <tbody>
                                                @foreach($advanced as $row)
                                                <tr>
                                                    <td>{{ $row->date }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->advanced_salary }}</td>
                                                    <td>Salary Advanced</td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
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