
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
 if($_SESSION['usertype']=='Administrator'){?>



<br><br>
<form action="#" class="form-horizontal well span9" method="post" >
    <fieldset>




    <h3 style="color:white; background:darkred; height:25px; border-radius:0px 50px 50px 0px; box-shadow:1px 1px 1px 1px #777;" >Update Schoolyear and Semester</h3>
 
  <br>
      <div class="form-group">
        <div class="rows">
             
 



 <div class="col-md-3">
              <select class="form-control input-sm" id="sy" name="sy" required>
              <option>Select School Year</option>
               
      <?php
        date_default_timezone_set('Asia/Manila');
        $date = date('Y'); 
         
        for($i=0; $i<10; $i++){
          echo '<option value="'.$date .'-'.($date+1).'">'.$date .'-'.($date+1).'</option>';
          $date--;
        }
      ?>
              </select>
            </div>


 

            <div class="col-md-3">
           

              <select class="form-control input-sm" id="sem" name="sem" required>
                 <option>Select Semester</option>
          
          <option value="1st sem">First Semester</option>
             <option value="2nd sem">Second Semester</option>
         
              </select>
      
          </div>









<div class="col-md-5">
          
            <div class="col-md-8">
            

              <button style="background:#0a0;color:white; border-radius: 50px 50px; box-shadow:1px 2px 2px 1px #777;" type="submit" value="" title='' name="addnew" class="btn btn-default"><span class="glyphicon glyphicon-check"></span> Save Account </button>

      
             
            </div>
          </div>





            </div>
            </div>



 
           
    </fieldset>
 
 <br/>






<?php 

if(isset($_POST['addnew'])){



 $sy = $_POST['sy'];
 $sem = $_POST['sem'];
 

  mysql_query("UPDATE schoolyearsem SET schoolyear = '$sy', semester = '$sem'");


  ?>
  <script type="text/javascript">
      alert("Schoolyear and Semester was successfully Updated!");
  </script>

<?php
  //message("New Account was successfully added!", "success");
  redirect('../../index.php'); 
}

?>


















 
    
    
  </form>



  
<?php
}else{

//message($subjid. ' was absent to this subject ' .$ssub, "error");
redirect ('../../index.php');

}
 ?>
 