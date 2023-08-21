<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class InvestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddInvest()
    {
        return view('add_invest');
    }

    //all Invest add
    public function InsertInvest(Request $request)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        
        // echo "<pre";
        // print_r($data);
        // exit();

        $invest=DB::table('invests')->insert($data);
        if ($invest){
            $notification=array(
            'message'=>'Successfully Invest Inserted',
            'alert-type'=>'success');

            return Redirect()->route('add.invest')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
    }

    public function DeleteInvest($id)
    {
        $delete=DB::table('invests')->where ('id',$id)->delete();
        if ($delete){
            $notification=array(
            'message'=>'Invest Delete Successfully',
            'alert-type'=>'success');

            return Redirect()->back()->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
    }

    //Today Invest are here
    public function ViewTodayInvest(Request $request)
    {
        $data=$request->searchdate;

        if($data){
            $today=DB::table('invests')->where('date',$data)->get();
        }
        else{
            $data=date('y-m-d');
            $today=DB::table('invests')->where('date','Like',"%$data%")->get();
        }
        
        return view('view_today_invest', compact('today','data'));
    }


    public function EditTodayInvest($id)
    {
        $today=DB::table('invests')->where('id',$id)->first();

        return view('edit_today_invest', compact('today'));
    }

    public function UpdateTodayInvest(Request $request, $id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;

       $today=DB::table('invests')->where ('id',$id)->update($data);
        if ($today){
            $notification=array(
            'message'=>'Invest Update Successfully',
            'alert-type'=>'success');

            return Redirect()->route('today.invest')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    } 


    //Monthly Invest are here
    public function ViewMonthlyInvest(Request $request)
    {   
        $data=$request->searchdate;

        if($data){
            $monthly=DB::table('invests')->where('date','Like',"%$data%")->get();
        }
        else{
            $data=date('y-m');
            $monthly=DB::table('invests')->where('date','Like',"%$data%")->get();
        }
        
        return view('view_monthly_invest', compact('monthly','data'));
    }

    public function EditMonthlyInvest($id)
    {
        $monthly=DB::table('invests')->where('id',$id)->first();

        return view('edit_monthly_invest', compact('monthly'));
    }

    public function UpdateMonthlyInvest(Request $request, $id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;

       $monthly=DB::table('invests')->where ('id',$id)->update($data);
        if ($monthly){
            $notification=array(
            'message'=>'Invest Update Successfully',
            'alert-type'=>'success');

            return Redirect()->route('monthly.invest')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    } 




    //Yearly Invest are here
    public function ViewYearlyInvest(Request $request)
    {   
        $data=$request->searchdate;

        if($data){
            $yearly=DB::table('invests')->where('date','Like',"%$data%")->get();
        }
        else{
            $data=date('y');
            $yearly=DB::table('invests')->where('date','Like',"%$data%")->get();
        }
        
        return view('view_yearly_invest', compact('yearly','data'));
    }

    public function EditYearlyInvest($id)
    {
        $yearly=DB::table('invests')->where('id',$id)->first();

        return view('edit_yearly_invest', compact('yearly'));
    }

    public function UpdateYearlyInvest(Request $request, $id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;

       $yearly=DB::table('invests')->where ('id',$id)->update($data);
        if ($yearly){
            $notification=array(
            'message'=>'Invest Update Successfully',
            'alert-type'=>'success');

            return Redirect()->route('yearly.invest')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    } 


    //All Invest are here
    public function AllInvest()
    {
        $invest=DB::table('invests')->get();

        return view('view_all_invest', compact('invest'));
    }


     public function EditAllInvest($id)
    {
        $edit=DB::table('invests')->where('id',$id)->first();

        return view('edit_all_invest', compact('edit'));
    }

    public function UpdateAllInvest(Request $request, $id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;

       $update=DB::table('invests')->where ('id',$id)->update($data);
        if ($update){
            $notification=array(
            'message'=>'Invest Update Successfully',
            'alert-type'=>'success');

            return Redirect()->route('all.invest')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    } 


}
