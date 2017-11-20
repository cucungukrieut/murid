 <?php include '../../banner.php';?>
<br/>

  


 <form class="form-horizontal well span9" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

          <fieldset>
            <h2 style="color:darkred;">New Students Account</h2>
            <hr>
                              
                  
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "idnum">ID Number:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  class="form-control input-sm" id="idnum" name="idnum" placeholder=
                            "Account ID" type="text" value="" required>
                      </div>
                    </div>




            <?php


            $sqq = mysql_query("SELECT * FROM schoolyearsem");
            $rrs = mysql_fetch_array($sqq);
            $sy = $rrs['schoolyear'];
            $sem = $rrs['semester'];

            ?>

                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">school year:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="" placeholder=
                            "Last Name" type="text" value="<?php echo $sy; ?>" readonly>
                      </div>
                       </div>



                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Semester:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="" placeholder=
                            "Optional" type="text" value="<?php echo $sem; ?>" readonly>
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
                      "fname">Year Level:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <select name="yr">
                          <option>SELECT YEAR LEVEL</option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                           <option>4</option>
                           <option>5</option>
                         </select>
                      </div>
                    </div>


                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Course</label>

                      <div class="col-md-8">
                      <select name="course">
                       <option>SELECT COURSE</option>
                           <option>BsInfoTech</option>
                           <option>BSHRM</option>
                           <option>BSSM</option>
                           <option>BSED</option>
                           <option>BSMT</option>
                           <option>BSME</option>
                           <option>BSHTE</option>
                           <option>BSIT</option>
                           <option>BEED</option>
                           <option>BSEE</option>
                           <option>BSIE</option>
                           <option>BSMar-E</option>
                           <option>BSMar-T</option>
                           <option>AB-Com</option>
                         </select>
                      </div>
                       </div>

                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "time">Time:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" >
                         <input class="form-control input-sm" id="time" name="time" placeholder=
                            "Time Account" type="number" value="30" readonly>
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
      
 
 