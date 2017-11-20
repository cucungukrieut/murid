<?php 
require_once ("../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	 
	case 'plain' :
	SavePlain();
	break;
	
	case 'colored' :
	SaveColored();
	break;
	
	case 'withpicture' :
	SaveWPics();
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

	
 
function SavePlain(){
	

if(isset($_POST['plain'])){

  $id = $_POST['id'];
  $pages = $_POST['pages'];
  $psize = $_POST['psize'];
 
 date_default_timezone_set('Asia/Manila');  
 $datetime = date("D M d, Y g:i a"); 


$sql = mysql_query("SELECT TimeAccount FROM student WHERE studID = '$id'");
$result = mysql_fetch_array($sql);  
$timeaccount = $result['TimeAccount'];

 
$deducted = (6 * $pages); //multiply to default minutes cost per page


if($deducted > 1800){
	echo "You have no Enough Account Time Balance.";
}

else{
 
$timeleft = ($timeaccount - $deducted); //subtract total account time


 mysql_query("UPDATE student SET(TimeAccount = '$timeleft') WHERE studID = '$id' ");
  
  	redirect('index.php');	

 
 }
  
}
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
 

