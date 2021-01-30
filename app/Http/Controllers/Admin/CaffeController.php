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
    
    public function create(Request $request)
    {
        //Varidationを行う
        $this->validate($request, Caffe::$rules);
        
        $caffe = new Caffe;
        $form = $request->all();
        
        //フォームから画像が送信されてきたら、保存して、$caffe->image_pathに画像のパスを保存する
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $caffe->image_path = basename($path);
        } else {
            $form->image_path = null;
        }
        
        //フォームから送信されてきた_tokenを削除する
        
        unset($form['_token']);
        //unset($form['image']);
        
        //データベースに保存する
        $caffe->fill($form);
        $caffe->save();
        
        // admin/caffe/createにリダイレクトする
        return redirect('admin/caffe/create');
    }

    
    public function index(Request $request)
    {
        $cond_title = $request-> cond_title;
        if ($cond_title != '') {
            $posts = Caffe::where('title', $cond_title)->get();
        } else {
            $posts = Caffe::all();
        }
        return view('admin.caffe.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
