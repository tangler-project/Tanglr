<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	use SoftDeletes;
    //for softdeleting
    protected $dates = ['deleted_at'];
	
    protected $table = 'events';


     public static  $rules = [
            'title' => 'required',
            'img_url' => 'required',
            'content' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
}
