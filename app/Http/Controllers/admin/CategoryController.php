<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        
    }
    public function create(){
       return view('admin.Cateogry.create');

    }

    public function store(Request $request){

        $validatior =  Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);
        if ($validatior->passes()) {
            $category = new Category();
            $category->name =  $request->name;
            $category->slug =  $request->slug;
            $category->status =  $request->status;
            $category->save();

            $request->session()->flash('success','Category added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Category add successfully'
            ]);

        
        }else {
            return response()->json([
                'status' => false,
                'errors' => $validatior->errors()
            ]);
        }

    }
    public function edit(){

    }
    public function update(){

    }
    
}
