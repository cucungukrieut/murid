
<?php include '../../banner.php';?>


<br/>


<div class="container" >
		<div class="wells" >


<form action="#" class="form-horizontal well span9" method="post" style="border-radius: 50px 50px; box-shadow:1px 2px 2px 1px #777;">
    <fieldset>


<?php

$sql = mysql_query("SELECT * FROM schoolyearsem");
$res = mysql_fetch_array($sql);

      echo'  <a  id="print_btn"  style="background:#800020;color:white; border-radius:50px 50px; box-shadow:1px 2px 2px 1px #777;" href="../../index.php" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> BACK</a>
       <h2 style="color:darkred;  ">PRINTING SERVICES FOR INKJET PRINTER <span style="color:blue;">( '.$res['schoolyear'].' '.$res['semester'].' )</span></h2>';

?>      
      <hr>
    <div class="btn-group">
         <div class="form-group">
     
  <div class="form-group">
 
  <div class="col-md-12">

<center>

         <a  id="print_btn"  style="background:#0a0;color:white; border-radius:50px 50px; box-shadow:1px 2px 2px 1px #777;" href="?plain" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> PLAIN</a>
         <a  id="print_btn"  style="background:#0a0;color:white; border-radius:50px 50px; box-shadow:1px 2px 2px 1px #777;" href="?colored" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> COLORED</a>
         <a  id="print_btn"  style="background:#0a0;color:white; border-radius:50px 50px; box-shadow:1px 2px 2px 1px #777;" href="?withpics" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> COLORED WITH PICTURE</a>
   </center>

   </div>
         

    </div>
     
          <hr>
   </fieldset>
 

        <?php
        if(isset($_GET['plain'])){
          include('plain.php');
        }
        else if(isset($_GET['colored'])){
          include('colored.php');
        }
        else if(isset($_GET['withpics'])){
          include('withpics.php');
        }
        ?>
           
 
 
 <br/>

 
        

    
  </form>









</div><!--End of well-->
