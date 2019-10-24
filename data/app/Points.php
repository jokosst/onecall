<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $connection = 'second';
	protected $table = 'points';
	protected $dates = ['date'];
	public $timestamps = false;
	protected $fillable = ['id','sales_id','date','point'];

	public function sales()
	{
		return $this->belongsTo("App\Sales");
	}
}
