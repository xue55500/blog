<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dlogin extends Model
{
    protected $table="dlogin";

    protected $primaryKey = 'd_id';

    public $timestamps = false;
}
