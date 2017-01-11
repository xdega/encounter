<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    protected $table = 'enc_encounters';

    protected $fillable = ['clients_id', 'types_id', 'actions_id', 'users_id', 'date_time', 'duration', 'comment'];

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
        
        return $this->where('date_time', '>=', Carbon::now()->subWeek())->get();

    }

    public function getEncounters($month, $year){

        $result = $this->whereMonth('date_time', $month)->whereYear('date_time', $year)->get();
        
        return $result;

    }

    public function getEncountersDay($offset){

        $now = Carbon::now();

        $day = ($now->day - $offset);

        $result = $this->whereDay('date_time', $day)
        ->whereMonth('date_time', $now->month)
        ->whereYear('date_time', $now->year)
        ->get(); 
    
        return $result;

    }


}
