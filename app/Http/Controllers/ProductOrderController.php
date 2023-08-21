<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductOrderController extends Controller
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
        $product=DB::table('products')
        ->join('categories', 'products.cat_id', 'categories.id')
        ->select('categories.cat_name', 'products.*')->get();
        
        $client=DB::table('clients')->get();

        $category=DB::table('categories')->get();

        return view('add_order', compact('product', 'client','category'));
    }

    public function PendingOrders(){
        $pending=DB::table('orders')
            ->join('clients','orders.client_id','clients.id')
            ->select('clients.name','orders.*')
            ->where('order_status', 'pending')->get();

        return view('pending_orders', compact('pending'));

    }

    public function ViewPendingOrders($id){
        $order=DB::table('orders')
            ->join('clients','orders.client_id','clients.id')
            ->select('clients.*','orders.*', 'orders.id as order_id')
            ->where('orders.id',$id)->first();

        $order_details=DB::table('orderdetails')
            ->join('products','orderdetails.product_id','products.id')
            ->select('orderdetails.*','products.product_name', 'products.product_code')
            ->where('order_id',$id)->get();

        return view('view_pending_order', compact('order','order_details'));
    }


    public function CancelOrder($id)
    {
        $order=DB::table('orders')->where('id',$id)->delete();
        $order_details=DB::table('orderdetails')->where('order_id',$id)->delete();

        if ($order AND $order_details){
            $notification=array(
            'message'=>'Successfully Order Cancel',
            'alert-type'=>'error');

            return Redirect()->route('pending.orders')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
     }


    public function OrderDone(Request $request, $id){

        $data=array();
        $data['order_status']='success';
        $data['payment_status']=$request->payment_status;
        $data['delivery_date']=date('d-m-Y');
        $data['pay']=$request->pay;
        $data['due']=$request->due;

        // echo "<pre>";
        // print_r($data);
        // exit();

        $update=DB::table('orders')->where('orders.id',$id)->update($data);

        if ($update){
            $notification=array(
            'message'=>'Successfully Order Confirmed ! And All Products Delevered.',
            'alert-type'=>'success');

            return Redirect()->route('pending.orders')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
    }



    public function SuccessOrders(){
        $success=DB::table('orders')
            ->join('clients','orders.client_id','clients.id')
            ->select('clients.name','orders.*')
            ->where('order_status', 'success')->get();

        return view('success_orders', compact('success'));

    }

     public function ViewSuccessOrders($id){
        $order=DB::table('orders')
            ->join('clients','orders.client_id','clients.id')
            ->select('clients.*','orders.*', 'orders.id as order_id')
            ->where('orders.id',$id)->first();

        $order_details=DB::table('orderdetails')
            ->join('products','orderdetails.product_id','products.id')
            ->select('orderdetails.*','products.product_name', 'products.product_code')
            ->where('order_id',$id)->get();

        return view('view_success_order', compact('order','order_details'));
    }

}
