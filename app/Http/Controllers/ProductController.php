<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
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

    public function AddProduct()
    {
        return view('add_product');
    }

    //all Product add
    public function InsertProduct(Request $request)
    {
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['cat_id']=$request->cat_id;
        $data['product_size']=$request->product_size;
        $data['binding_cost']=$request->binding_cost;
        $data['godaun_number']=$request->godaun_number;
        $data['route_number']=$request->route_number;
        $image = $request->file('product_image');

        // echo "<pre";
        // print_r($data);
        // exit();

        if ($image){
            $image_name = $data['product_name'];
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;
                $product=DB::table('products')
                ->insert($data);

                if ($product){
                    $notification=array(
                    'message'=>'Successfully Product Inserted',
                    'alert-type'=>'success');

                    return Redirect()->route('all.product')->with($notification);
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

    //all Product view
    public function AllProduct()
    {
        $allProduct=DB::table('products')->get();
        return view('all_product', compact('allProduct'));
        
    }

    //view a sigle Product 
    public function ViewProduct($id)
    {
        $viewProduct=DB::table('products')
            ->join('categories', 'products.cat_id','categories.id')
            ->select('categories.cat_name','products.*')
            ->where('products.id',$id)
            ->first();

        //echo "<pre";
        //print_r($single);
        //exit();
        return view('view_product', compact('viewProduct'));
    }

    public function DeleteProduct($id)
    {
        $delete=DB::table('products')
            ->where('id',$id)
            ->first();

        $img=$delete->product_image;
        unlink($img);
        $dltProduct=DB::table('products')
            ->where('id',$id)
            ->delete();

        if ($dltProduct){
            $notification=array(
            'message'=>'Successfully Product Deleted',
            'alert-type'=>'success');

            return Redirect()->route('all.product')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }

    }

    public function EditProduct($id)
    {
        $edit=DB::table('products')->where('id',$id)->first();

        return view('edit_product', compact('edit'));
    }

    public function UpdateProduct(Request $request, $id)
    {

        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['cat_id']=$request->cat_id;
        $data['product_size']=$request->product_size;
        $data['binding_cost']=$request->binding_cost;
        $data['godaun_number']=$request->godaun_number;
        $data['route_number']=$request->route_number;
        $image = $request->product_image;

        if ($image){
            $image_name = $data['product_name'];
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $img=DB::table('products')->where ('id',$id)->first();
                $image_path=$img->product_image;
                //unlink($image_path);
                $data['product_image']=$image_url;
                $update=DB::table('products')->where ('id',$id)->update($data);

                if ($update){
                    $notification=array(
                    'message'=>'Product Update Successfully',
                    'alert-type'=>'success');

                    return Redirect()->route('all.product')->with($notification);
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
                $data['product_image']=$oldphoto;
                $update=DB::table('products')->where ('id',$id)->update($data);
                if ($update){
                    $notification=array(
                    'message'=>'Product Update Successfully',
                    'alert-type'=>'success');

                    return Redirect()->route('all.product')->with($notification);
                }
                else{
                    return Redirect()->back();
                }
            }   
        }
    }
}
