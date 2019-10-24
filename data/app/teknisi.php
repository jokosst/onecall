<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teknisi extends Model
{
    protected $connection = 'second';
    protected $table = 'teknisi';
   protected $guarded = [''];
   public $timestamps = true;
   

   protected $hidden = [
        'password', 'remember_token',
    ];
}
