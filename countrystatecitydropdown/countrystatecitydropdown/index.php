<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		  <script>
function getstate(val) {
	//alert(val);
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'coutrycode='+val,
	success: function(data){
		$("#statelist").html(data);
	}
	});
}

function getcity(val) {
	//alert(val);
	$.ajax({
	type: "POST",
	url: "get_city.php",
	data:'statecode='+val,
	success: function(data){
		$("#city").html(data);
	}
	});
}

</script>	
	</head>
	<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
        <a class="navbar-brand" rel="home" href="#">PHP GURUKUL | Programming Blog</a>
		
	</div>

</nav>

<div class="container-fluid">
  
  <!--left-->
 <div class="col-sm-2">
      
    	<div class="panel panel-default">
         
         	<div class="panel-body"></div>
        </div>
        <hr>
       
		 </div>
      
     
 <!--/left-->
  
  <!--center-->
  <div class="col-sm-8">
    <div class="row">
      <div class="col-xs-12">
        <h3>jQuery Dependent DropDown List – Country, States and City </h3>
		<hr >
		<form name="insert" action="" method="post">
  <table width="100%" height="117"  border="0">
<tr>
    <th width="27%" height="63" scope="row">Country :</th>
    <td width="73%"><select onChange="getstate(this.value);"  name="country" id="country" class="form-control" >
                    <option value="">Select</option>
                   								<?php $query =mysqli_query($con,"SELECT * FROM country");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['id'];?>"><?php echo $row['countryname'];?></option>
<?php
}
?>
                    </select></td>
  </tr>

  <tr>
    <th width="27%" height="63" scope="row">State :</th>
    <td width="73%">
    	<select   name="statelist" id="statelist" onChange="getcity(this.value);" class="form-control" >
                    <option value="">Select State</option>
                 
                   								
                    </select></td>
  </tr>
  <tr>
    <th scope="row">City :</th>
    <td><select name="city" id="city" class="form-control">
<option value="">Select City</option>
</select></td>
  </tr>
 
</table>



     </form>
 
      </div>
    </div>
    <hr>
        
   
  </div><!--/center-->

  <!--right-->
  <div class="col-sm-2">
      
    	<div class="panel panel-default">
         	
         	<div class="panel-body"></div>
        </div>
        <hr>
   
  </div>
<!--/right-->
  <hr>
</div><!--/container-fluid-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>