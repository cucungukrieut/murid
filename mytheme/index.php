

<?php
     
 
    if(!isset($_SESSION['userID'])) {
        header("location: index.php");
    }
    elseif(isset($_GET['logout'])){
        unset($_SESSION['index.php']);
        session_destroy();
        ?>
        <script type="text/javascript">
        window.location = "<?php echo WEB_ROOT; ?>login.php";
        </script>
        <?php
       // header("Location: login.php");//redirecting to login form when session is destroyed
        exit;
    }
?>





 
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MONITORING OF STUDENTS CYBER ACCOUNT BALANCES</title>

	<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>assets/demo.css">
	<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>assets/sidebar-collapse.css">
	<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>tools/font-awesome.min.css">
	<link href='<?php echo WEB_ROOT; ?>tools/fontcookie.css' rel='stylesheet' type='text/css'>


<script src="<?php echo WEB_ROOT; ?>js/jquery-1.10.2.js"></script>
<script src="<?php echo WEB_ROOT; ?>js/jquery-ui.js"></script>
<script src="<?php echo WEB_ROOT; ?>js/sample.js"></script>
<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/jquery-ui.css" type="text/css" media="all">
 
<link href="<?php echo WEB_ROOT; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo WEB_ROOT; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="<?php echo WEB_ROOT; ?>css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">

$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 1
        } ],
        "order": [[ 3, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>


<link rel="shortcut icon" href="<?php echo WEB_ROOT; ?>images/icon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/design.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>fonts/icons1/flaticon.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>fonts/icons2/flaticon.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>fonts/icons3/flaticon.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>fonts/icons4/flaticon.css"> 

<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/styles.css" />


</head>

<body>


<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>



	<aside class="sidebar-left-collapse">





<div>
<a id="pit" href="<?php echo WEB_ROOT; ?>modules/user/index.php?view=changepf">
<?php  

  displayimage();
  function displayimage()
  {   
    $sql = mysql_query("SELECT imagename,imagefile from useraccounts where userID = '$_SESSION[userID]'");
 
    while($row = mysql_fetch_array($sql)){
    echo '<center><img  id="pit" style="width:8em; height:8em; border-radius: 50px 50px; box-shadow:0px 2px 2px 1px #777; " title="click to update Profile picture" class="art-lightbox" src="data:image;base64,'.$row[1].'"></center>';
    }
  }
 
 
?>  </div></a>
 
</br>
<center>
<?php

  $sql = mysql_query("SELECT concat(userFName)as FullName, usertype
   FROM useraccounts WHERE userID ='$_SESSION[userID]'");
  $rs = mysql_fetch_array($sql);

  echo' <span id="pit" id="upr" class="glyphicon glyphicon-user" style="color:white;"> </span> <label id ="upr" class="noo"  style="color:white;">'.$rs['FullName'].'</label><br/>
              

     <span id="pit" class="glyphicon glyphicon-cog" style="color:white;"> </span> <label id="pit" style="color:white;">'.$rs['usertype'].'</label><br/>';
               
?>

</center>

<hr>
 
  
		<div id="pit" class="sidebar-links">

        <div class="link-green">

                 <a href="<?php echo WEB_ROOT; ?>index.php">
                     <span class="flaticon-home153" style="color:limegreen;"></span> Home
                </a>
              

            </div>


			
			


            <div class="link-yellow">

                <a href="<?php echo WEB_ROOT; ?>modules/student/index.php">
                    <span class="flaticon-user168" style="color:yellow;"></span> Student
                </a>
                </div>




   <div class="link-red">

                <a href="<?php echo WEB_ROOT; ?>modules/balance/index.php">
                    <span class="flaticon-checked21" style="color:#009acd;"></span> Balance
                </a>
                </div>







          
           <!-- <div class="link-red">

                <a href="<?php echo WEB_ROOT; ?>modules/Items/index.php">
                     <span class="flaticon-check84" style="color:red;"></span> Items
                </a>
            </div>
 
			

 
            <div class="link-blue">

				<a href="<?php echo WEB_ROOT; ?>modules/OrderedItems/index.php">
					 <span class="flaticon-poker9" style="color:darkblue;"></span> Ordered List
				</a>
			</div>
         
-->   
  <?php if($_SESSION['usertype'] == 'Administrator'){ ?>

            <div class="link-red">

                <a href="<?php echo WEB_ROOT; ?>modules/report/index.php">
                    <span class="flaticon-calendar68" style="color:red;"></span> Report
                </a>
            </div>


        <?php 
      }
      ?>



                  <div class="link-red">

                <a href="<?php echo WEB_ROOT; ?>modules/daily/index.php">
                    <span class="flaticon-calendar68" style="color:red;"></span> Daily
                </a>
            </div>

    

        <div class="link-black">

        <a href="<?php echo WEB_ROOT; ?>modules/user/index.php">
          <!--<i class="fa fa-map-marker"></i>Places-->
                    <span class="flaticon-gear74" style="color:orange;"></span> Account
        </a>
  
      </div>


 

 <?php
 if($_SESSION['usertype']=='Administrator'){?>

   <div class="link-red">

                <a href="<?php echo WEB_ROOT; ?>modules/syandsem/index.php">
                    <span class="flaticon-gear39" style="color:#ffc0cb;"></span> Setting
                </a>
                </div>

<?php
}
?>


          <div class="link-black">

        <a href="?logout">
          <!--<i class="fa fa-map-marker"></i>Places-->
                    <span class="flaticon-pencil125" style="color:black;"></span> Logout
        </a>
  
      </div>

		</div>

	</aside>



 
<!--Main Content-->
<div class="main-content">
 
<?php require_once $content;?>
<br/> 


<!--Footer Here-->

      <footer style="background:transparent;">
      <?php
       date_default_timezone_set('Asia/Manila');
        $date = date('Y'); 
        ?>
        <hr>
           
        <p id="no"    align="center" style="color:black;"><strong> &copy; 2015  Monitoring of Students Cyber Account Balances  |  From Palompon Institute of Technology</p>

</footer>

</div>
<!--end of Footer-->



                  

			 
		</div>

	</div>



</body>



 
     <script src="<?php echo WEB_ROOT; ?>js/tooltip.js"></script>
     <script src="<?php echo WEB_ROOT; ?>js/bootstrap.min.js"></script>
     <script src="<?php echo WEB_ROOT; ?>js/popover.js"></script>
     <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
     <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
    
    <script type="text/javascript">
  $('.form_curdate').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_bdatess').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
</script>
<script>
  function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
   function checkNumber(textBox){
        while (textBox.value.length > 0 && isNaN(textBox.value)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }
      //
      function checkText(textBox)
      {
        var alphaExp = /^[a-zA-Z]+$/;
        while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }

      
  </script>



</html>
