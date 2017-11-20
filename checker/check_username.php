<?php
//connect to database
$mysql_hostname = "127.0.0.1";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "mscabdb";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");
//get the username
$username = mysql_real_escape_string($_POST['username']);

//mysql query to select field username if it's equal to the username that we check '
$result = mysql_query('SELECT studID from student where studID = "'. $username .'"');

//if number of rows fields is bigger them 0 that means it's NOT available '
if(mysql_num_rows($result)>0){
	//and we send 0 to the ajax request
	echo 1;
}else{
	//else if it's not bigger then 0, then it's available '
	//and we send 1 to the ajax request
	echo 0;
}

?>