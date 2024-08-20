<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        
        }else {
            return response()->json([
                'status' => true,
                'errors' => $validatior->errors()
            ]);
        }

    }
    public function edit(){

    }
    public function update(){

    }
    
}
