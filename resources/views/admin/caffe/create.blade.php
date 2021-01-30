@extends('layouts.admin')
@section('title', '記事の新規作成')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>ノマド場所の記事を書いてみる</h2>
            <form action="{{ action('Admin\CaffeController@create') }}" method="post" enctype="multipart/form-data">
                
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                         <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2">お店の名前（タイトル）</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">お店エリア</label>
                    <div class="col-md-10">
                        <select name="area" id="area">
                            <option value="area">--- エリアを選択してください ---</option>
                            <option value="umeda">梅田/曽根崎/茶屋町</option>
                            <option value="nakatsu">中津/豊崎/大淀</option>
                            <option value="honjo">本庄/中崎町/南森町</option>
                            <option value="ten">天満/天満橋</option>
                            <option value="dojima">堂島/中ノ島</option>
                            <option value="castel">OBP/森ノ宮周辺</option>
                            <option value="shinosaka">新大阪/東淀川/西中島南方駅周辺</option>
                            <option value="jyuzo">十三駅周辺</option>
                            <option value="mikuni">三国/神崎川/加島</option>
                            <option value="tenoji">天王寺/四天王寺/四天王/桃谷</option>
                            <option value="uehonmachi">上本町/玉造/鶴橋</option>
                            <option value="nakatsu">浪速区</option>
                            <option value="naniwa">本庄/中崎町/南森町</option>
                            <option value="suminoe">住之江区</option>
                            <option value="miyako">都島区</option>
                            <option value="hirano">平野区</option>
                            <option value="higashi-yodo">東淀川区</option>
                            <option value="harukasu">阿倍野区</option>
                            <option value="nishi">西区</option>
                            <option value="nishinari">西成区</option>
                            <option value="hukushima">福島区</option>
                            <option value="sumiyoshi">住吉区</option>
                            <option value="tsurumi">鶴見区</option>
                            <option value="ikuno">生野区</option>
                            <option value="joto">城東区</option>
                            <option value="nishi-yodo">西淀川区</option>
                            <option value="konohana">此花区</option>
                            <option value="higashinari">東成区</option>
                            <option value="higashisumiyoshi">東住吉区</option>
                            <option value="minato">港区</option>
                            <option value="taisho">大正区</option>
                            <option value="asahi">旭区</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">最寄りの駅</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="station" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">住所</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="streetAddress" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">店の電話番号</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="phoneNumber" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">店のサイトURL</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="siteurl" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">Wi-Fi</label>
                    <div class="col-md-10">
                        <div class="col-md-10">
                        <label><input type="radio" name="wifi" value="true">有</label>
                        <label><input type="radio" name="wifi" value="false">無</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">電源</label>
                    <div class="col-md-10">
                        <select name="powerNumber" id="powerNumber">
                            <option value="area">--- 電源の数を選択してください ---</option>
                            <option value="less">１０席未満</option>
                            <option value="few">１０～３０席程度</option>
                            <option value="normal">３０～５０席程度</option>
                            <option value="alittle">５０～７０席程度</option>
                            <option value="alittle">７０～９０席程度</option>
                            <option value="great">全ての席に付いている</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">席数</label>
                    <div class="col-md-10">
                        <select name="seatNumber" id="seatNumber">
                            <option value="area">--- 席数を選択してください ---</option>
                            <option value="less">１０席未満</option>
                            <option value="few">１０～３０席程度</option>
                            <option value="normal">３０～５０席程度</option>
                            <option value="alittle">５０～８０席程度</option>
                            <option value="great">８０～１２０席程度</option>
                            <option value="much">１２０席以上</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">価格帯</label>
                    <div class="col-md-10">
                        <select name="price" id="price">
                            <option value="yosan">--- 価格を選択してください ---</option>
                            <option value="999">～￥９９９</option>
                            <option value="1000">￥１，０００～￥１，９９９</option>
                            <option value="2000">￥２，０００～￥２，９９９</option>
                            <option value="3000">￥３，０００～３，９９９</option>
                            <option value="4000">￥４，０００～</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">騒音</label>
                    <div class="col-md-10">
                        <select name="noise" id="nosie">
                            <option value="volume">--- 騒音度合い ---</option>
                            <option value="quiet">静か</option>
                            <option value="moderate">普通</option>
                            <option value="noisy">うるさい</option>
                            <option value="much-noisy">非常にうるさい</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">座り心地</label>
                    <div class="col-md-10">
                        <select name="comfortable" id="comfortable">
                            <option value="comfort-level">--- イスやテーブルの使い心地 ---</option>
                            <option value="bad">悪い</option>
                            <option value="notgood">あまり良くない</option>
                            <option value="normal">普通</option>
                            <option value="comfortable">快適</option>
                            <option value="socomfortable">とても心地いい</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">本文</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection