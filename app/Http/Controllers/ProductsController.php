<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\products;
use App\categories;
use PhpParser\Node\Expr\FuncCall;


class ProductsController extends Controller
{
    //
    public function getProducts(){
       
        $products = DB::table('products')->join('categories','products.cate_id','=','categories.id')->select('products.*', 'categories.category_name')->paginate(9);

        return view('admin.Products.products',compact('products'));
    }

    public function addProducts (){
        $categories = DB::table('categories')->get();
        
        return view ('admin.Products.addProducts', compact('categories'));
    }
    public function getSearch(Request $request){
        dd($request);exit;
        $result = $request->result;   
        $keyword=$result;
        $result =str_replace(' ','%',$result);
        $products = products::where('product_name','like','%'.$result.'%')->get();
        
        return view('admin.products.products',compact('products','keyword'));

    }
    public function search(Request $request){
        $products = products::where('product_name', 'like','%'. $request->data.'%')->get();
        
        return json_encode($products); 
    }

    public function insertProducts(Request $request){
       
        $file = $request->file;
        $product = new products;
    	$product->cate_id = $request->categories;
        $product->product_name = $request->productname;
        $product->product_description = $request->productdes;
        $product->product_image = $file->getClientOriginalName();
        $product->product_price = $request->productprice;
        $product->product_quantity = $request->productquantity;

        $file->move('upload', $file->getClientOriginalName());
    	$product->save();
        
        return redirect()->route('products');
    }

    public function updateProduct($id){
        $products = products::where('id',$id)->first();
       
        $categories = DB::table('categories')->get();
         //dd($products);exit;
       
        return view('admin.Products.editProducts',compact('products','categories'));

        
    }

    public function postupdateProduct(Request $request){
        //dd($request->id);exit;
        $products = products::where('id',$request->id)->first();

         $file = $request->file;
         //dd($file );exit;
            if($file){
                $file->move('upload', $file->getClientOriginalName());
                $products->cate_id = $request->categories;
                $products->product_name = $request->productname;
                $products->product_description = $request->productdes;
                $products->product_image = $file->getClientOriginalName();
                $products->product_price = $request->productprice;
                $products->product_quantity = $request->productquantity;
            }else{
                $products->cate_id = $request->categories;
                $products->product_name = $request->productname;
                $products->product_description = $request->productdes;
                //$products->product_image = $file->getClientOriginalName();
                $products->product_price = $request->productprice;
                $products->product_quantity = $request->productquantity;
            }
            $products->save();

            toastr()->success('Update Success');
            
       
              
        return redirect()->route('products');           
        }
                       
     
    

    public function detail($id){
        $products = products::where('id',$id)->first();
        $slide = false;
        $left_slide = true;
        return view('home.detail',compact('products','slide','left_slide'));
       

    }

    public function deleteProduct($id){
        products::destroy($id);
        return back();
    }
}
