<?php 
require_once ("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	 
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;
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

	
 
function doInsert(){
	
if (isset($_POST['save'])){	


  $sid = $_POST['idnum'];
  $ln = $_POST['lname'];
  $fn = $_POST['fname'];
  $mi = $_POST['mname'];
  $yr = $_POST['yr'];
  $course = $_POST['course'];
  $timeA = $_POST['time'];




$hours =  $timeA; //students total account time
$totalmins = hoursToMinutes($hours);
 
$minutes = $totalmins;
$totaltime = minutesToHours($minutes);



 

 	$image= addslashes($_FILES['image']['tmp_name']);
			$name= addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image= base64_encode($image);
 

if ($sid == "") {
	message('ID Number is required!', "error");
	redirect ('index.php?view=add');
}elseif ($ln == "") {
	message('Last Name is required!', "error");
	redirect ('index.php?view=add');
}elseif ($fn == "") {
	message('First Name is required!', "error");
	redirect ('index.php?view=add');
}elseif ($timeA == "") {
	message('Time Account is required!', "error");
	redirect ('index.php?view=add');
}elseif ($yr == "") {
	message('Year Level is required!', "error");
	redirect ('index.php?view=add');	
}elseif ($course == "") {
	message('Course is required!', "error");
	redirect ('index.php?view=add');	
}
else{


 mysql_query("INSERT INTO `student` (`studID`, `studLName`, `studFName`, `studMName`,`imagename`, `imagefile`,`studcourse`,`studyear`) VALUES ('$sid', '$ln', '$fn', '$mi', '$name', '$image', '$course','$yr')");
  $sqq = mysql_query("SELECT * FROM schoolyearsem");
            $rrs = mysql_fetch_array($sqq);
            $sy = $rrs['schoolyear'];
            $sem = $rrs['semester'];


 mysql_query("INSERT INTO balances VALUES('','$sid','$totaltime','$totaltime','$sy','$sem')");
 	message('New student added successfully!', "success");
	redirect('index.php?view=list');	

}
}



elseif (isset($_POST['saveandadd'])){	



  $sid = $_POST['idnum'];
  $ln = $_POST['lname'];
  $fn = $_POST['fname'];
  $mi = $_POST['mname'];
  $yr = $_POST['yr'];
  $course = $_POST['course'];
  $timeA = $_POST['time'];




$hours =  $timeA; //students total account time
$totalmins = hoursToMinutes($hours);
 
$minutes = $totalmins;
$totaltime = minutesToHours($minutes);
 
 
 

 	$image= addslashes($_FILES['image']['tmp_name']);
			$name= addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image= base64_encode($image);
 

if ($sid == "") {
	message('ID Number is required!', "error");
	redirect ('index.php?view=add');
}elseif ($ln == "") {
	message('Last Name is required!', "error");
	redirect ('index.php?view=add');
}elseif ($fn == "") {
	message('First Name is required!', "error");
	redirect ('index.php?view=add');
}elseif ($timeA == "") {
	message('Time Account is required!', "error");
	redirect ('index.php?view=add');	
}elseif ($yr == "") {
	message('Year Level is required!', "error");
	redirect ('index.php?view=add');	
}elseif ($course == "") {
	message('Course is required!', "error");
	redirect ('index.php?view=add');	
} 
else{


  mysql_query("INSERT INTO `student` (`studID`, `studLName`, `studFName`, `studMName`,`imagename`, `imagefile`,`studcourse`,`studyear`) VALUES ('$sid', '$ln', '$fn', '$mi', '$name', '$image', '$course','$yr')");
 $sqq = mysql_query("SELECT * FROM schoolyearsem");
            $rrs = mysql_fetch_array($sqq);
            $sy = $rrs['schoolyear'];
            $sem = $rrs['semester'];


 mysql_query("INSERT INTO balances VALUES('','$sid','$totaltime','$sy','$sem')");
 	message('New student added successfully!', "success");
	redirect('index.php?view=add');	

}
}
}




function doEdit(){
 
  $id = $_POST['idnum'];
  $ln = $_POST['lname'];
  $fn = $_POST['fname'];
  $mi = $_POST['mname'];
  $timeA = $_POST['time'];
 
$hours =  $timeA; //students total account time
$totalmins = hoursToMinutes($hours);
 
$minutes = $totalmins;
$totaltime = minutesToHours($minutes);


  $sqq = mysql_query("SELECT * FROM schoolyearsem");
            $rrs = mysql_fetch_array($sqq);
            $sy = $rrs['schoolyear'];
            $sem = $rrs['semester'];

 mysql_query("UPDATE student SET studLName = '$ln', studFName = '$fn', studMName = '$mi' WHERE studID = '$id'");

 mysql_query("UPDATE balances SET  TimeAccount = '$totaltime' WHERE studID = '$id' AND schoolyear = '$sy' AND semester = '$sem' ");

  
	redirect('index.php');	
 	
}



function doDelete(){



	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
	for($i=0;$i<$key;$i++){
 
 	mysql_query("DELETE FROM student WHERE studID = ($id[$i])");

 	mysql_query("DELETE FROM balances WHERE studID = ($id[$i])");
 
	 
	}

	message("User already Deleted!","info");
	redirect('index.php');
}

?>
 

