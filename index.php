

<?php



require_once("includes/initialize.php");
$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';

switch ($view) {
	 
	case '1' :
        $title="Home";	
		$content='home.php';
		break;
	default :
	    $title="Home";	
		$content ='home.php';	
		break;	
}
require_once 'mytheme/index.php';
?>
