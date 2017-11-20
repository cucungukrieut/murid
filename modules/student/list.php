
<?php include '../../banner.php';?>


<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>




<br/>
 <h2 align="left" style="color:Darkred;">Students Information</h2>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" class="table table-striped" cellspacing="0">
				
				  <thead>
				  	<tr style="background:darkorange;color:white;">
				  		<th>No.</th>
				  		<?php if($_SESSION['usertype'] == 'Administrator'){  ?>
				  		<th id="pit" width="10%" align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> ID#.</th>
				  		<?php } else{
				  			echo'<th>ID#.</th>';
				  		}?>

				  		<th>Name</th>
				  		<th>New Account</th>
				  		<th>Bal. Account</th>
				  		<th>Year Level</th>
				  		<th>Course</th>
				  		<th>S.Y.</th>
				  		<th>Sem.</th>
	 					<th>Picture</th>
				  		 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 


				  	$sqq = mysql_query("SELECT * FROM schoolyearsem");
				  	$rrs = mysql_fetch_array($sqq);
				  	$sy = $rrs['schoolyear'];
				  	$sem = $rrs['semester'];

				  		$sql = mysql_query("SELECT * FROM student s, balances b WHERE s.studID = b.studID AND b.schoolyear = '$sy' AND b.semester = '$sem' ORDER BY studLName ASC");
				  	
						while ($row = mysql_fetch_assoc($sql)) {
				  		echo '<tr style="background:lightgray;">';
				  		echo '<td width="5%" align="center"></td>';

				  		if($_SESSION['usertype'] == 'Administrator'){ 
				  		echo '<td id="pit" width="10%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$row['studID'].'"/>
					  		<a href="index.php?view=edit&id='.$row['studID'].'">' .$row['studID'].'</a></td>';
					  	}else{
					  		echo '<td id="upr">'.$row['studID'].'</td>';
					  	}
			 
				    	echo '<td id="upr">'.$row['studLName'].' '.$row['studFName'].', '.$row['studMName'].'</td>';
				  		echo '<td>'.$row['TimeAccount'].'</td>';
				  		echo '<td>'.$row['balanceaccount'].'</td>';
				  		echo '<td>'.$row['studyear'].'</td>';
				  		echo '<td>'.$row['studcourse'].'</td>';
				  		echo '<td>'.$row['schoolyear'].'</td>';
				  		echo '<td>'.$row['semester'].'</td>';
				  		echo '<td><a href="index.php?view=changepf&id='.$row['studID'].'"><img  id="pit" style="width:2em; height:2em;" src="data:image;base64,'.$row['imagefile'].'"></a></td>';
   
				  		echo '</tr>';
				   
				   
				  	} 
				  	?>
				  </tbody>	
				</table>
				
			
			 	<div class="btn-group">
				 <div class="col-md-12">
						  <a  id="print_btn"  style="background:#0a0;color:white;" href="index.php?view=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Add New Student</a>
						    
						 

				  <?php if($_SESSION['usertype'] == 'Administrator'){  ?>
						    <button id="pit" style="background:yellow;color:black;"  class="btn btn-default" id="print_btn" onclick="print()"><span class="glyphicon glyphicon-floppy-save"></span> Print or Save as PDF</button>
						   <button id="print_btn"  style="background:red;color:white;" type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
						<?php } ?>
						</div>

						</div>
</form>

 
				<style>
@media print {
.s {display:none;} #pit {display:none;} #logout {display:none;} #account {display:none;} #pagetitle {display:none;}   #print_btn {display:none;} #search {display:none;} #refresh {display:none;} #sliderpic {display:none;} #menu {display:none;} #truancy1 {display:none;} #truancy2 {display:none;} #head {display:none;} #userinfo1 {display:none;} #userinfo2 {display:none;} #infotech1 {display:none;} #rw {display:none;}  #new {display:none;} #buttons {display:none;} #but {display:none;} #hd1 {display:none;} #hd2 {display:none;} #ft {display:none;} #foot {display:none;} #htt {display:none;}  #updatedel {display:none;}	  #drp {display:none;} 

}
</style>
 