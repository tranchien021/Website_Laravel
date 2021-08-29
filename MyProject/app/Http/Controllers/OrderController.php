<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('order')
        ->join('customer','order.customer_id','=','customer.customer_id')
        ->select('order.*','customer.customer_name')
        ->orderBy('order.order_id','DESC')->get();
   
      
        return view('admin.order.manage_order',compact('data'));
    }

    public function view_order($id){

        $data=DB::table('order')
        ->join('customer','order.customer_id','=','customer.customer_id')
        ->join('shipping','order.shipping_id','=','shipping.shipping_id')
        ->join('order_detail','order.order_id','=','order_detail.order_detail_id')
        ->select('order.*','customer.*','shipping.*','order_detail.*')->first();
       
      
        
      
        return view('admin.order.view_order',compact('data'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
