<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
     protected $connection = 'second';
     protected $table = 'agency';
     protected $guarded = [''];
     public $timestamps = false;
}
