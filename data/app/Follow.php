<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Follow extends Model
{
    protected $connection = 'second';
     protected $table = 'follow';
     protected $guarded = [''];
     protected $dates = ['appointment','timestamp'];
     public $timestamps = false;

 public function oc_fcc() {
    return $this->belongsTo('oc_fcc');
}
public function oc_starclick() {
    return $this->belongsTo('oc_starclick');
}
public function teknisi() {
    return $this->belongsTo('teknisi');
}
}
