<?php
require_once("../../includes/initialize.php");

ECHO'<HEAD>
<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon"/>
</HEAD>';
//checkAdmin();
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';




switch ($view) {

case 'daily':
		$content    = 'viewdaily.php';		
		break;
case 'inkjetletter':
		$content    = 'inkjetletter.php';		
		break;

case 'inkjetlegal':
		$content    = 'inkjetlegal.php';		
		break;

case 'laserletter':
		$content    = 'laserletter.php';		
		break;

case 'laserlegal':
		$content    = 'laserlegal.php';		
		break;
 
	default :
		$content    = 'viewdaily.php';	
 
}


require_once '../../mytheme/index.php';

?>


  
