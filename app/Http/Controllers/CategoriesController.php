<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\categories;

class CategoriesController extends Controller
{

    public function getCategories(){
        $category = DB::table('categories')->get();
        return view('admin.Categories.category',compact('category'));
    }

    public function addCategories (){
        return view ('admin.Categories.addCategory');
    }

    public function insertCategories(Request $request){
       
        // dd($request);
        $category = new categories;
    	$category->category_name = $request->catename;
    	$category->save();
        
        return redirect()->route('categories');
        
    }

    public function editCategory($id){
        $category = Categories::where('id',$id)->first();
        return view('admin.Categories.editCategory',compact('category'));
    	
    }                                                                                                                                                                                                                                                                                                               

    public function updateCategory(Request $request,$id){
        $category = Categories::where('id',$id)->first();
    	$category->category_name = $request->catename;
    	$category->update();
        return redirect()->route('categories');
    }     

    public function deleteCategory($id){
        Categories::destroy($id);
        return back();
    }
}
