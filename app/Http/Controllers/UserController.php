<?php

namespace App\Http\Controllers;

use App\User;
use App\members;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Support\Facades\DB;
use Cart;



class UserController extends Controller
{
    public function getSignup(){
        $slide = false;
        $left_slide = false;
        return view('login.signup',compact('slide','left_slide'));
    }

    public function postSignup(Request $request){
        $this->validate($request, [
            'Email'=>'Email|required|unique:users',
            'Password'=>'min:6|required_with:Confirm|same:Confirm',
            'Fullname'=>'required',
            'Phonenumber'=>'required',
            'Address'=>'required',
        ]);

        // $data = $request->all();
        // $check = $this->create($data);
       // $user = User::create($data);
       DB::table('members')->insert([
        'member_name' => $request -> input('Fullname'),
        'member_phone' => $request -> input('Phonenumber'),
        'member_address' => $request -> input('Address')
        ]);
        $id = DB::getPdo()->lastInsertId();

       DB::table('users')->insert([
        'user_name' => $request -> input('UserName'),
        'email' => $request -> input('Email'),
        'password' => Hash::make($request -> input('Password')),
        'member_id'=>$id
    ]);
        
        return redirect()->route('login');
        
        
    }
    public function edit($id){
           // $user = User::where('id',$id)->first();
            $users = DB::table('users')
            ->join('members', 'users.member_id', '=', 'members.id')->first();
            //dd($users);exit;
            return view('admin.users.suathanhvien',compact('users'));
               
    }

    public function postupdateuser(Request $request){
        $user = user::where('member_id',$request->id)->first();
        $member = members::where('id',$request->id)->first();
       // dd($request);exit;

       
                $user->user_name = $request->username;
                $user->email = $request->email;
                $member->member_name = $request->membername;
                //$products->product_image = $file->getClientOriginalName();
                $member->member_phone = $request->phone;
                $member->member_address = $request->address;
            
            $user->save();
            $member->save();


            toastr()->success('Update Success');
            
       
              
        return redirect()->route('thanhvien');
    }

    public function delete($id){
        $item = user::where('member_id', $id)->delete();
        members::destroy($id);
        return back();
    }

    public function getLogin(){
        if (Auth::check()){
            return redirect()->route('/');
         }else{
            $slide = false;
            $left_slide = false;
            return view('login.login',compact('slide','left_slide'));
         }
    }
    public function doipass(){
       
            $slide = false;
            $left_slide = false;
            return view('login.doimatkhau',compact('slide','left_slide'));
         
    }
    public function laypass(){
        if (Auth::check()){
            return redirect()->route('/');
         }else{
            $slide = false;
            $left_slide = false;
            return view('login.laymatkhau',compact('slide','left_slide'));
         }
    }
    public function postLogin(Request $request){
        
        $this->validate($request, [
            'Email'=>'Email|required',
            'Password'=>'min:6|required'
        ]);
        
        $data = [
            'email' => $request->Email,
            'password' => $request->Password,
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();
           // dd($user['user_name']);exit;
           //var_dump($user->role);exit;
           if($user->role == 0){
            toastr()->success('Đăng nhập thành công');
            return redirect()->route('/');
           }else{
            return redirect()->route('admin');
           }
                       
        }else {
            return redirect()->back()->withErrors('Sai tài khoản hoặc mật khẩu'); 
        }
    }
    public function logout(){
        Auth::logout();
        Cart::clear();
        toastr()->success('Đăng xuất thành công');
        return redirect()->route('/');

    }

}
