<?php
require_once("../../includes/initialize.php");

ECHO'<HEAD>
<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon"/>
</HEAD>';
//checkAdmin();
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';




switch ($view) {

	case 'updatesysem' :
		$content    = 'updatesysem.php';		
		break;
 
	default :

		$content    = 'updatesysem.php';	
 
}


require_once '../../mytheme/index.php';

?>


  
