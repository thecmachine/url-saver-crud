<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    protected $table = "urls";
    public $timestamps = true;

    protected $fillable = [
		'url'
	];
}
