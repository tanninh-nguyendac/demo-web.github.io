<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\membres;
use Cart;
use Darryldecode\Cart\Cart as CartCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::check()){
            $user = DB::table('members')->where('id', Auth::user()->member_id)->get();
           // dd($user);exit;
        }
        
        $cart = Cart::getContent();
        //dd($cart);exit;
        $slide = false;
        $left_slide = false;
        return view ('home.cart',compact('products','slide','left_slide','user','cart')
       );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { 
        
        $cart = Cart::getContent();
        //dd($cart);exit;
        if($cart->isEmpty()){
            toastr()->warning('Không có sản phẩm trong giỏ hàng');
            return redirect()->back();
        }else{
       session(['name' => $request->name]);
       session(['number' => $request->number]);
       session(['address' => $request->address]);
       
        if(Auth::check() && !empty($cart)){
        $total = Cart::gettotal();
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "BBG0WCR2"; //Mã website tại VNPAY 
        $vnp_HashSecret = "XEAFNBTJJWDLXLOQHSTNDDASEOUICRNH"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/cnpm/cnpm/public/return";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";  
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
       
        return redirect($vnp_Url);
        
    }else{
        toastr()->warning('Bạn cần đăng nhập');
            return redirect()->back();
    }
}
    }

    public function return(Request $request)
{
   // dd($request);exit;
    $url = session('url_prev','/');
    if($request->vnp_ResponseCode == "00") {
        $total = Cart::getTotal();
        $cart = Cart::getcontent();
                //dd($cart);exit;
                DB::table('orders')->insert([
                    'member_id' => Auth::user()->id,
                    'member_name' => session('name'),
                    'member_phone' =>session('number'),
                    'member_address' => session('address'),
                    'payments'=>1,
                    'total' => $total
                    ]);
                    $id = DB::getPdo()->lastInsertId();
                    foreach ($cart as $item){
                    DB::table('orders_detail')->insert([
                        'order_id' => $id,
                        'product_id' => $item->id,
                        'quantity' => $item->quantity,
                        ]);
                    }
                    Cart::clear();
                    $request->session()->forget('name');
                    $request->session()->forget('number');
                    $request->session()->forget('address');
                  
                }
        toastr()->success('Thanh toán thành công');
            return redirect()->route('/');
            if(Auth::check() && !empty($cart)){
    
    }
   
    return redirect()->route('/');
    toastr()->warning('Thanh toán không thành công');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        

    }
    public function updatecart(Request $request)
    {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ), // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
          ));
    }

    
    public function deleteitemcart(Request $request){
        Cart::remove($request->id);
    }


    public function checkout(Request $request){
        $cart = Cart::getContent();
        
        if(Auth::check() && !empty($cart)){
            $check1 = true;
            foreach ($cart as $item){
                $sl1 =  products::find($item->id);
                $a = intval($sl1->product_quantity);
                $b = intval($item->quantity);
                $d = ($a - $b);
                if( $d < 0){
                    $check1 = false;
                }else{
                    $check1 = true;
                }
            }
            if($check1){
        $total = Cart::getTotal();
        //dd($cart);exit;
        DB::table('orders')->insert([
            'member_id' => Auth::user()->id,
            'member_name' => $request -> input('name'),
            'member_phone' => $request -> input('number'),
            'member_address' => $request -> input('address'),
            'total' => $total
            ]);
            $id = DB::getPdo()->lastInsertId();
            foreach ($cart as $item){
                $sl =  products::find($item->id);
                $slupdate = $sl->product_quantity -  intval($item->quantity);
                DB::table('products') ->where('products.id', $item->id)->update(['products.product_quantity' => $slupdate ]);
            DB::table('orders_detail')->insert([
                'order_id' => $id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                ]);
            }
            Cart::clear();
            toastr()->success('Đặt hàng thành công');
            return redirect()->route('/');
        }else{
            toastr()->warning('Sản phẩm trong kho không đủ');
            return redirect()->back();
        }
        }else {
            toastr()->warning('Bạn cần đăng nhập');
            return redirect()->back();
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function addCart($id){
        
    //     $product = products::find($id);
    //     //$rowid = rand();
      
    //     //dd($product);exit;
    //         Cart::add(array(
    //             'id' => $id, // inique row ID
    //             'name' => $product->product_name,
    //             'price' => $product->product_price,
    //             'quantity' => 1,
    //             'associatedModel' => $product->product_image
                
    //         ));
            
    //         return redirect()->back();
         
    // }
    public function addCart(Request $request){
        
        $product = products::find($request->id);
        if($request->qty){
            $qty = $request->qty;
        }else{
            $qty = 1;
        }
        //$rowid = rand();
      
        //dd($product);exit;
            Cart::add(array(
                'id' => $request->id, // inique row ID
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => $qty,
                'associatedModel' => $product->product_image
                
            ));
            return response()->json(['success' => 'Success']);
          
         
    }
}
