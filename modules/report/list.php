
<?php include '../../banner.php';?>


<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>


  <?php if($_SESSION['usertype'] == 'Administrator'){ ?>

<br/>
 <h2 align="left" style="color:Darkred;">Printing Services Report</h2>

			 	<div class="pull-right">
				 <button id="pit" style="background:yellow;color:black;"  class="btn btn-default" id="print_btn" onclick="print()"><span class="glyphicon glyphicon-floppy-save"></span> Print or Save as PDF</button>
				</div><br><br>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example1" class="table table-striped" cellspacing="0">
				
				  <thead>
				  	<tr style="background:darkorange;color:white;">
				  		<th>No.</th>
				  	 
				  		<th>Date Time Acquired</th>
				  		<th>Attendant</th>
				  		<th>Student</th>
				  		<th>No of Page</th>
				  		<th>Time Cost</th>
				  		<th>Paper Size</th>
				  		<th>Printing Type</th>
				  		<th>Printer Type</th>
	 
				  		 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  		$sql = mysql_query("SELECT p.printertype, p.datetimeissued, CONCAT(u.userLName,', ',u.userFName)as userfullname, CONCAT(s.studLName,', ',s.studFName)as studfullname, p.NoOfPage, p.TimeCost, p.PaperSize, p.printingtype 
				  			FROM printingreports p, student s, useraccounts u 
				  			WHERE s.studID = p.studID and u.userID = p.userID");
				  	
						while ($row = mysql_fetch_assoc($sql)) {
				  		echo '<tr style="background:lightgray;">';
				  	 	echo '<td width="5%" align="center"></td>';
				    	echo '<td>'.$row['datetimeissued'].'</td>';
				  		echo '<td id="upr">'.$row['userfullname'].'</td>';
				  		echo '<td id="upr">'.$row['studfullname'].'</td>';
				  		echo '<td>'.$row['NoOfPage'].'</td>';
				  	    echo '<td>'.$row['TimeCost'].'</td>';
				  		echo '<td>'.$row['PaperSize'].'</td>';
				  		echo '<td>'.$row['printingtype'].'</td>';
				  		echo '<td>'.$row['printertype'].'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>	
				</table>
				
			


</form>

 
				<style>
@media print {
.s {display:none;} #pit {display:none;}  .noo {display:none;} #no {display:none;} #logout {display:none;} #account {display:none;} #pagetitle {display:none;}   #print_btn {display:none;} #search {display:none;} #refresh {display:none;} #sliderpic {display:none;} #menu {display:none;} #truancy1 {display:none;} #truancy2 {display:none;} #head {display:none;} #userinfo1 {display:none;} #userinfo2 {display:none;} #infotech1 {display:none;} #rw {display:none;}  #new {display:none;} #buttons {display:none;} #but {display:none;} #hd1 {display:none;} #hd2 {display:none;} #ft {display:none;} #foot {display:none;} #htt {display:none;}  #updatedel {display:none;}	  #drp {display:none;} 

}
</style>


<?php
}else{
	redirect ('../../index.php');
}

?>
 