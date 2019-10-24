<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Witel extends Model
{
    protected $connection = 'second';
     protected $table = 'witel';
     protected $guarded = [''];
     public $timestamps = false;
}
