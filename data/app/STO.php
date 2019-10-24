<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class STO extends Model
{
    protected $connection = 'second';
     protected $table = 'sto';
     protected $guarded = [''];
     public $timestamps = false;
}
