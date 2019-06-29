<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function index(){
return  view('admin.posts.index',[
      'posts'=>post::all(),
]);
    }
    public function create(){
        return  view('admin.posts.create');
    }
    public function store(){
        return __METHOD__;
  
    }
    public function edit($id){
        return  view('admin.posts.create');   
    }
    public function delete(){
        return __METHOD__;
  
    }
    
}
