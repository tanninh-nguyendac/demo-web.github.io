<?php

namespace App\Http\Controllers;

use App\products;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cart;


class HomeController extends Controller
{
    public function index(Request $request){
        
       $products = DB::table('products') ->where('products.product_quantity','>','0')->paginate(9);
    $feature =  DB::table('products') ->where('products.product_quantity','<','0')->get();
    //  $feature = DB::table('products')
    //    ->select(DB::raw('products.id,products.product_name,products.product_description,products.product_image,products.product_price,count(*) as sl'))
    //    ->join('orders_detail', 'products.id', '=', 'orders_detail.product_id')
    //    ->where('products.product_quantity','>','0')
    //    ->groupBy('products.id')
    //    ->orderBy('sl','desc')
    //    ->get(6);

    //dd($feature);exit;
        $slide = true;
        $left_slide = true;
        return view ('home.home',compact('products','slide','left_slide','feature'));
    
    }


    public function naruto(){
        $products = DB::table('products')->where('cate_id', 1)->paginate(9);
        
         $slide = false;
         $left_slide = true;
         return view('home.shopping',compact('products','slide','left_slide'));
     
     }
     public function transformer(){
        $products = DB::table('products')->where('cate_id', 3)->paginate(9);
        
         $slide = false;
         $left_slide = true;
         return view('home.shopping',compact('products','slide','left_slide'));
     
     }
     public function marvel(){
        $products = DB::table('products')->where('cate_id', 2)->paginate(9);
        
         $slide = false;
         $left_slide = true;
         return view('home.shopping',compact('products','slide','left_slide'));
     
     }
     public function onepiece(){
        $products = DB::table('products')->where('cate_id', 4)->paginate(9);
        
         $slide = false;
         $left_slide = true;
         return view('home.shopping',compact('products','slide','left_slide'));
     
     }
     public function dccomics(){
        $products = DB::table('products')->where('cate_id', 5)->paginate(9);
        
         $slide = false;
         $left_slide = true;
         return view('home.shopping',compact('products','slide','left_slide'));
     
     }
     public function dragonball(){
        $products = DB::table('products')->where('cate_id', 6)->paginate(9);
        
         $slide = false;
         $left_slide = true;
         return view('home.shopping',compact('products','slide','left_slide'));
     
     }
    public function shopping(){
        $products = DB::table('products')->paginate(9);
        $slide = false;
        $left_slide = true;
        return view('home.shopping',compact('products','slide','left_slide'));
    }
    public function khuyenmai(){
        $products = DB::table('products')->paginate(9);
        $slide = false;
        $left_slide = true;
        return view('home.khuyenmai',compact('products','slide','left_slide'));
    }

    public function search(Request $request){
        $products = products::where('product_name', 'like','%'. $request->data.'%')->get();
        
        return json_encode($products); 
    }


}
