<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    protected $connection = 'second';
     protected $table = 'regional';
     protected $guarded = [''];
     public $timestamps = false;
}
