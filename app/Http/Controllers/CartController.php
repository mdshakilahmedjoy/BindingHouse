<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller
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

    public function index(Request $request)
    {
        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;

        // echo "<pre>";
        // print_r($data);
        // exit();

        $add=Cart::add($data);
        if ($add){
            $notification=array(
            'message'=>'Successfully Product Added',
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

    public function CartUpdate(Request $request, $rowId)
    {
        $qty=$request->qty;
        $update=Cart::update($rowId, $qty);
        if ($update){
            $notification=array(
            'message'=>'Successfully Updated',
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

    public function CartRemove(Request $request, $rowId)
    {
        $remove=Cart::remove($rowId);
        if ($remove){
            $notification=array(
            'message'=>'Successfully Removed',
            'alert-type'=>'success');

            return Redirect()->back()->with($notification);
        }
        else{
            $notification=array(
            'message'=>'Delated',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
    }


    public function CreateInvoice(Request $request)
    {   
         $request->validate([
            'cln_id' => 'required',],
        [
            'cln_id.required' => 'Select a Client First !.'
        ]);

        $cln_id=$request->cln_id;
        $client=DB::table('clients')->where('id', $cln_id)->first();
        $contents=Cart::content();

        return view('create_invoice', compact('client', 'contents'));
    }


    public function InsertInvoice(Request $request)
    {   
        $data=array();
        $data['client_id']=$request->client_id;
        $data['order_date']=date('d-m-Y');
        $data['order_status']=$request->order_status;
        $data['total_products']=$request->total_products;
        $data['total']=$request->total;

        // echo "<pre>";
        // print_r($data);
        // exit();

        $order_id=DB::table('orders')->insertGetId($data);
        $contents=Cart::content();


        $orderdata=array();
        foreach($contents as $content){
            $orderdata['order_id']=$order_id;
            $orderdata['product_id']=$content->id;
            $orderdata['quantity']=$content->qty;
            $orderdata['unitcost']=$content->price;
            $orderdata['total']=$content->total;

           // echo "<pre>";
           // print_r($orderdata);
           // exit(); 

            $insert=DB::table('orderdetails')->insert($orderdata);
        }

        if ($insert){
            $notification=array(
            'message'=>'Successfully Invoice Created | Please Delever the Products and Accept Status.',
            'alert-type'=>'success');

            Cart::destroy();
            return Redirect()->route('pending.orders')->with($notification);
        }
        else{
            $notification=array(
            'message'=>'error',
            'alert-type'=>'error');

            return Redirect()->back()->with($notification);
        }
    }


}
