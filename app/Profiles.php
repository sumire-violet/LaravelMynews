<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    //
    // 以下を追記
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
}
