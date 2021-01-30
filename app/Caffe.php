<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caffe extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'area' => 'required',
        'station' => 'required',
        'streetAddress' => 'required',
        'phoneNumber' => 'required',
        'siteurl' => 'required',
        'wifi' => 'required',
        'powerNumber' => 'required',
        'seatNumber' => 'required',
        'price' => 'required',
        'noise' => 'required',
        'comfortable' => 'required',
        'body' => 'required',
    );
}
