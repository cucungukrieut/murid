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

	

  
function doInsert(){
	
if (isset($_POST['save'])){	

 
  $ln = $_POST['lname'];
  $fn = $_POST['fname'];
  $mi = $_POST['mname'];
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $type = $_POST['type'];


 

 	$image= addslashes($_FILES['image']['tmp_name']);
			$name= addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image= base64_encode($image);
 
 mysql_query("INSERT INTO useraccounts(userID, userLName, userFName, userMName, username, userpass, usertype, imagename, imagefile)VALUES('','$ln','$fn','$mi','$uname','$pass','$type','$name', '$image')");
  
  	redirect('index.php?view=list');	

}
 


elseif (isset($_POST['saveandadd'])){	


  
  $ln = $_POST['lname'];
  $fn = $_POST['fname'];
  $mi = $_POST['mname'];
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $type = $_POST['type'];


 

 	$image= addslashes($_FILES['image']['tmp_name']);
			$name= addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image= base64_encode($image);
 
 mysql_query("INSERT INTO useraccounts(userID, userLName, userFName, userMName, username, userpass, usertype, imagename, imagefile)VALUES('','$ln','$fn','$mi','$uname','$pass','$type','$name', '$image')");
  
	redirect('index.php?view=add');	

}
}
 




function doEdit(){
 
  $id = $_POST['idnum'];
  $ln = $_POST['lname'];
  $fn = $_POST['fname'];
  $mi = $_POST['mname'];
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $type = $_POST['type'];

 
 mysql_query("UPDATE useraccounts SET userLName = '$ln', userFName = '$fn', userMName = '$mi', username = '$uname', userpass = '$pass', usertype = '$type' WHERE userID = '$id'");
  
	redirect('index.php');	
 	
}

function doDelete(){
	
	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
	for($i=0;$i<$key;$i++){
 
		mysql_query("DELETE FROM useraccounts WHERE userID = $id[$i]");
 
	}
 
	redirect('index.php');

}

?>