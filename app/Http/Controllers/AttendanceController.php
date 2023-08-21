<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Attendance;
class AttendanceController extends Controller
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

    public function TakeAttendance()
    {
        $employee=DB::table('employees')->get();
        return view('take_attendance', compact('employee'));
    }

    //Insert Attendance
    public function InsertAttendance(Request $request)
    {
        $date=$request->att_date;
        $att_date=DB::table('attendances')->where('att_date',$date)->first();

        if($att_date){
            $notification=array(
                'message'=>'Today Attendence Already Taken',
                'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }

        else{
            foreach ($request->user_id as $id){
                $data[]=[
                    "user_id"=>$id,
                    "attendance"=>$request->attendance[$id],
                    "att_date"=>$request->att_date
                ];
            }
            $att=DB::table('attendances')->insert($data);
            if ($att){
                $notification=array(
                'message'=>'Successfully Attendence Taken',
                'alert-type'=>'success');

                return Redirect()->route('all.attendance')->with($notification);
            }
            else{
                $notification=array(
                'message'=>'error',
                'alert-type'=>'error');

                return Redirect()->back()->with($notification);
            }
        }        
    }

    public function AllAttendance()
    {
        $all_att=DB::table('attendances')->select('att_date')->groupBy('att_date')->get();
        return view('all_attendance', compact('all_att'));
        
    }


    public function EditAttendance($att_date)
    {
        $date=DB::table('attendances') ->where('att_date',$att_date)->first();

        $data=DB::table('attendances')
            ->join('employees', 'attendances.user_id','employees.id')
            ->select('employees.name','employees.photo','attendances.*')
            ->where('att_date',$att_date)->get();

        return view('edit_attendance', compact('data','date'));

    }


    //Update Attendance
    public function UpdateAttendance(Request $request)
    {

        foreach ($request->id as $id){
            $data[]=[
                "attendance"=>$request->attendance[$id],
                "att_date" =>$request->att_date
            ];
        }

        // echo "<pre>";
        // print_r($data);
        // exit();

        $att_update=Attendance::where(['att_date' =>$request->att_date, 'id'=>$id])->first();
        $att_update->update($data);


        if ($att_update){
            $notification=array(
            'message'=>'Successfully Attendence Updated',
            'alert-type'=>'success');

            return Redirect()->route('all.attendance')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }        
    }




    public function ViewAttendance($att_date)
    {
        $date=DB::table('attendances') ->where('att_date',$att_date)->first();

        $data=DB::table('attendances')
            ->join('employees', 'attendances.user_id','employees.id')
            ->select('employees.name','employees.photo','attendances.*')
            ->where('att_date',$att_date)->get();

        return view('view_attendance', compact('date','data'));

    }

    public function DeleteAttendance($att_date)
    {
        $att_delete=DB::table('attendances') ->where('att_date',$att_date)->delete();
        if ($att_delete){
            $notification=array(
            'message'=>'Successfully Attendence Deleted',
            'alert-type'=>'success');

            return Redirect()->route('all.attendance')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
     }


}
