

<?php
require_once("../../includes/initialize.php");
$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	 
 
	default :
	    $title="view";	
		$content ='view.php';		
}
require_once '../../mytheme/index.php';
?>
