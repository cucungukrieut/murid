
<?php include '../../banner.php';?>


<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>















 
<script type="text/javascript" src="../../checker/js/jquery.js"></script>
<script type="text/javascript">


  $(document).ready(function() {
        
    
    //the min chars for username
    var min_chars = 0;
    
    //result texts
    var characters_error = 'Minimum amount of chars is 3';
    var checking_html = '<img src="../../checker/images/loading.gif" /> Checking...';
    
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
    $.post("../../checker/check_username.php", { username: username },
      function(result){
        //if the result is 1
        if(result == 1){
          //show that the username is available
          $('#username_availability_result').html('<span class="is_available"><b>' +username + '</b> is a valid student ID.</span>');
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



















<br><br>
<form action="index.php?view=balancelist" class="form-horizontal well span9" method="post" >
    <fieldset>
      <h3 style="color:white; background:darkred; height:25px; border-radius:0px 50px 50px 0px; box-shadow:1px 1px 1px 1px #777; outline:none;" >Checking Balances</h3>
   
  <br>
      <div class="form-group">
        <div class="rows">
             
<div class="col-md-7">

              <input required autofocus style="font-size: 25px; height:40px;"  class="form-control input-sm" id='username' name="id" placeholder="Enter Student ID " 
              type="number">
               
 <div id='username_availability_result'></div>
      
            </div>




<div class="col-md-5">
          
            <div class="col-md-8">
            

              <button style="background:#0a0;color:white; border-radius: 50px 50px; box-shadow:1px 2px 2px 1px #777; outline:none;" type="submit"  title='' name="plain" class="btn btn-default"><span class="glyphicon glyphicon-check"></span> Check Balance </button>

      
             
            </div>
          </div>



            </div>
            </div>



 
           
    </fieldset>
 
 <br/>

 
    
    
  </form>

 