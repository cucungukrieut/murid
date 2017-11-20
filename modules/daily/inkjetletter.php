 







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
 <h2 align="left" style="color:Darkred;">(INKJET) Paper Total Cost in Letter</h2>

             <div class="pull-right">
                 <button id="pit" style="background:yellow;color:black;"  class="btn btn-default" id="print_btn" onclick="print()"><span class="glyphicon glyphicon-floppy-save"></span> Print or Save as PDF</button>
              </div><br><br>

          <form action="" Method="POST">            
        <table id="example1" class="table table-striped" cellspacing="0">
        
          <thead>
            <tr style="background:darkorange;color:white;">
        
             <th>Year</th>
             <th>Month</th>
              <th>Day</th>
              <th>Letter</th>
           
    
   
   
               
            </tr> 
          </thead>
          <tbody>
            <?php 
              
$sql = mysql_query("SELECT YEAR(daily) AS years, MONTH(daily) AS months, DAY(daily) AS days, SUM(NoOfPage) AS totalshrt
FROM printingreports WHERE PaperSize = 'Letter' AND printertype = 'Inkjet' GROUP BY YEAR(daily), MONTH(daily), DAY(daily) ORDER BY DAY(daily) Asc");

 
while($rs1 = mysql_fetch_array($sql)){

            echo '<tr style="background:lightgray;">';
 
            echo'<td>'.$rs1['years'].' </td>';
            echo'<td>'.$rs1['months'].' </td>';
            echo'<td>'.$rs1['days'].' </td>';
               
                   if($rs1['totalshrt'] <> ''){
                    echo '<td id="upr"  >'. $rs1['totalshrt'].'</td>';
                  }else{
                     echo '<td id="upr"  >0</td>';
                  }

              
                     
                          echo '</tr>';
                     
          }
            ?>
          </tbody>  
        </table>
        
      
  <br>
  <?php
  $total = mysql_query("SELECT SUM(NoOfPage) AS total
  FROM printingreports WHERE PaperSize = 'Letter' AND printertype = 'Inkjet'");
  $totalletter = mysql_fetch_array($total);
  echo "<b>Total Letter Size : </b>".$totalletter['total'];  
?>

</form>


 
 
        <style>
@media print {
.s {display:none;} #pit {display:none;}  .noo {display:none;} #no {display:none;} #logout {display:none;} #account {display:none;} #pagetitle {display:none;}   #print_btn {display:none;} #search {display:none;} #refresh {display:none;} #sliderpic {display:none;} #menu {display:none;} #truancy1 {display:none;} #truancy2 {display:none;} #head {display:none;} #userinfo1 {display:none;} #userinfo2 {display:none;} #infotech1 {display:none;} #rw {display:none;}  #new {display:none;} #buttons {display:none;} #but {display:none;} #hd1 {display:none;} #hd2 {display:none;} #ft {display:none;} #foot {display:none;} #htt {display:none;}  #updatedel {display:none;}    #drp {display:none;} 

}
</style>


 



 
