<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function index(){
return  view('admin.posts.index')
    }
    public function create(){
        return __METHOD__;

    }
    public function store(){
        return __METHOD__;
  
    }
    public function edit(){
        return __METHOD__;
   
    }
    public function delete(){
        return __METHOD__;
  
    }
    
}
