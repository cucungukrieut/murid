
<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>


<?php
if($_SESSION['ACCOUNT_TYPE']=='Administrator'){

$userid = $_GET['id'];

$sql = mysql_query("SELECT  concat(ins.instructlname,', ',ins.instructfname,' ',ins.instructmname)as fullname, us.ACCOUNT_TYPE, ins.instructid, us.ACCOUNT_USERNAME 
                      FROM  instructor ins, useraccounts us WHERE ins.instructid = us.instructid and us.instructid = '$userid'");
            
  $rs = mysql_fetch_array($sql);

echo'<form class="form-horizontal well span4" action="controller.php?action=edit&id='.$userid.'" method="POST">';

 echo'<fieldset>';
           echo' <legend style="color:darkred;">Update Account</legend>';
                              
                  

echo'<div class="form-group">';
echo'<div class="col-md-8">';                //php code for displaying the user profile    
 
    
    $sql = mysql_query("select imagename,imagefile from useraccounts where instructid = '$_GET[id]'");
 
    while($row = mysql_fetch_array($sql)){
    echo '<center><img width=200 height=200" alt="Profile picture" class="art-lightbox" src="data:image;base64,'.$row[1].'"></center>';
    }
  
  echo'<center> <span class="glyphicon glyphicon-cog"> </span> <label> <B><p style="color:#0a0;">'.$rs['ACCOUNT_TYPE'].'</p></B></label></center>';
  
 
echo'</div>';
echo'</div>';




            echo'<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "name">Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="upr" name="name" placeholder=
                            "Account Name" type="text" value="'.$rs['fullname'].'" readonly>
                      </div>
                    </div>
                  </div>';

                  echo'<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "username">User Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="username" name="username" placeholder=
                            "User Name" type="text" value="'.$rs['ACCOUNT_USERNAME'].'" required>
                      </div>
                    </div>
                  </div>';

              echo'<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder=
                            "Account Password" type="Password" value="" required>
                      </div>
                    </div>
                  </div>';


       
              echo'<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "type">Type:</label>

                     <div class="col-md-8">
                       <select class="form-control input-sm" name="type" id="type" required>
                       <option> </option>
                       <option value="Authorized">Authorized</option>
                          <option value="Administrator">Administrator</option>
                          <option value="Non-Administrator">Non-Administrator</option>
           
                        </select> 
                      </div>

                    </div>
                  </div>';
 


//IF NON ADMIN


}else{




$userid = $_SESSION['instructid'];

$sql = mysql_query("SELECT  concat(ins.instructlname,', ',ins.instructfname,' ',ins.instructmname)as fullname, us.ACCOUNT_TYPE, ins.instructid, us.ACCOUNT_USERNAME 
                      FROM  instructor ins, useraccounts us WHERE ins.instructid = us.instructid and us.instructid = '$userid'");
            
  $rs = mysql_fetch_array($sql);

echo'<form class="form-horizontal well span4" action="controller.php?action=edit&id='.$userid.'" method="POST">';

 echo'<fieldset>';
           echo' <legend style="color:darkred;">Update Account</legend>';
                              
                  

echo'<div class="form-group">';
echo'<div class="col-md-8">';                //php code for displaying the user profile    
 
   
    $sql = mysql_query("select imagename,imagefile from useraccounts where instructid = '$_SESSION[instructid]'");
 
    while($row = mysql_fetch_array($sql)){
    echo '<center><img width=200 height=200" alt="Profile picture" class="art-lightbox" src="data:image;base64,'.$row[1].'"></center>';
    }
  
  echo'<center> <span class="glyphicon glyphicon-cog"> </span> <label> <B><p style="color:#0a0;">'.$rs['ACCOUNT_TYPE'].'</p></B></label></center>';
  
 
echo'</div>';
echo'</div>';




            echo'<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "name">Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="upr" name="name" placeholder=
                            "Account Name" type="text" value="'.$rs['fullname'].'" readonly>
                      </div>
                    </div>
                  </div>';

                  echo'<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "username">User Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="username" name="username" placeholder=
                            "User Name" type="text" value="'.$rs['ACCOUNT_USERNAME'].'" required>
                      </div>
                    </div>
                  </div>';

              echo'<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder=
                            "Account Password" type="Password" value="" required>
                      </div>
                    </div>
                  </div>';


}
?>

            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">  
                        <a style="background:#0a0;color:white;" href = "index.php" class="btn btn-default"> Back</a>
       
                        <button style="background:#0a0;color:white;" type="submit" name="update" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Update</button>
                      </div>
                    </div>
                  </div>

              
          </fieldset> 
 
        </form>
      

        </div><!--End of container-->