<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\categories;
use Illuminate\Support\Facades\Auth;
use App\orders;
use App\products;
use App\members;



class Admincontroller extends Controller
{
    public function getIndex(){
       
        if (Auth::check()&&Auth::user()->role == 1) {
        $pending = DB::table('orders')->where('orders.status','0')->count();
        $products = DB::table('products')->count();
        $total = DB::table('orders')->sum('total');
        
            //$user = Auth::user();
            return view('admin.dashboard',compact('pending','products','total'));
          } else {
            return redirect()->route('login');  
          }
        
    }
    public function thanhvien(){
     // $feature = DB::table('products')
      //    ->select(DB::raw('products.id,products.product_name,products.product_description,products.product_image,products.product_price,count(*) as sl'))
      //    ->join('orders_detail', 'products.id', '=', 'orders_detail.product_id')
      //    ->where('products.product_quantity','>','0')
      //    ->groupBy('products.id')
      //    ->orderBy('sl','desc')
      //    ->get(6);
  
      $members = DB::table('members')->join('users','members.id','=','users.member_id')->paginate(10);
      //dd($members);exit;
     // dd($members);exit;
     return view('admin.users.thanhvien',compact('members'));
  }
  public function thongke(){
    $orders = DB::table('orders')->orderByRaw('status asc')->paginate(10);

    return view('admin.Orders.thongke',compact('orders'));
  }
    
}
