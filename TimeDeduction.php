<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

 
$hours = 30; //students total account time
$totalmins = hoursToMinutes($hours);
 
$pages = 2; //number of pages
$deducted = (6 * $pages); //multiply to default minutes cost per page


if($deducted > 1800){
	echo "You have no Enough Account Time Balance.";
}
else{


$hr = 0;
$hrz = hoursToMinutes($hr);
$timecost = ($hrz + $deducted);
$totalCost = minutesToHours($timecost);
echo "Total Time Cost :".$totalCost;


$timeleft = ($totalmins - $deducted); //subtract total account time
echo "<br/>";

$minutes = $timeleft;
$totaltimeleft = minutesToHours($minutes);
 echo "Total time Left : " .$totaltimeleft;
 }




//function converter hours to mins 
function hoursToMinutes($hours) 
{ 
    $minutes = 0; 
    if (strpos($hours, ':') !== false) 
    { 
        // Split hours and minutes. 
        list($hours, $minutes) = explode(':', $hours); 
    } 
    return $hours * 60 + $minutes; 
}
//end

 

//function converter mins to hour
function minutesToHours($minutes) 
{ 
    $hours = (int)($minutes / 60); 
    $minutes -= $hours * 60; 
    return sprintf("%d:%02.0f", $hours, $minutes); 
}  
//end


?>



</body>
</html>