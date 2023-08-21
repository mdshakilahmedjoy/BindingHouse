<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoreController extends Controller
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

    public function AddCategory()
    {
        return view('add_category');
    }

    public function InsertCategory(Request $request)
    {
        $data=array();
        $data['cat_name']=$request->cat_name;
        $image = $request->file('photo');

        // echo "<pre>";
        // print_r($image);
        // exit();

        if ($image){
            $image_name = $data['cat_name'];
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/category/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $category=DB::table('categories')->insert($data);

                if ($category){
                    $notification=array(
                    'message'=>'Successfully Category Inserted',
                    'alert-type'=>'success');

                    return Redirect()->route('all.category')->with($notification);
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
    

    //all categories view
    public function AllCategory()
    {
        $category=DB::table('categories')->get();
        return view('all_category', compact('category'));
     }

     //categories delete
    public function DeleteCategory($id)
    {
        $delete=DB::table('categories')->where('id',$id)->first();

        $img=$delete->photo;
        unlink($img);
        $cat_delete=DB::table('categories')->where('id',$id)->delete();

        if ($cat_delete){
            $notification=array(
            'message'=>'Successfully Category Deleted',
            'alert-type'=>'success');

            return Redirect()->route('all.category')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
     }


     public function EditCategory($id)
    {
        $edit=DB::table('categories')->where('id',$id)->first();

        return view('edit_category', compact('edit'));

     }

     public function UpdateCategory(Request $request, $id)
    {
        $data=array();
        $data['cat_name']=$request->cat_name;
        $image = $request->photo;

        if ($image){
            $image_name = $data['cat_name'];
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/category/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $img=DB::table('categories')->where ('id',$id)->first();
                $image_path=$img->photo;
                //unlink($image_path);
                $data['photo']=$image_url;
                $category=DB::table('categories')->where ('id',$id)->update($data);

                if ($category){
                    $notification=array(
                    'message'=>'Category Update Successfully',
                    'alert-type'=>'success');

                    return Redirect()->route('all.category')->with($notification);
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
            $oldphoto=$request->old_photo;
            if($oldphoto){
                $data['photo']=$oldphoto;
                $category=DB::table('categories')->where ('id',$id)->update($data);
                if ($category){
                    $notification=array(
                    'message'=>'Category Update Successfully',
                    'alert-type'=>'success');

                    return Redirect()->route('all.category')->with($notification);
                }
                else{
                    return Redirect()->back();
                }
            }   
        }

     }

}
