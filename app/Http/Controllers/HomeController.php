<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function ViewProfile()
    {
        $profile=DB::table('profile')->first();

        return view('view_profile', compact('profile'));
    }

    public function UpdateProfile(Request $request)
    {

        $data=array();
        $data['owner_name']=$request->owner_name;
        $data['company_name']=$request->company_name;
        $data['email_address']=$request->email_address;
        $data['phone_number']=$request->phone_number;
        $data['address']=$request->address;
        $logo = $request->company_logo;

        if ($logo){
            $image_name = $data['company_name'];
            $ext=strtolower($logo->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/profile/';
            $image_url=$upload_path.$image_full_name;
            $success=$logo->move($upload_path,$image_full_name);
            if($success){
                $img=DB::table('profile')->where ('id','1')->first();
                $image_path=$img->company_logo;
                //unlink($image_path);
                $data['company_logo']=$image_url;
                $user=DB::table('profile')->where ('id','1')->update($data);

                if ($user){
                    $notification=array(
                    'message'=>'Profile Update Successfully',
                    'alert-type'=>'success');

                    return Redirect()->route('profile')->with($notification);
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
            $oldphoto=$request->old_logo;
            if($oldphoto){
                $data['company_logo']=$oldphoto;
                $user=DB::table('profile')->where ('id','1')->update($data);
                if ($user){
                    $notification=array(
                    'message'=>'Profile Update Successfully',
                    'alert-type'=>'success');

                    return Redirect()->route('profile')->with($notification);
                }
                else{
                    return Redirect()->back();
                }
            }   
        }
    }


}
