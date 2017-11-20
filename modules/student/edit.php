 <?php include '../../banner.php';?>
<br/>

 

 <?php


if($_SESSION['usertype']=='Administrator'){

$studid = $_GET['id']; 
 
    $sqq = mysql_query("SELECT * FROM schoolyearsem");
            $rrs = mysql_fetch_array($sqq);
            $sy = $rrs['schoolyear'];
            $sem = $rrs['semester'];

$sql = mysql_query("SELECT * FROM student s, balances b WHERE s.studID = b.studID AND b.schoolyear = '$sy' AND b.semester = '$sem' AND s.studID = '$studid'");
$rs = mysql_fetch_array($sql);


 ?>

 <form class="form-horizontal well span9" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">

          <fieldset>
            <h2 style="color:darkred;">Update Students Account</h2>
            <hr>



                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "idnum">ID Number:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  class="form-control input-sm" id="idnum" name="idnum" placeholder=
                            "Account ID" type="text" value="<?php echo $studid; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">First Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="fname" name="fname" placeholder=
                            "First Name" type="text" value="<?php echo $rs['studFName']; ?>" required>
                      </div>
                    </div>


                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Last Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="lname" placeholder=
                            "Last Name" type="text" value="<?php echo $rs['studLName']; ?>" required>
                      </div>
                       </div>


                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Middle:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="mname" placeholder=
                            "Optional" type="text" value="<?php echo $rs['studMName']; ?>">
                      </div>
                    </div>

                  </div>

                   <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "time">Time:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="time" name="time" placeholder=
                            "Time Account" type="text" value="<?php echo $rs['TimeAccount']; ?>" required>
                      </div>
                    </div>
                 
                  
                  </div>




 

<style>
#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
 


input {
    border: none;
    overflow: auto;
    outline: none;
COLOR:BLACK;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
</style>

                   
 <div class="form-group">
     
 <div class="col-md-8">
         <a style="background:#0a0;color:white;" href = "index.php" class="btn btn-default"> Back</a>
             <button style="background:#0a0;color:white;" type="submit" name="edit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Update</button>
                
         </div>
    </div>
            
            

              
          </fieldset> 

         
        </form>
      
 
<?php
}else{

//message($subjid. ' was absent to this subject ' .$ssub, "error");
redirect ('../../index.php');

}
 ?>
