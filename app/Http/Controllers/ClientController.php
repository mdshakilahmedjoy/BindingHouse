<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Customer;
class ClientController extends Controller
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
        return view('add_client');
    }

    //all Customer add
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'phone' => 'required|max:14',
            'address' => 'required',
            'photo' => 'required',
            'city' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['branch_name']=$request->branch_name;
        $data['city']=$request->city;
        $image = $request->file('photo');

        // echo "<pre>";
        // print_r($image);
        // exit();

        if ($image){
            $image_name = $data['name'];
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/client/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $client=DB::table('clients')
                ->insert($data);

                if ($client){
                    $notification=array(
                    'message'=>'Successfully Client Inserted',
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
            else{
                return Redirect()->back();
            }
        }
        else{
            return Redirect()->back();
        }
    }

    //all client view
    public function AllClient()
    {
        $allClient=DB::table('clients')->get();
        return view('all_client', compact('allClient'));
    }

    //view a sigle Customer 
    public function ViewClient($id)
    {
        $single=DB::table('clients')
            ->where('id',$id)
            ->first();

        //echo "<pre";
        //print_r($single);
        //exit();
        return view('view_client', compact('single'));
    }

    public function DeleteClient($id)
    {
        $delete=DB::table('clients')
            ->where('id',$id)
            ->first();

        $img=$delete->photo;
        unlink($img);
        $dltuser=DB::table('clients')
            ->where('id',$id)
            ->delete();

        if ($dltuser){
            $notification=array(
            'message'=>'Successfully Client Deleted',
            'alert-type'=>'success');

            return Redirect()->route('all.client')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'success');

            return Redirect()->back()->with($notification);
        }

    }

    public function EditClient($id)
    {
        $edit=DB::table('clients')
            ->where('id',$id)
            ->first();

        return view('edit_client', compact('edit'));
    }

    public function UpdateClient(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:14',
            'address' => 'required',
            'city' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['branch_name']=$request->branch_name;
        $data['city']=$request->city;
        $image = $request->photo;

        if ($image){
            $image_name = $data['name'];
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/client/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $img=DB::table('clients')->where ('id',$id)->first();
                $image_path=$img->photo;
                //unlink($image_path);
                $data['photo']=$image_url;
                $user=DB::table('clients')->where ('id',$id)->update($data);

                if ($user){
                    $notification=array(
                    'message'=>'Client Update Successfully',
                    'alert-type'=>'success');

                    return Redirect()->route('all.client')->with($notification);
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
            $oldphoto=$request->old_photo;
            if($oldphoto){
                $data['photo']=$oldphoto;
                $user=DB::table('clients')->where ('id',$id)->update($data);
                if ($user){
                    $notification=array(
                    'message'=>'Client Update Successfully',
                    'alert-type'=>'success');

                    return Redirect()->route('all.client')->with($notification);
                }
                else{
                    return Redirect()->back();
                }
            }   
        }
    }

    
}
