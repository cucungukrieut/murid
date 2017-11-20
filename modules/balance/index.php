<?php
require_once("../../includes/initialize.php");

ECHO'<HEAD>
<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon"/>
</HEAD>';
//checkAdmin();
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';




switch ($view) {

	case 'add' :
		$content    = 'addnewaccount.php';		
		break;

	case 'balancelist' :
		$content    = 'balancelist.php';		
		break;

	case 'checkbalance' :
		$content    = 'checkbalance.php';		
		break;
 
	default :

		$content    = 'checkbalance.php';	
 
}


require_once '../../mytheme/index.php';

?>


  
