<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Salary;

class SalaryController extends Controller
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


    public function PaySalary()
    {
        $employee=DB::table('employees')->get();

        return view('pay_salary', compact('employee'));
    }


    public function PayMonthlySalary(Request $request, $id)
    {
         $month=$request->month;
         $employee = DB::table('employees')
            ->where('id',$id)->first();

        // echo "<pre>";
        // print_r($attendance);
        // exit();

        return view('pay_monthly_salary', compact('employee','month'));
    }


    public function InsertSalary(Request $request, $id)
    {
        $month=$request->month;
        $employee_id=$request->id;

        $salary=DB::table('salaries')
            ->where('salary_month',$month)
            ->where('employee_id',$id)
            ->first();

        if($salary == NULL){
            $data=array();
            $data['employee_id']=$request->id;
            $data['date']=date('Y-m-d');
            $data['salary_month']=$request->month;
            $data['monthly_salary']=$request->monthly_salary;
            $data['advanced_salary']=$request->advanced;
            $data['paid_salary']=$request->paid_salary;
            $data['due_salary']=($request->monthly_salary) - ($request->advanced + $request->paid_salary) ;

            $salary=DB::table('salaries')->insert($data);
            if ($salary){
                $notification=array(
                'message'=>'Successfully Salary Paid',
                'alert-type'=>'success');
                
                return Redirect()->route('all.salary')->with($notification);
            }
            else{
                $notification=array(
                'message'=>'error',
                'alert-type'=>'error');

                return Redirect()->back()->with($notification);
            }
        }
        else{
            $notification=array(
            'message'=>'Oopps !! Already Salary Paid in this Month',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }    
    }


    public function EditSalary($id)
    {
        $salary=DB::table('salaries')
            ->join('employees','salaries.employee_id','employees.id')
            ->select('salaries.*','employees.name')
            ->where('salaries.id',$id)->first();

        return view('edit_salary', compact('salary'));
    }

    public function UpdateSalary(Request $request, $id)
    {
        $salary=DB::table('salaries')->where('id',$id)->first();

        $monthly_salary=$salary->monthly_salary;
        $advanced_salary=$salary->advanced_salary;

        $data=array();
        $data['paid_salary']=$request->paid_salary;
        $data['due_salary']=($monthly_salary) - ($advanced_salary + $request->paid_salary) ;


       $salary=DB::table('salaries')->where ('id',$id)->update($data);
        if ($salary){
            $notification=array(
            'message'=>'Salary Update Successfully',
            'alert-type'=>'success');

            return Redirect()->route('all.salary')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    }


    public function DeleteSalary($id)
    {
        $delete=DB::table('salaries')->where ('id',$id)->delete();
        if ($delete){
            $notification=array(
            'message'=>'Salary Delete Successfully',
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

    public function AllSalary()
    {
        $salary=DB::table('salaries')
            ->join('employees','salaries.employee_id','employees.id')
            ->select('salaries.*','employees.name','employees.salary','employees.photo')
            ->orderBy('id','DESC')
            ->get();

        // echo "<pre>";
        // print_r($salary);
        // exit();

        return view('all_salary', compact('salary'));
    }






     public function AllDueSalary()
    {
        $due=DB::table('salaries')
            ->join('employees','salaries.employee_id','employees.id')
            ->where('due_salary', 'NOT LIKE', '0')
            ->where('due_salary', 'NOT LIKE', '-%')
            ->select('salaries.*','employees.name','employees.salary','employees.photo')
            ->orderBy('id','DESC')
            ->get();

        return view('all_duesalary', compact('due'));
    }


    public function PayDueSalary(Request $request, $id)
    {
        $duesalary=DB::table('salaries')
            ->join('employees','salaries.employee_id','employees.id')
            ->select('salaries.*','employees.name')
            ->where('salaries.id',$id)->first();


        return view('pay_duesalary', compact('duesalary'));
    }


    public function UpdateDueSalary(Request $request, $id)
    {
        $salary=DB::table('salaries')->where('id',$id)->first();

        $paid_salary=$salary->paid_salary;
        $due_salary=$salary->due_salary;
        $paid_due=$request->paid_duesalary;


        $data=array();
        $data['paid_salary']=($paid_salary + $paid_due);
        $data['due_salary']=($due_salary - $paid_due);

        // echo "<pre>";
        // print_r($data);
        // exit();

       $salary=DB::table('salaries')->where ('id',$id)->update($data);
        if ($salary){
            $notification=array(
            'message'=>'Successfully Due Salary Paid',
            'alert-type'=>'success');

            return Redirect()->route('pay.duesalary')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    }






    public function AdvancedSalary()
    {
        return view('add_advanced_salary');
    }

    public function InsertAdvancedSalary(Request $request)
    {
        $month=$request->month;
        $emp_id=$request->emp_id;

        $advanced=DB::table('advance_salaries')
            ->where('month',$month)
            ->where('emp_id',$emp_id)
            ->first();

        if($advanced == NULL){
            $data=array();
            $data['emp_id']=$request->emp_id;
            $data['date']=date('Y-m-d');
            $data['month']=$request->month;
            $data['advanced_salary']=$request->advanced_salary;

            $advanced=DB::table('advance_salaries')->insert($data);
            if ($advanced){
                $notification=array(
                'message'=>'Successfully Advanced Paid',
                'alert-type'=>'success');
                
                return Redirect()->route('all.advancedsalary')->with($notification);
            }
            else{
                $notification=array(
                'message'=>'error',
                'alert-type'=>'error');

                return Redirect()->back()->with($notification);
            }
        }
        else{
            $notification=array(
            'message'=>'Oopps !! Already Advanced Paid in this Month',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }    
    }


    public function EditAdvancedSalary($id)
    {
        $advancedsalary=DB::table('advance_salaries')
            ->join('employees','advance_salaries.emp_id','employees.id')
            ->select('advance_salaries.*','employees.name')
            ->where('advance_salaries.id',$id)->first();

        return view('edit_advanced_salary', compact('advancedsalary'));
    }

    public function UpdateAdvancedSalary(Request $request, $id)
    {
        $data=array();
        $data['advanced_salary']=$request->advanced_salary;

       $advancedsalary=DB::table('advance_salaries')->where ('id',$id)->update($data);
        if ($advancedsalary){
            $notification=array(
            'message'=>'Advanced Update Successfully',
            'alert-type'=>'success');

            return Redirect()->route('all.advancedsalary')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }          
    }


    public function DeleteAdvancedSalary($id)
    {
        $delete=DB::table('advance_salaries')->where ('id',$id)->delete();
        if ($delete){
            $notification=array(
            'message'=>'Advanced Delete Successfully',
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


    public function AllAdvancedSalary()
    {
        $advancedsalary=DB::table('advance_salaries')
            ->join('employees','advance_salaries.emp_id','employees.id')
            ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
            ->orderBy('id','DESC')
            ->get();

        // echo "<pre>";
        // print_r($salary);
        // exit();

        return view('all_advanced_salary', compact('advancedsalary'));
    }


}
