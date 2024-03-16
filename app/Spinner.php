<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spinner extends Model
{
	protected $table = 'spinners';
    protected $fillable = ['name', 'image','color','price', 'diapasone', 'max_spin','max_profit'];
}
