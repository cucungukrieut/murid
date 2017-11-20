<?php
require_once("../../includes/initialize.php");

ECHO'<HEAD>
<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon"/>
</HEAD>';
//checkAdmin();
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';




switch ($view) {


	case 'list': 
		$content    = 'list.php';		
		break;

	case 'add' :
		$content    = 'add.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;
 
	default :
		$content    = 'list.php';	
 
}


require_once '../../mytheme/index.php';

?>


  
