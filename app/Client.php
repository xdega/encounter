<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    protected $table = 'enc_clients';

    protected $fillable = ['first_name','last_name','age','phone','email','portrait_url','comment'];

    public $timestamps = false;
    
}