<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $table = 'enc_types';

    protected $fillable = ['name'];

    public $timestamps = false;

}
