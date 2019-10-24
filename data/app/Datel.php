<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datel extends Model
{
   protected $connection = 'second';
     protected $table = 'datel';
     protected $guarded = [''];
     public $timestamps = false;
}
