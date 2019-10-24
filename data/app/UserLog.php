<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $connection = 'second';
	protected $table = 'tbl_log';
	protected $dates = ['waktu'];
	public $timestamps = false;

	//columns = id,id_sales,log,waktu

	public function sales()
	{
		return $this->belongsTo("sales","id_sales","id");
	}
}
