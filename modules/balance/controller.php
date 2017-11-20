<?php 
require_once ("../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	 
	case 'addnewaccount' :
	addaccount();
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

	
 
function addnewaccount(){
	




  $sy = $_POST['sy'];
  $sem = $_POST['sem'];




$sqll = mysql_query("SELECT COUNT(TimeAccount)as totalaccounts FROM balances WHERE studID = '$_SESSION[studid]'");
$ress = mysql_fetch_array($sqll);
$totalacct = $ress['totalaccounts'];
 
 
 
$hours =  $totalacct; //students total account time
$totalmins = hoursToMinutes($hours);
 
$minutes = $totalmins;
$totaltime = minutesToHours($minutes);

$newtotaltime = ($totaltime * 30);

 
  mysql_query("INSERT INTO balances(balanceID, studID, TimeAccount, schoolyear, semeter)VALUES('','$_SESSION[studid]','$newtotaltime', '$sy', '$sem')");
  
 	message("New Account was successfully added!", "success");
  	redirect('../student/index.php');	

 
}



function doEdit(){
	if (isset($_POST['update'])){

		if ($_POST['username'] == "" OR $_POST['pass'] == "" ) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=edit');
		}else{
			

			$user = new User();
			$acctid			= $_GET['id'];
			//$acc_name		= $_POST['name'];
			$acc_username   = $_POST['username'];
			$acc_password 	= $_POST['pass'];
			$md5password = md5($acc_password);

		if($_SESSION['ACCOUNT_TYPE']=='Administrator') {
			
			$acc_type 		= $_POST['type'];
 
}
				//$user->ACCOUNT_NAME = $acc_name;
				$user->ACCOUNT_USERNAME = $acc_username;
				$user->ACCOUNT_PASSWORD = sha1($md5password);

					 
				if($_SESSION['ACCOUNT_TYPE']=='Administrator') {
		
				$user->ACCOUNT_TYPE = $acc_type;

			}
				
				$user->update($acctid);
			 	message("".$acctid." was successfully updated!", "success");
				redirect('index.php');
				
			
		}
	}
		
}

function doDelete(){



	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
	for($i=0;$i<$key;$i++){
 
 	mysql_query("DELETE FROM student WHERE studID = ($id[$i])");
 
	 
	}

	message("User already Deleted!","info");
	redirect('index.php');
}

?>
 

