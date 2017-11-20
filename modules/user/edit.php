 <?php include '../../banner.php';?>
<br/>

 


  <?php if($_SESSION['usertype'] == 'Administrator'){ ?>



 <?php
 

$userid = $_GET['id']; 
 

$sql = mysql_query("SELECT * FROM useraccounts WHERE userID = '$userid'");
$rs = mysql_fetch_array($sql);


 ?>

 <form class="form-horizontal well span9" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">

          <fieldset>
            <h2 style="color:darkred;">Update User Account</h2>
            <hr>



                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "idnum">ID Number:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  class="form-control input-sm" id="idnum" name="idnum" placeholder=
                            "Account ID" type="text" value="<?php echo $userid; ?>" readonly>
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
                            "First Name" type="text" value="<?php echo $rs['userFName']; ?>" required>
                      </div>
                    </div>


                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Last Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="lname" placeholder=
                            "Last Name" type="text" value="<?php echo $rs['userLName']; ?>" required>
                      </div>
                       </div>


                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Middle:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="mname" placeholder=
                            "Optional" type="text" value="<?php echo $rs['userMName']; ?>">
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                     


                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "uname">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="uname" name="uname" placeholder=
                            "Username" type="text" value="<?php echo $rs['username']; ?>" required>
                      </div>
                    </div>
                 
                 <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder=
                            "Password" type="password" value="<?php echo $rs['userpass']; ?>" required>
                      </div>
                    </div>
                 
                  <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "type">Type:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="type" id="type">
                       <option><?php echo $rs['usertype']; ?></option>
                          <option value="Administrator">Administrator</option>
                          <option value="Non-Administrator">Non-Administrator</option>
                  
                        </select> 
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




$sql = mysql_query("SELECT * FROM useraccounts WHERE userID = ' $_SESSION[userID]'");
$rs = mysql_fetch_array($sql);


 ?>

 <form class="form-horizontal well span9" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">

          <fieldset>
            <h2 style="color:darkred;">Update User Account</h2>
            <hr>



                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "idnum">ID Number:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  class="form-control input-sm" id="idnum" name="idnum" placeholder=
                            "Account ID" type="text" value="<?php echo  $_SESSION['userID']; ?>" readonly>
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
                            "First Name" type="text" value="<?php echo $rs['userFName']; ?>" required>
                      </div>
                    </div>


                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Last Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="lname" placeholder=
                            "Last Name" type="text" value="<?php echo $rs['userLName']; ?>" required>
                      </div>
                       </div>


                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Middle:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="mname" placeholder=
                            "Optional" type="text" value="<?php echo $rs['userMName']; ?>">
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                     


                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "uname">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="uname" name="uname" placeholder=
                            "Username" type="text" value="<?php echo $rs['username']; ?>" required>
                      </div>
                    </div>
                 
                 <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder=
                            "Password" type="password" value="<?php echo $rs['userpass']; ?>" required>
                      </div>
                    </div>
                 
                  <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "type">Type:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="type" id="type">
                       <option><?php echo $rs['usertype']; ?></option>
                          <option value="Administrator">Administrator</option>
                          <option value="Non-Administrator">Non-Administrator</option>
                  
                        </select> 
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
}
 
//message($subjid. ' was absent to this subject ' .$ssub, "error");
//redirect ('../../index.php');
 
 ?>
