
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
 <h2 align="left" style="color:Darkred;">Manage User Account</h2>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" class="table table-striped" cellspacing="0">
				
				  <thead>
				  	<tr style="background:darkorange;color:white;">


				  		<th>No.</th>

				  		<?php if($_SESSION['usertype'] == 'Administrator'){  ?>
				  		<th id="no" width="10%" align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> ID#.</th>
				  		
				  		<?php
				  			}else{

				  			echo '<th>ID#.</th>';

				  		}?>


				  		<th>LName</th>
				  		<th>FName</th>
				  		<th>MName</th>
				  		<th>User Type</th>
	 
				  		 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php   

				  		if($_SESSION['usertype'] == 'Administrator'){ 

				  		$sql = mysql_query("SELECT * FROM useraccounts ORDER BY userLName ASC");
				  	
						while ($row = mysql_fetch_assoc($sql)) {
				  		echo '<tr style="background:lightgray;">';
				  		echo '<td width="5%" align="center"></td>';

				  		echo '<td id="no" width="10%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$row['userID'].'"/>
					  		<a href="index.php?view=edit&id='.$row['userID'].'">' .$row['userID'].'</a></td>';
			 		 
				    	echo '<td id="upr">'.$row['userLName'].'</td>';
				  		echo '<td id="upr">'.$row['userFName'].'</td>';
				  		echo '<td id="upr">'.$row['userMName'].'</td>';
				  		echo '<td>'.$row['usertype'].'</td>';
				   
				   		}

				  	}else{

				  		$sql = mysql_query("SELECT * FROM useraccounts WHERE userID = ' $_SESSION[userID]'");
				  	
						while ($row = mysql_fetch_assoc($sql)) {
				  		echo '<tr style="background:lightgray;">';
				  		echo '<td width="5%" align="center"></td>';

				  		echo '<td>
					  		<a href="index.php?view=edit&id='.$_SESSION['userID'].'">' .$row['userID'].'</a></td>';
			 		 
				    	echo '<td id="upr">'.$row['userLName'].'</td>';
				  		echo '<td id="upr">'.$row['userFName'].'</td>';
				  		echo '<td id="upr">'.$row['userMName'].'</td>';
				  		echo '<td>'.$row['usertype'].'</td>';
				   		
				   		}

				  	} 

				  	?>
				  </tbody>	
				</table>

				
				<?php if($_SESSION['usertype'] == 'Administrator'){ ?>
			 	<div class="btn-group">
				 <div class="col-md-12">
						  <a  id="print_btn"  style="background:#0a0;color:white;" href="index.php?view=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Add New User</a>
						    <button id="no" style="background:yellow;color:black;"  class="btn btn-default" id="print_btn" onclick="print()"><span class="glyphicon glyphicon-floppy-save"></span> Print or Save as PDF</button>
						   <button id="print_btn"  style="background:red;color:white;" type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
						</div>
						</div>
				<?php
			}
			?>

</form>
 
				<style>
@media print {
.s {display:none;} #no {display:none;} #logout {display:none;} #account {display:none;} #pagetitle {display:none;}   #print_btn {display:none;} #search {display:none;} #refresh {display:none;} #sliderpic {display:none;} #menu {display:none;} #truancy1 {display:none;} #truancy2 {display:none;} #head {display:none;} #userinfo1 {display:none;} #userinfo2 {display:none;} #infotech1 {display:none;} #rw {display:none;}  #new {display:none;} #buttons {display:none;} #but {display:none;} #hd1 {display:none;} #hd2 {display:none;} #ft {display:none;} #foot {display:none;} #htt {display:none;}  #updatedel {display:none;}	  #drp {display:none;} 

}
</style>
 