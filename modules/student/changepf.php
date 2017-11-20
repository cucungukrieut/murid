 <?php include '../../banner.php';?>
<br/>

<?php
$studid = $_GET['id']; 

 
$sql1 = mysql_query("SELECT CONCAT(studFName,' ',studLName)as fullname FROM student WHERE studID = '$studid'");
$res = mysql_fetch_array($sql1);
 
?>


  <form method="post" enctype="multipart/form-data">
  <fieldset>
            <h2><legend style="color:darkred;">Update <b style="color:#0a0;"><?php echo $res['fullname']; ?>'s</b> Profile Picture</legend></h2>
                              
            <div class="form-group">
                    <div class="col-md-8">
                            

<?php
$sql = mysql_query("SELECT * FROM student WHERE studID = '$studid'");
 
    while($row = mysql_fetch_array($sql)){
    echo ' <img  id="pit" style="width:8em; height:8em;"  title="click to update Profile picture" class="art-lightbox" src="data:image;base64,'.$row['imagefile'].'"> ';
    }

?>

</div>
</div>

                  <div class="form-group">
                    <div class="col-md-8">
                      
 
  <input type="file" style=" font-size:19px; height:29px;  border: 1px solid #765942;border-radius: 10px; background:red; color:white;" name="image" required/><br/>
 
                       
                    </div>
                  </div>



            
             <div class="form-group">
                    <div class="col-md-8">
                     
                      <div class="col-md-8">
                       <a style="background:#0a0;color:white;" href = "index.php" class="btn btn-default"> Back</a>
                        <button style="background:#0a0;color:white;" type="submit" name="uploadf" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-up"></span> Upload</button>
                      </div>
                    </div>
                  </div>

  </fieldset>

	<!--<input type="submit"  style=" font-size:19px; height:31px; width:10%; border: 1px solid #765942;border-radius: 10px; background:#0a0; color:white;" class="art-button" name="uploadf" value="Upload"/>

 <div id="tmp"></div>-->
</form>
		
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



<?php
if(isset($_POST['uploadf'])){
	
	if(getimagesize($_FILES['image']['tmp_name'])== FALSE)
	{
	echo "Please select an image";
	}
	else
	{
		$image= addslashes($_FILES['image']['tmp_name']);
		$name= addslashes($_FILES['image']['name']);
		$image= file_get_contents($image);
		$image= base64_encode($image);

	 
	mysql_query("UPDATE `student` SET `imagename`='$name',`imagefile`='$image' where studID = '$studid'");
	  
			
			?>
			 <script type="text/javascript">
                alert("User Profile has been successfully updated!");
                </script>
                <?php

			redirect ('index.php');
	}
}
?>

		






	  
	  

