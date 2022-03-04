<?php 

namespace App\Http\Helpers;



class Dates {
    public function getValidDate($date) {
        $date = explode('-',$date);
        $year = trim($date[2],' ');
        $month = trim($date[0],' ');
        $day = trim($date[1],' ');
        $validDate ="$month/$day/20$year";
        return date('Y-m-d',strtotime($validDate));
    }   
}