<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;

class Mines extends Model
{
    protected $table = 'mines-game';
    
    protected $fillable = ['id_users', 'login', 'num_mines', 'bet', 'mines', 'click', 'onOff', 'result', 'step', 'win'];
}
