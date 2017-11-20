

<?php include '../../banner.php';?>


<br/>

 
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
    $.post("checker/check_username.php", { username: username },
      function(result){
        //if the result is 1
        if(result == 1){
          //show that the username is available
          $('#username_availability_result').html('<span class="is_available"><b>' +username + '</b> is a valid student ID. (Please fill all the fields below)</span>');
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
 


<div class="container" >
		<div class="wells" >


<form action="#" class="form-horizontal well span9" method="post" style="border-radius: 50px 50px; box-shadow:1px 2px 2px 1px #777;">
    <fieldset>


<?php

$sql = mysql_query("SELECT * FROM schoolyearsem");
$res = mysql_fetch_array($sql);

      echo'<h2 style="color:darkred;  ">Daily Total Paper Cost <span style="color:blue;">( '.$res['schoolyear'].' '.$res['semester'].' )</span></h2>';

?>      
      <hr>
    <div class="btn-group">
         <div class="form-group">
     
  <div class="form-group">
 
  <div class="col-md-12">

<center>

         <a  id="print_btn"  style="background:#0a0;color:white; border-radius:50px 50px; box-shadow:1px 2px 2px 1px #777;" href="index.php?view=inkjetletter" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> (Inkjet) Paper Cost in Letter Size</a>
         <a  id="print_btn"  style="background:#0a0;color:white; border-radius:50px 50px; box-shadow:1px 2px 2px 1px #777;" href="index.php?view=inkjetlegal" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> (Inkjet) Paper Cost in Legal Size</a>
         <a  id="print_btn"  style="background:#0a0;color:white; border-radius:50px 50px; box-shadow:1px 2px 2px 1px #777;" href="index.php?view=laserletter" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> (Laser) Paper Cost in Letter Size</a>
         <a  id="print_btn"  style="background:#0a0;color:white; border-radius:50px 50px; box-shadow:1px 2px 2px 1px #777;" href="index.php?view=laserlegal" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> (Laser) Paper Cost in Legal Size</a>
       </center>

   </div>
         

    </div>
     
          <hr>
   </fieldset>
 

    
 <br/>

 
        

    
  </form>









</div><!--End of well-->



 


 


<!--GOOGLE MAP API
<div>
<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3618.727010735933!2d91.837871!3d24.907291700000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1404919738144"></iframe>
</div> container-->
	
