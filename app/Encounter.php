<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    protected $table = 'enc_encounters';

    public function getCurrentYear(){

        $now = Carbon::now();
        
        $data = array (
            'jan' => $this->getEncounters( '1', $now->year ),
            'feb' => $this->getEncounters( '2', $now->year ),
            'mar' => $this->getEncounters( '3', $now->year ),
            'apr' => $this->getEncounters( '4', $now->year ),
            'may' => $this->getEncounters( '5', $now->year ),
            'jun' => $this->getEncounters( '6', $now->year ),
            'jul' => $this->getEncounters( '7', $now->year ),
            'aug' => $this->getEncounters( '8', $now->year ),
            'sep' => $this->getEncounters( '9', $now->year ),
            'oct' => $this->getEncounters( '10', $now->year ),
            'nov' => $this->getEncounters( '11', $now->year ),
            'dec' => $this->getEncounters( '12', $now->year )
        );

        return $data;

    }

    public function getLastWeek(){
        
        return $this->where('created_at', '>=', Carbon::now()->subWeek())->get();

    }

    public function getEncounters($month, $year){

        $result = $this->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        
        return $result;

    }

    public function getEncountersDay($offset){

        $now = Carbon::now();

        $day = ($now->day - $offset);

        $result = $this->whereDay('created_at', $day)
        ->whereMonth('created_at', $now->month)
        ->whereYear('created_at', $now->year)
        ->get(); 
    
        return $result;

    }


}
