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
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding-left:50px;">
                                <h3 class="panel-title"> Pay Salary </h3>
                            </div>
                            <div>
                                </br>
                                <a href="{{ route('add.advancedsalary') }}" style="margin-right:80px;" class="btn btn-sm btn-success pull-right">Pay Advanced Salary</a>

                                <a href="{{ route('pay.duesalary') }}" style="margin-right:5px;" class="btn btn-sm btn-purple pull-right">Pay Due Salary</a>
                                </br>
                            </div>

                            <div class="panel-body" style="margin-left:50px; margin-right:50px;">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                    <th>Salary</th>
                                                    <th>Address</th>
                                                    {{-- <th>Month</th>
                                                    <th>Advanced</th> --}}
                                                    <th>Action</th>
                                                </tr>
                                            </thead>                       
                                     
                                            <tbody>
                                                @foreach($employee as $row)
                                                <tr>
                                                    <td>
                                                        <img src="{{ $row->photo }}" style="height:60px; width:60px;">
                                                    </td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->phone }}</td>
                                                    <td>{{ $row->salary }}</td>
                                                    <td>{{ $row->address}}</td>
                                                    {{-- <td><span class="badge badge-success"> {{ date("F", strtotime('-1 months')) }} </span></td>
                                                    <td> {{ $row->advanced_salary }}</td> --}}
                                                    <td>
                                                        <a href="{{ URL::to('pay-monthly-salary/'.$row->id) }}" class="btn btn-sn btn-primary" id="salary">Pay Now</a>
                                                    </td>
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