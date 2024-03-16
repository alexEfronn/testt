<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Drops extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'drops';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['spinner_id', 'user_id', 'win'];
	public $timestamps = false;
}
