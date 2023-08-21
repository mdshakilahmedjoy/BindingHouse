<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpenseController extends Controller
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

    public function AddExpense()
    {
        return view('add_expense');
    }

    //all Expense add
    public function InsertExpense(Request $request)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        // echo "<pre>";
        // print_r($data);
        // exit();

        $expense=DB::table('expenses')->insert($data);
        if ($expense){
            $notification=array(
            'message'=>'Successfully Expense Inserted',
            'alert-type'=>'success');

            return Redirect()->route('add.expense')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
    }

     public function DeleteExpense($id)
    {
        $delete=DB::table('expenses')->where ('id',$id)->delete();
        if ($delete){
            $notification=array(
            'message'=>'Expense Delete Successfully',
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


    //Today Expense are here
    public function ViewTodayExpense(Request $request)
    {
        $data=$request->searchdate;

        if($data){
            $today=DB::table('expenses')->where('date',$data)->get();

            $salary=DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('salaries.*','employees.name')
                ->where('date',"$data")->get();

            $advanced =DB::table('advance_salaries')
                ->join('employees','advance_salaries.emp_id','employees.id')
                ->select('advance_salaries.*','employees.name')
                ->where('date',"$data")->get();
            }
        else{
            $data=date('Y-m-d');
            $today=DB::table('expenses')->where('date',"$data")->get();

            $salary=DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('salaries.*','employees.name')
                ->where('date',"$data")->get();

            $advanced =DB::table('advance_salaries')
                ->join('employees','advance_salaries.emp_id','employees.id')
                ->select('advance_salaries.*','employees.name')
                ->where('date',"$data")->get();
        }
        
        return view('view_today_expense', compact('today','salary','advanced','data'));
    }


    public function EditTodayExpense($id)
    {
        $today=DB::table('expenses')->where('id',$id)->first();

        return view('edit_today_expense', compact('today'));
    }

    public function UpdateTodayExpense(Request $request, $id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;

       $today=DB::table('expenses')->where ('id',$id)->update($data);
        if ($today){
            $notification=array(
            'message'=>'Expense Update Successfully',
            'alert-type'=>'success');

            return Redirect()->route('today.expense')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    } 

    public function DeleteTodayExpense($id)
    {
        $today=DB::table('expenses')->where ('id',$id)->delete();
        if ($today){
            $notification=array(
            'message'=>'Expense Delete Successfully',
            'alert-type'=>'success');

            return Redirect()->route('today.expense')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
    }



    //Monthly Expense are here
    public function ViewMonthlyExpense(Request $request)
    {   
        $data=$request->searchdate;

        if($data){
            $monthly=DB::table('expenses')->where('date','Like',"%$data%")->get();

            $salary=DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('salaries.*','employees.name')
                ->where('date','Like',"%$data%")->get();

            $advanced =DB::table('advance_salaries')
                ->join('employees','advance_salaries.emp_id','employees.id')
                ->select('advance_salaries.*','employees.name')
                ->where('date','Like',"%$data%")->get();
            }
        else{
            $data=date('Y-m');
            $monthly=DB::table('expenses')->where('date','Like',"%$data%")->get();

            $salary=DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('salaries.*','employees.name')
                ->where('date','Like',"%$data%")->get();

            $advanced =DB::table('advance_salaries')
                ->join('employees','advance_salaries.emp_id','employees.id')
                ->select('advance_salaries.*','employees.name')
                ->where('date','Like',"%$data%")->get();
        }
        
        return view('view_monthly_expense', compact('monthly','salary','advanced','data'));
    }

    public function EditMonthlyExpense($id)
    {
        $monthly=DB::table('expenses')->where('id',$id)->first();

        return view('edit_monthly_expense', compact('monthly'));
    }

    public function UpdateMonthlyExpense(Request $request, $id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;

       $monthly=DB::table('expenses')->where ('id',$id)->update($data);
        if ($monthly){
            $notification=array(
            'message'=>'Expense Update Successfully',
            'alert-type'=>'success');

            return Redirect()->route('monthly.expense')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    } 

    public function DeleteMonthlyExpense($id)
    {
        $monthly=DB::table('expenses')->where ('id',$id)->delete();
        if ($monthly){
            $notification=array(
            'message'=>'Expense Delete Successfully',
            'alert-type'=>'success');

            return Redirect()->route('monthly.expense')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
    }



    //Yearly Expense are here
    public function ViewYearlyExpense(Request $request)
    {   
        $data=$request->searchdate;

         if($data){
            $yearly=DB::table('expenses')->where('date','Like',"%$data%")->get();

            $salary=DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('salaries.*','employees.name')
                ->where('date','Like',"%$data%")->get();

            $advanced =DB::table('advance_salaries')
                ->join('employees','advance_salaries.emp_id','employees.id')
                ->select('advance_salaries.*','employees.name')
                ->where('date','Like',"%$data%")->get();
            }
        else{
            $data=date('Y');
            $yearly=DB::table('expenses')->where('date','Like',"%$data%")->get();

            $salary=DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('salaries.*','employees.name')
                ->where('date','Like',"%$data%")->get();

            $advanced =DB::table('advance_salaries')
                ->join('employees','advance_salaries.emp_id','employees.id')
                ->select('advance_salaries.*','employees.name')
                ->where('date','Like',"%$data%")->get();
        }
        
        return view('view_yearly_expense', compact('yearly','salary','advanced','data'));
    }

    public function EditYearlyExpense($id)
    {
        $yearly=DB::table('expenses')->where('id',$id)->first();

        return view('edit_yearly_expense', compact('yearly'));
    }

    public function UpdateYearlyExpense(Request $request, $id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;

       $yearly=DB::table('expenses')->where ('id',$id)->update($data);
        if ($yearly){
            $notification=array(
            'message'=>'Expense Update Successfully',
            'alert-type'=>'success');

            return Redirect()->route('yearly.expense')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    } 

    public function DeleteYearlyExpense($id)
    {
        $yearly=DB::table('expenses')->where ('id',$id)->delete();
        if ($yearly){
            $notification=array(
            'message'=>'Expense Delete Successfully',
            'alert-type'=>'success');

            return Redirect()->route('yearly.expense')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
    }


    //All Expense are here
    public function AllExpense()
    {
        $expense=DB::table('expenses')->get();

        $salary=DB::table('salaries')
            ->join('employees','salaries.employee_id','employees.id')
            ->select('salaries.*','employees.name')->get();

        $advanced =DB::table('advance_salaries')
            ->join('employees','advance_salaries.emp_id','employees.id')
            ->select('advance_salaries.*','employees.name')->get();

        
        return view('view_all_expense', compact('expense','salary','advanced'));
    }

    public function EditAllExpense($id)
    {
        $edit=DB::table('expenses')->where('id',$id)->first();

        return view('edit_all_expense', compact('edit'));
    }


    public function UpdateAllExpense(Request $request, $id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;

       $update=DB::table('expenses')->where ('id',$id)->update($data);
        if ($update){
            $notification=array(
            'message'=>'Expense Update Successfully',
            'alert-type'=>'success');

            return Redirect()->route('all.expense')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    } 

    public function DeleteAllExpense($id)
    {
        $delete=DB::table('expenses')->where ('id',$id)->delete();
        if ($delete){
            $notification=array(
            'message'=>'Expense Delete Successfully',
            'alert-type'=>'success');

            return Redirect()->route('all.expense')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
    }

}
