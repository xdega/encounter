<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    protected $table = 'enc_encounters';
    

    public function getCurrentMonth(){

        $now = Carbon::now();

        $result = $this->whereYear('created_at',$now->year)->whereMonth('created_at',$now->month);

        return $result;

    }

}
