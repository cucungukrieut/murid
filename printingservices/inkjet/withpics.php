 
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




  




<form action="index.php?view=attendance" class="form-horizontal well span9" method="post">



    <fieldset>
      <h3 style="color:white; background:darkred; height:25px; border-radius:0px 50px 50px 0px; box-shadow:1px 1px 1px 1px #777;">Colored with Picture Printing</h3>
   
 <br>
      <div class="form-group">
        <div class="rows">
             
<div class="col-md-7">

              <input autofocus style="font-size: 25px; height:40px;"  class="form-control input-sm" id='username' name="id" placeholder="Enter Student ID " 
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
          
              <input  class="form-control input-sm" id="pages" name="pages" placeholder="Number of page"
               type="number">
            </div>
   



            <div class="col-md-2">
           

              <select class="form-control input-sm" id="psize" name="psize" required>
                 <option>Paper Size</option>
      		
      
          <option value="Letter">Letter</option>
             <option value="Legal">Legal</option>
         
              </select>
      
          </div>



      <div class="col-md-2">
           

              <select class="form-control input-sm" id="csize" name="csize" required>
                 <option>Colored Size</option>
          
          <option value="oneeight">1/8</option>
             <option value="onefourth">1/4</option>
              <option value="onehalf">1/2</option>
             <option value="threefourth">3/4</option>
              <option value="whole">Whole</option>
         
              </select>
      
          </div>



           <!--  <div class="col-md-4">
               
                <div class="col-md-8">
                    <div class="input-group date form_curdate col-md-15" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
                    <input readonly  placeholder="Select Date" class="form-control" size="11" type="text" value=""   name="date" id="date" required >
                    <span style="color:red;" class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
             		<span style="color:#0a0;" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>
           </div>-->



          </div>
      </div>
           
    </fieldset>
 
 <br/>

 
        
		<div class="btn-group">
				
        <button style="background:#0a0;color:white; border-radius: 50px 50px; box-shadow:1px 2px 2px 1px #777;" type="submit"  title='Save to record' name="withpic" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save </button>

        </div>
    
  </form>











<?php
 
if(isset($_POST['withpic'])){

  $id = $_POST['id'];
  $pages = $_POST['pages'];
  $psize = $_POST['psize'];
   $csize = $_POST['csize'];


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
$_SESSION['studtime'] = hoursToMinutes($timeaccount);


 

if($_SESSION['studtime'] <= 0){


 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php

}else{

 


/*********************************************new logic**************************************************/




 if($psize == 'Letter'){

/*********************************Short papersize****************************/

    if($csize == 'oneeight'){



   $deducted = ((6 + 12) * $pages); //multiply to default minutes cost per page

   $totald = $deducted;
 


if($totald > $_SESSION['studtime']){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{
 

$time = ($_SESSION['studtime'] - $totald); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($totald);



$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

 date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Colored with pic', 'Inkjet',' $dates')");
  
  echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Colored Printing has been successfully recorded!");
                </script>
        <?php
 }




    }elseif($csize == 'onefourth'){




       $deducted = ((6 + 18)* $pages); //multiply to default minutes cost per page
  
   $totald = $deducted;



 if($totald > $_SESSION['studtime']){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{
 
$time = ($_SESSION['studtime'] - $totald); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($deducted);


$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Colored with pic', 'Inkjet',' $dates')");
   
   echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Colored Printing has been successfully recorded!");
                </script>
        <?php
 }



}elseif($csize == 'onehalf'){


 
      


   $deducted = ((6 + 24)* $pages); //multiply to default minutes cost per page
 
   $totald = $deducted;
 

  if($totald > $_SESSION['studtime']){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{


$time = ($_SESSION['studtime'] - $totald); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($deducted);

 

$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Colored with pic', 'Inkjet',' $dates')");
    
     echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Colored Printing has been successfully recorded!");
                </script>
        <?php
 } 









}elseif($csize == 'threefourth'){




   $deducted = ((6 + 30)* $pages); //multiply to default minutes cost per page
 
   $totald = $deducted;
 

  if($totald > $_SESSION['studtime']){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{


$time = ($_SESSION['studtime'] - $totald); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($deducted);


$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Colored with pic', 'Inkjet',' $dates')");
   
     echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Colored Printing has been successfully recorded!");
                </script>
        <?php
 } 



      
    }elseif($csize == 'whole'){




       $deducted = ((6 + 42) * $pages); //multiply to default minutes cost per page
 
   $totald = $deducted;
 

   if($totald > $_SESSION['studtime']){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{
 
$time = ($_SESSION['studtime'] - $totald); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($deducted);

 

$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

 date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Colored with pic', 'Inkjet',' $dates')");
  
       echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Colored Printing has been successfully recorded!");
                </script>
        <?php
 } 
  


      
    }


/*********************************End Short papersize****************************/












 }elseif($psize == 'Legal'){


/*********************************Long papersize****************************/

    if($csize == 'oneeight'){


       $deducted = ((12 + 18) * $pages); //multiply to default minutes cost per page
 
   $totald = $deducted;



 if($totald > $_SESSION['studtime']){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{
   
 
$time = ($_SESSION['studtime'] - $totald); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($deducted);

 

$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Colored cubrid_connect_with_url(conn_url) pic', 'Inkjet',' $dates')");
   

   echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Colored Printing has been successfully recorded!");
                </script>
        <?php
 }
  



    }elseif($csize == 'onefourth'){


      $deducted= ((12 + 24) * $pages); //multiply to default minutes cost per page
 
   $totald = $deducted;
 



  if($totald > $_SESSION['studtime']){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{

$time = ($_SESSION['studtime'] - $totald); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($deducted);

 

$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Colored cubrid_connect_with_url(conn_url) pic', 'Inkjet',' $dates')");
   
    echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Colored Printing has been successfully recorded!");
                </script>
        <?php
 }










  }elseif($csize == 'onehalf'){


      $deducted= ((12 + 30) * $pages); //multiply to default minutes cost per page
 
   $totald = $deducted;
 



  if($totald > $_SESSION['studtime']){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{

$time = ($_SESSION['studtime'] - $totald); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($deducted);


$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

 date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Colored with pic', 'Inkjet',' $dates')");
  
    echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Colored Printing has been successfully recorded!");
                </script>
        <?php
 }






    
      
    }elseif($csize == 'threefourth'){


       $deducted = ((12 + 42) * $pages); //multiply to default minutes cost per page

   $totald = $deducted;
 

  if($totald > $_SESSION['studtime']){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{

$time = ($_SESSION['studtime'] - $totald); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($deducted);


$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Colored with pic', 'Inkjet',' $dates')");
  
      echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Colored Printing has been successfully recorded!");
                </script>
        <?php
 } 



      
    }elseif($csize == 'whole'){



       $deducted = ((12 + 54) * $pages); //multiply to default minutes cost per page
 
   $totald = $deducted;



     if($totald > $_SESSION['studtime']){

 echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Time Account is not Enough!");
                </script>
        <?php
 
}

else{
 
 
$time = ($_SESSION['studtime'] - $totald); //subtract total account time
$timeleft = minutesToHours($time);
$timecost = minutesToHours($deducted);

 

$sqllx = mysql_query("SELECT MAX(balanceID)as nid FROM balances WHERE studID = '$id'");
$ressx = mysql_fetch_array($sqllx);
$nid = $ressx['nid'];

 mysql_query("UPDATE balances SET balanceaccount = '$timeleft' WHERE studID = '$id' AND balanceID = '$nid' AND schoolyear = '$sy' AND semester = '$sem' ");

date_default_timezone_set('Asia/Manila');  
 $dates = date("Y-m-d");
mysql_query("INSERT INTO `printingreports` (`repID`, `datetimeissued`, `userID`, `studID`, `NoOfPage`,`TimeCost`, `PaperSize`,`printingtype`, `printertype`, `daily`) VALUES ('', '$datetime', '$_SESSION[userID]', '$id', '$pages','$timecost', '$psize', 'Colored with pic', 'Inkjet',' $dates')");
  

        echo '<meta http-equiv="Refresh" content="0">';
    ?>
      <script type="text/javascript">
                alert("Colored Printing has been successfully recorded!");
                </script>
        <?php
 } 


      
    }



/*********************************End Long papersize****************************/


 }










/*******************************************end new logic**********************************************/




  
} 




}

  
?>
