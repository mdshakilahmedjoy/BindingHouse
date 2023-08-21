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
                    $yearly_invest = DB::table('invests')->where('date','Like', "%$data%")->sum('amount');
                @endphp

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding-left:50px;">
                                <h3 class="panel-title">Yearly Invest ({{ $data }})</h3>
                            </div>
                            
                            <div>
                                <h3 style="color: red; font-size: 22px;" align="center" >Total Invest : {{$yearly_invest}} Taka. </h3><br>

                                <form role="form" action="{{ url('/yearly-invest')}}" method="post">
                                @csrf 
                                    <h4 class="text-success" align="center">
                                        <div class="form-group" style="margin-left: 100px;">
                                            <input type="text" name="searchdate" style="width:80px;" required> 

                                            <button type="submit" class="btn btn-info waves-effect waves-light">Search</button>

                                            <a href="{{ route('add.invest') }}" class="btn btn-sm btn-success pull-right" style="margin-right: 100px;">Add Invest</a>
                                        </div>
                                    </h4>
                                </form>
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
                                                @foreach($yearly as $row)
                                                <tr>
                                                    <td>{{ $row->date }}</td>
                                                    <td>{{ $row->details }}</td>
                                                    <td>{{ $row->amount }}</td>

                                                    <td>
                                                        <a href="{{ URL::to('/edit-yearly-invest/'.$row->id) }}" class="btn btn-sn btn-info" id="edit">Edit</a>

                                                        <a href="{{ URL::to('/delete-invest/'.$row->id) }}" class="btn btn-sn btn-danger" id="delete">Delete</a>
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