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

	 
	if($_POST['type'] == "Select User Type"){
		message("Please select a user type!","error");
		redirect('index.php?view=add');
	 	
		/*$messageStats = false;
		message("All field is required!","error");
		redirect('index.php?view=add');*/

	}else{
		
			$image= addslashes($_FILES['image']['tmp_name']);
			$name= addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image= base64_encode($image);
			


		$user = new User();
		$acc_name		= $_POST['name'];
		$acc_username   = $_POST['username'];
		$acc_password 	= $_POST['pass'];
		$acc_type 		= $_POST['type'];
		$md5password = md5($acc_password);


		$goodval = mysql_real_escape_string(trim($acc_username));


		$res = $user->find_all_user($acc_name);
		
		
		if ($res >=1) {
			message("Account name already exist!", "error");
			redirect('index.php');
		}else{
			
			$user->ACCOUNT_NAME = $acc_name;
			$user->ACCOUNT_USERNAME = $goodval;
			$user->ACCOUNT_PASSWORD = sha1($md5password);
			$user->ACCOUNT_TYPE = $acc_type;

			$user->imagename = $name;
			$user->imagefile = $image;
			
			 $istrue = $user->create(); 
			 if ($istrue == 1){
			 	message("New account created successfully!", "success");
			 	redirect('index.php');
			 	
			 }
		}	 

		
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
 
		$user = new User();
		$user->delete($id[$i]);
	}

	message("User already Deleted!","info");
	redirect('index.php');

}

?>