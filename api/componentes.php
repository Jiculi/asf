<?php 
function fechaFinal($inicio, $meta ) {
    $holidays=array(
        "2019-02-04", 
        "2019-03-18",
        "2019-04-17",
        "2019-04-18",
        "2019-04-19",
        "2019-05-01",
        "2019-07-15",
        "2019-07-16",
        "2019-07-17",
        "2019-07-18",
        "2019-07-19",
        "2019-07-20",
        "2019-07-21",
        "2019-07-22",
        "2019-07-23",
        "2019-07-24",
        "2019-07-25",
        "2019-07-26",
        "2019-07-27",
        "2019-07-28",
        "2019-07-29",
        "2019-07-30",
        "2019-07-31",
        "2019-08-26",
        "2019-09-16",
        "2019-11-01",
        "2019-11-18",
        "2019-12-16",
        "2019-12-17",
        "2019-12-18",
        "2019-12-19",
        "2019-12-20",
        "2019-12-21",
        "2019-12-22",
        "2019-12-23",
        "2019-12-24",
        "2019-12-25",
        "2019-12-26",
        "2019-12-27",
        "2019-12-28",
        "2019-12-29",
        "2019-12-30",
        "2019-12-31",
        "2020-01-01"
    );
    $dia = 0;
    $temp = strtotime($inicio ); 
    while($dia < $meta){
        $next1WD = strtotime('+1 weekday', $temp);
        $next1WDDate = date('Y-m-d', $next1WD);
        if(!in_array($next1WDDate, $holidays)){
            $dia++;
        }
        $temp = $next1WD;
    }
    $next5WD = date("Y-m-d", $temp);
return $next5WD;
}


function getWorkingDays($startDate,$endDate) {
    $holidays=array(
        "2019-02-04", 
        "2019-03-18",
        "2019-04-17",
        "2019-04-18",
        "2019-04-19",
        "2019-05-01",
        "2019-07-15",
        "2019-07-16",
        "2019-07-17",
        "2019-07-18",
        "2019-07-19",
        "2019-07-20",
        "2019-07-21",
        "2019-07-22",
        "2019-07-23",
        "2019-07-24",
        "2019-07-25",
        "2019-07-26",
        "2019-07-27",
        "2019-07-28",
        "2019-07-29",
        "2019-07-30",
        "2019-07-31",
        "2019-08-26",
        "2019-09-16",
        "2019-11-01",
        "2019-11-18",
        "2019-12-16",
        "2019-12-17",
        "2019-12-18",
        "2019-12-19",
        "2019-12-20",
        "2019-12-21",
        "2019-12-22",
        "2019-12-23",
        "2019-12-24",
        "2019-12-25",
        "2019-12-26",
        "2019-12-27",
        "2019-12-28",
        "2019-12-29",
        "2019-12-30",
        "2019-12-31",
        "2020-01-01"
    );


    // do strtotime calculations just once
    $endDate = strtotime($endDate);
    $startDate = strtotime($startDate);


    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
    //We add one to inlude both dates in the interval.
    $days = ($endDate - $startDate) / 86400 + 1;

    $no_full_weeks = floor($days / 7);
    $no_remaining_days = fmod($days, 7);

    //It will return 1 if it's Monday,.. ,7 for Sunday
    $the_first_day_of_week = date("N", $startDate);
    $the_last_day_of_week = date("N", $endDate);

    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
    if ($the_first_day_of_week <= $the_last_day_of_week) {
        if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
        if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
    }
    else {
        // (edit by Tokes to fix an edge case where the start day was a Sunday
        // and the end day was NOT a Saturday)

        // the day of the week for start is later than the day of the week for end
        if ($the_first_day_of_week == 7) {
            // if the start date is a Sunday, then we definitely subtract 1 day
            $no_remaining_days--;

            if ($the_last_day_of_week == 6) {
                // if the end date is a Saturday, then we subtract another day
                $no_remaining_days--;
            }
        }
        else {
            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
            // so we skip an entire weekend and subtract 2 days
            $no_remaining_days -= 2;
        }
    }

    //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
//---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
   $workingDays = $no_full_weeks * 5;
    if ($no_remaining_days > 0 )
    {
      $workingDays += $no_remaining_days;
    }

    //We subtract the holidays
    foreach($holidays as $holiday){
        $time_stamp=strtotime($holiday);
        //If the holiday doesn't fall in weekend
        if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
            $workingDays--;
    }

    return $workingDays;
}


?>