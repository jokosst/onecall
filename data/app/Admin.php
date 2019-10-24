<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $connection = 'second';
    protected $table = '';
   protected $guarded = [''];
   public $timestamps = true;
   

   protected $hidden = [
        'password', 'remember_token',
    ];
}
