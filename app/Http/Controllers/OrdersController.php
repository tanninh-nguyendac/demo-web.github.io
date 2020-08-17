<?php

namespace App\Http\Controllers;

use App\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index(){
        $orders = DB::table('orders')->orderByRaw('status asc')->paginate(10);
        //dd($orders);exit;
        return view('admin.Orders.orders',compact('orders'));
    }


    public function pendingRequest(){
        $orders = DB::table('orders')->where('status', 0)->paginate(10);
        //dd($orders);exit;
        return view('admin.Orders.orders',compact('orders'));
    }
    

    public function detail($id){
        $member = DB::table('orders')->where('orders.id', $id)->get();
        $order = DB::table('orders')->join('orders_detail','orders.id','=','orders_detail.order_id')->join('products','products.id','=','orders_detail.product_id')->where('orders.id', $id)->get();
        //dd($member);exit;
       
        return view('admin.Orders.order_detail',compact('member','order'));
    }

    public function updatestatus(Request $request){
        $orders = orders::where('id',$request->id)->first();
        if($orders->status == 1){
            $orders->status = 0;
        }else{
            $orders->status = 1;
        }
    	
    	$orders->update();
    }
    public function deleteOrder($id){
        orders::destroy($id);
        return back();
    }
}
