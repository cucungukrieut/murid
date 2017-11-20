
<?php include '../../banner.php';?>


<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>


<?php

$_SESSION['studid'] = $_POST['id'];


?>



 
<br/>


<?php 

$sql = mysql_query("SELECT * FROM student WHERE studID = '$_SESSION[studid]'");
$res = mysql_fetch_array($sql);

echo' <h2 align="left" style="color:Darkred;" id="upr">'.$res['studLName'].' '.$res['studFName'].', '.$res['studMName'].'</h2>';

 ?>

			    <form action="index.php?view=add" Method="POST">  					
				<table id="example" class="table table-striped" cellspacing="0">
				
				  <thead>
				  	<tr style="background:darkorange;color:white;">
				  		<th>No.</th>
				  	 
				  		<th>New Account</th>
				  		<th>Bal. Account</th>
				  		<th>School Year</th>
				  		<th>Semester</th>
		 
				  		 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  		$sql = mysql_query("SELECT * FROM balances WHERE studID = '$_SESSION[studid]'");
				  	
						while ($row = mysql_fetch_assoc($sql)) {
				  		echo '<tr style="background:lightgray;">';
				  	 	echo '<td width="5%" align="center"></td>';

				    	echo '<td>'.$row['TimeAccount'].'</td>';
				    	echo '<td>'.$row['balanceaccount'].'</td>';
				  		echo '<td id="upr">'.$row['schoolyear'].'</td>';
				  		echo '<td id="upr">'.$row['semester'].'</td>';
			 
				  		echo '</tr>';
				   
				   
				  	} 
				  	?>
				  </tbody>	
				</table>
				
			
	
 <div class="form-group">
     
  <div class="col-md-8">
          <button  id="print_btn"  style="background:#0a0;color:white;" value="<?php echo $_SESSION['studid']; ?>" name="studid" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Update Account</button>
						         
         </div>
    </div>
            

</form>

 
	 

 
 