
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
error_reporting(0);
?>
 


<?php 

if($_POST['studid'] <> ""){

$_SESSION['studid'] = $_POST['studid'];


}

?>









<br><br>
<form action="#" class="form-horizontal well span9" method="post" >
    <fieldset>


<?php 



$sql = mysql_query("SELECT * FROM student WHERE studID = '$_SESSION[studid]'");
$res = mysql_fetch_array($sql);


     echo' <h3 style="color:white; background:darkred; height:25px; border-radius:0px 50px 50px 0px; box-shadow:1px 1px 1px 1px #777;" >Add New Account to <span id="upr" style="color:yellow;">( '.$res['studLName'].' '.$res['studFName'].', '.$res['studMName'].' )</span></h3>';
?>
  <br>
      <div class="form-group">
        <div class="rows">
             
 


            <?php


            $sqq = mysql_query("SELECT * FROM schoolyearsem");
            $rrs = mysql_fetch_array($sqq);
            $sy = $rrs['schoolyear'];
            $sem = $rrs['semester'];

            ?>


 <div class="col-md-3">
        <!--       <select class="form-control input-sm" id="sy" name="sy" required>
              <option>Select School Year</option>
               
      <?php
        date_default_timezone_set('Asia/Manila');
        $date = date('Y'); 
         
        for($i=0; $i<10; $i++){
          echo '<option value="'.$date .'-'.($date+1).'">'.$date .'-'.($date+1).'</option>';
          $date--;
        }
      ?>
              </select> -->


                         <input id="upr" class="form-control input-sm" id="lname" name="sy" placeholder=
                            "" type="text" value="<?php echo $sy; ?>" readonly>
            </div>


 

            <div class="col-md-3">
           
<!-- 
              <select class="form-control input-sm" id="sem" name="sem" required>
                 <option>Select Semester</option>
          
          <option value="1st sem">First Semester</option>
             <option value="2nd sem">Second Semester</option>
         
              </select> -->

              <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="sem" placeholder=
                            "" type="text" value="<?php echo $sem; ?>" readonly>
      
          </div>









<div class="col-md-5">
          
            <div class="col-md-8">
            

              <button style="background:#0a0;color:white; border-radius: 50px 50px; box-shadow:1px 2px 2px 1px #777;" type="submit" value="<?php echo $_SESSION['studid']; ?>" title='' name="addnew" class="btn btn-default"><span class="glyphicon glyphicon-check"></span> Add New Account </button>

      
             
            </div>
          </div>





            </div>
            </div>



 
           
    </fieldset>
 
 <br/>






<?php 

if(isset($_POST['addnew'])){





//function converter hours to mins 
function hoursToMinutes($hours) 
{ 
    $minutes = 0; 
    if (strpos($hours, ':') !== false) 
    { 
        // Split hours and minutes. 
        list($hours, $minutes) = explode(':', $hours); 
    } 
    return $hours * 60 + $minutes; 
}
//end

 

//function converter mins to hour
function minutesToHours($minutes) 
{ 
    $hours = (int)($minutes / 60); 
    $minutes -= $hours * 60; 
    return sprintf("%d:%02.0f", $hours, $minutes); 
}  
//end





  $id = $_POST['addnew'];
  $sy = $_POST['sy'];
  $sem = $_POST['sem'];



$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];


$sqll = mysql_query("SELECT balanceaccount as totalaccounts FROM balances WHERE studID = '$id' AND balanceID = '$nid'");
$ress = mysql_fetch_array($sqll);
$totalacct = $ress['totalaccounts'];
 
 
 
$hours =  $totalacct; //students total account time
$totalmins = hoursToMinutes($hours);
 
$minutes = ($totalmins + 1800);
$totaltime = minutesToHours($minutes);





 
  mysql_query("INSERT INTO balances VALUES('','$id','$totaltime','$totaltime', '$sy', '$sem')");

 
  // mysql_query("UPDATE balances SET balanceaccount = '00:00' WHERE studid = '$id' AND schoolyear <> '$sy' AND semester <> '$sm'");


  ?>
  <script type="text/javascript">
      alert("New Account was successfully added!");
  </script>

<?php
  //message("New Account was successfully added!", "success");
  redirect('../student/index.php'); 
}

?>





 
    
    
  </form>



 