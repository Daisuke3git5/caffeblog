<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Caffe;

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
        unset($form['image']);
        
        //データベースに保存する
        $caffe->fill($form);
        $caffe->save();
        
        // admin/caffe/createにリダイレクトする
        return redirect('admin/caffe/create');
    }

    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Caffe::where('title', $cond_title)->get();
        } else {
            $posts = Caffe::all();
        }
        return view('admin.caffe.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    
    public function edit(Requet $request)
    {
        //Caffe Modelからデータを取得する
        $caffe = Caffe::find($request->id);
        if (empty($caffe)) {
            abort(404);
        }
        return view('admin.caffe.edit', ['caffe_form' => $caffe]);
    }


    public function update(Request $request)
    {
        $this->validate($request, Caffe::$rules);
        //Caffe Modelからデータを取得する
        $caffe = Caffe::find($request->id);
        //送信されてきたフォームデータを格納する
        $caffe_form = $request->all();
        if ($request->remove == 'true') {
            $caffe_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $caffe_form['image_path'] = basename($path);
        } else {
            $caffe_form['image_path'] = $caffe->image_path;
        }
        unset($caffe_form['image']);
        unset($caffe_form['remove']);
        unset($caffe_form['_token']);
    
        //当該するデータを上書きして保存する
        $caffe->fill($caffe_form)->save();
        return redirect('admin/caffe');
    }
}
