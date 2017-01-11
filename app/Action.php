<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model {
    
    protected $table = 'enc_actions';

    protected $fillable = ['name'];

    public $timestamps = false;


}
