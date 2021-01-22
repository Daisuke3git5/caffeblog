<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaffeController extends Controller
{
    public function add()
    {
        return view('admin.caffe.create');
    }
    
    public function create()
    {
        return redirect('admin/caffe/create');
    }
    
    public function edit()
    {
        return view('admin.caffe.edit');
    }
    
    public function update()
    {
        return redirect('admin/caffe/edit');
    }
}
