<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Employee;
class EmployeeController extends Controller
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

    public function index()
    {
        return view('add_employee');
    }
    
    //all employee add
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'phone' => 'required|max:14',
            'address' => 'required',
            'experience' => 'required',
            'photo' => 'required',
            'nid_no' => 'required|unique:employees|max:21',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image = $request->file('photo');

        if ($image){
            $image_name = $data['name'];
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                ->insert($data);

                if ($employee){
                    $notification=array(
                    'message'=>'Successfully Employee Inserted',
                    'alert-type'=>'success');

                    return Redirect()->route('all.employee')->with($notification);
                }
                else{
                    $notification=array(
                    'message'=>'error',
                    'alert-type'=>'success');

                    return Redirect()->back()->with($notification);
                }
            }
            else{
                return Redirect()->back();
            }
        }
        else{
            return Redirect()->back();
        }
    }

    //all employee view
    public function AllEmployee()
    {
        $allEmployee=Employee::all();
        //$employees=DB::table('employees')->get();
        return view('all_employee', compact('allEmployee'));
    }

    //view a sigle employee 
    public function ViewEmployee($id)
    {
        $single=DB::table('employees')
            ->where('id',$id)
            ->first();

        //echo "<pre";
        //print_r($single);
        //exit();
        return view('view_employee', compact('single'));
    }

    public function DeleteEmployee($id)
    {
        $delete=DB::table('employees')
            ->where('id',$id)
            ->first();

        $img=$delete->photo;
        unlink($img);
        $dltuser=DB::table('employees')
            ->where('id',$id)
            ->delete();

        if ($dltuser){
            $notification=array(
            'message'=>'Successfully Employee Deleted',
            'alert-type'=>'success');

            return Redirect()->route('all.employee')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'success');

            return Redirect()->back()->with($notification);
        }

    }

    public function EditEmployee($id)
    {
        $edit=DB::table('employees')
            ->where('id',$id)
            ->first();

        return view('edit_employee', compact('edit'));
    }

    public function UpdateEmployee(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:14',
            'address' => 'required',
            'experience' => 'required',
            'nid_no' => 'required|max:21',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image = $request->photo;

        if ($image){
            $image_name = $data['name'];
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $img=DB::table('employees')->where ('id',$id)->first();
                $image_path=$img->photo;
                //unlink($image_path);
                $data['photo']=$image_url;
                $user=DB::table('employees')->where ('id',$id)->update($data);

                if ($user){
                    $notification=array(
                    'message'=>'Employee Update Successfully',
                    'alert-type'=>'success');

                    return Redirect()->route('all.employee')->with($notification);
                }
                else{
                    $notification=array(
                    'message'=>'error1',
                    'alert-type'=>'success');

                    return Redirect()->back()->with($notification);
                }
            }
            else{
                return Redirect()->back();
            }
        }
        else{
            $oldphoto=$request->old_photo;
            if($oldphoto){
                $data['photo']=$oldphoto;
                $user=DB::table('employees')->where ('id',$id)->update($data);
                if ($user){
                    $notification=array(
                    'message'=>'Employee Update Successfully',
                    'alert-type'=>'success');

                    return Redirect()->route('all.employee')->with($notification);
                }
                else{
                    return Redirect()->back();
                }
            }   
        }
    }


}


