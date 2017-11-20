

<?php include 'banner.php';?>


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
          $('#username_availability_result').html('<span class="is_available"><b>' +username + '</b> is a valid student ID. (Please fill all the fields bellow)</span>');
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
 


<div class="container">
		<div class="wells">


<form action="index.php?view=attendance" class="form-horizontal well span9" method="post">
    <fieldset>
      <h2 style="color:darkred">Printing Service</h2>
      <hr>

 
      <div class="form-group">
        <div class="rows">
             
<div class="col-md-7">

              <input autofocus style="font-size: 25px; height:40px;"  class="form-control input-sm" id='username' name="id" placeholder="Enter Student ID " 
              type="number">
               
 <div id='username_availability_result'></div>
      
            </div>




<div class="col-md-5">
          
            <div class="col-md-8">
            
            <?php date_default_timezone_set('Asia/Manila');  
 
              echo'<h4 style="color:#0a0;">'.date("D M d, Y g:i a").'</h4>';
              ?>
             
            </div>
          </div>



            </div>
            </div>





      <div class="form-group">
        <div class="rows">
             

   
<div class="col-md-2">
          
              <input  class="form-control input-sm" id="pages" name="pages" placeholder="Number of page"
               type="number">
            </div>
   



            <div class="col-md-2">
           

              <select class="form-control input-sm" id="psize" name="psize" required>
                 <option>Paper Size</option>
      		
      		<option value="short">Short</option>
             <option value="long">Long</option>
         
              </select>
      
          </div>



           <div class="col-md-2">
           

              <select class="form-control input-sm" id="psize" name="psize" required>
                 <option>Select colored/plain</option>
          
          <option value="colored">Colored</option>
             <option value="plain">Plain</option>
         
              </select>
      
          </div>



        <!--<div class="col-md-4">
               
                <div class="col-md-8">
                    <div class="input-group date form_curdate col-md-15" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
                    <input readonly  placeholder="Select Date" class="form-control" size="11" type="text" value=""   name="date" id="date" required >
                    <span style="color:red;" class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
             		<span style="color:#0a0;" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>
           </div>-->



          </div>
      </div>
           
    </fieldset>
 
 <br/>

 
        
		<div class="btn-group">
				
        <button style="background:#0a0;color:white;" type="submit"  title='Save to record' name="generate" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save </button>

        </div>
    
  </form>









</div><!--End of well-->



 


 


<!--GOOGLE MAP API
<div>
<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3618.727010735933!2d91.837871!3d24.907291700000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1404919738144"></iframe>
</div> container-->
	
