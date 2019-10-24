<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kode_Agency extends Model
{
    protected $connection = 'second';
     protected $table = 'kode_agency';
     protected $guarded = [''];
     public $timestamps = false;
}
