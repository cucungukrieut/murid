 <?php require_once ("../../includes/initialize.php"); ?>






 <style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>















 
<script type="text/javascript" src="checker/js/jquery.js"></script>
<script type="text/javascript">


  $(document).ready(function() {
        
    
    //the min chars for username
    var min_chars = 0;
    
    //result texts
    var characters_error = 'Minimum amount of chars is 3';
    var checking_html = '<img src="checker/images/loading.gif" /> Checking...';
    
    //when button is clicked
    $('#username').keyup(function(){
      //run the character number check
      if($('#username').val().length < min_chars){
        //if it's bellow the minimum show characters_error text
        $('#username_availability_result').html(characters_error);
      }else{      
        //else show the cheking_text and run the function to check
        $('#username_availability_result').html(checking_html);
        check_availability();
      }
    });
    
    
  });

//function to check username availability 
function check_availability(){
    
    //get the username
    var username = $('#username').val();
    
    //use ajax to run the check
    $.post("../../checker/check_username.php", { username: username },
      function(result){
        //if the result is 1
        if(result == 1){
          //show that the username is available
          $('#username_availability_result').html('<span class="is_available"><b>' +username + '</b> is a valid student ID.</span>');
        }else{
          //show that the username is NOT available
          $('#username_availability_result').html('<span class="is_not_available"> Not a valid student ID</span>');
        }
    });

}  
</script>
<style type='text/css'>
#check_username_availability{
  background: #225384;
  border:1px solid black;
  color:white;
}
 
.is_available{
  color:green;
}
.is_not_available{
  color:red;
}
</style>












<form action="controller.php?action=plain" class="form-horizontal well span9" method="post" >
    <fieldset>
      <h3 style="color:white; background:darkred; height:25px; border-radius:0px 50px 50px 0px; box-shadow:1px 1px 1px 1px #777;" >Plain Printing</h3>
   
  <br>
      <div class="form-group">
        <div class="rows">
             
<div class="col-md-7">

              <input required autofocus style="font-size: 25px; height:40px;"  class="form-control input-sm" id='username' name="id" placeholder="Enter Student ID " 
              type="number">
               
 <div id='username_availability_result'></div>
      
            </div>




<div class="col-md-5">
          
            <div class="col-md-8">
            
            <?php date_default_timezone_set('Asia/Manila');  
 
              echo'<h4 style="color:#0a0;">'.date("D M d, Y g:i a").'</h4>';
              ?>
             
            </div>
          </div>



            </div>
            </div>





      <div class="form-group">
        <div class="rows">
             

   
<div class="col-md-2">
          
              <input  required class="form-control input-sm" id="pages" name="pages" placeholder="Number of page"
               type="number">
            </div>
   



            <div class="col-md-2">
           

              <select class="form-control input-sm" id="psize" name="psize" required>
                 <option>Paper Size</option>
      		
      		
          <option value="Letter">Letter</option>
             <option value="Legal">Legal</option>
         
              </select>
      
          </div>

 
          </div>
      </div>
           
    </fieldset>
 
 <br/>

 
        
		<div class="btn-group">
				
        <button style="background:#0a0;color:white; border-radius: 50px 50px; box-shadow:1px 2px 2px 1px #777;" type="submit"  title='' name="plain" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save </button>

        </div>
    
  </form>


<?php
 
if(isset($_POST['plain'])){

  $id = $_POST['id'];
  $pages = $_POST['pages'];
  $psize = $_POST['psize'];

 date_default_timezone_set('Asia/Manila');  
 $datetime = date("D M d, Y g:i a"); 



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
		
    $sqq = mysql_query("SELECT * FROM schoolyearsem");
            $rrs = mysql_fetch_array($sqq);
            $sy = $rrs['schoolyear'];
            $sem = $rrs['semester'];

            $sql = mysql_query("SELECT * FROM student s, balances b WHERE s.studID = b.studID AND b.schoolyear = '$sy' AND b.semester = '$sem' AND s.studID = '$id'");

$result = mysql_fetch_array($sql);  
$timeaccount = $result['balanceaccount'];
$studtime = hoursToMinutes($timeaccount);




if($studtime <= 0){


 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is Zero Balance!");
                </script>
        <?php

}else{




 
 if($psize == 'Letter'){
	$deducted = (12 * $pages); //multiply to default minutes cost per page
}elseif($psize == 'Legal'){
	$deducted = (18 * $pages); //multiply to default minutes cost per page
}

if($deducted > $studtime){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{
 

$time = ($studtime - $deducted); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($deducted);



$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

  date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Plain', 'Laser',' $dates')");
 
 
 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Plain Printing has been successfully recorded!");
                </script>
        <?php
 }
}
  
}


?>
