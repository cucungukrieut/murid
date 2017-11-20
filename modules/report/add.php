 <?php
 if($_SESSION['ACCOUNT_TYPE']=='Administrator'){?>


 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

          <fieldset>
            <legend style="color:darkred;">New User Account</legend>
                              
                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idnum">Valid ID #:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="#upr" class="form-control input-sm" id="idnum" name="idnum" placeholder=
                            "Account ID" type="text" value="" required>
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "name">Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="#upr" class="form-control input-sm" id="name" name="name" placeholder=
                            "Account Name" type="text" value="" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "username">User Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="username" name="username" placeholder=
                            "User Name" type="text" value="" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder=
                            "Account Password" type="Password" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
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
                      <label class="col-md-4 control-label" for=
                      "type">Profile Pic:</label>

                      <div class="col-md-8">
                      
  <input type="file" style=" font-size:19px; height:31px;  border: 1px solid #765942;border-radius: 10px; background:red; color:white;" name="image" required/><br/>
 
                      </div>
                    </div>
                  </div>


            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button style="background:#0a0;color:white;" type="submit" name="save" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
                      </div>
                    </div>
                  </div>

              
          </fieldset> 

        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      

        </div><!--End of container-->
<?php
}else{

//message($subjid. ' was absent to this subject ' .$ssub, "error");
redirect ('../../../login/index.php');

}
 ?>
