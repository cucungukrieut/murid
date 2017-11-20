 <?php include '../../banner.php';?>
<br/>

 

 <?php
 //if($_SESSION['ACCOUNT_TYPE']=='Administrator' or $_SESSION['ACCOUNT_TYPE']=='Authorized'){?>


 <form class="form-horizontal well span9" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

          <fieldset>
            <h2 style="color:darkred;">New Users Account</h2>
            <hr>
                              
                  
            

                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">First Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="fname" name="fname" placeholder=
                            "First Name" type="text" value="" required>
                      </div>
                    </div>


                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Last Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="lname" placeholder=
                            "Last Name" type="text" value="" required>
                      </div>
                       </div>


                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Middle:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="mname" placeholder=
                            "Optional" type="text" value="">
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
                            "Time Account" type="text" value="" required>
                      </div>
                    </div>
                 
                 <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder=
                            "Time Account" type="password" value="" required>
                      </div>
                    </div>
                 
                  <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "type">Type:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="type" id="type">
                       <option>Select User Type</option>
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
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "image">Profile Pic:</label>

                      <div class="col-md-8">
                      
  <input type="file" style=" font-size:19px; height:28.5px;  border: 1px solid #765942;border-radius: 10px; background:red; color:white;" name="image" required/><br/>
 
                      </div>
                    </div>
                  </div>

 <div class="form-group">
     
  <div class="col-md-8">
          <button style="background:#0a0;color:white;" type="submit" name="save" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
             <button style="background:#0a0;color:white;" type="submit" name="saveandadd" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save and Add New</button>
                
         </div>
    </div>
            
            

              
          </fieldset> 

         
        </form>
      
 
<?php
//}else{

//message($subjid. ' was absent to this subject ' .$ssub, "error");
//redirect ('../../../login/index.php');

//}
 ?>
