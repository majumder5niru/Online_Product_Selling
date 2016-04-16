<?php
	session_start();
	include "Library/dbconnect.php";
	include "header_page.php";
	include "footer_page.php";
	include "navbar.php";
	
	//$SUserName = $_SESSION['SUserName'];
	if (!isset($_SESSION['SUserID'])) {
		header("Location: login.php");
		exit;
	}else{
		if (!empty($_SESSION['message'])) {
	      echo '<b> '.$_SESSION['message'].'</b>';
	      unset($_SESSION['message']);
	  }
	}
?>
<form method="post" action="updateuser.php">
	<table class="table table-bordered " >
	<thead>
		<tr>
			<th>#Sl</th>
			<th>Name</th>
			<th>Address</th>
			<th>City</th>
			<th>Phone</th>
			<th>Edit</th>
			<th></th>
		</tr>
	</thead>
	<?php
	$SUserID = $_SESSION['SUserID'];
	//echo $User_ID;
	$res = mysql_query("SELECT * FROM user where User_ID='$SUserID' ");
	$i = 1;
	while ($row = mysql_fetch_array($res))
	{
		extract($row);
	?>
	<tr>
		<td><?php echo $i;?></td>
		<td><input type="text" name="name" value="<?php echo $name;?>"></td>
		<td><input type="text" name="address" value="<?php echo $address;?>"></td>
		<td><input type="text" name="city" value="<?php echo $city;?>"></td>
		<td><input type="text" name="phone" value="<?php echo $phone;?>"></td>
		<td><input type='submit' class="form-control input-sm" name='Edit' value='Edit'></td>
		<td><input type='hidden' name='User_ID'  value="<?php echo $User_ID;?>"></td>
	</tr>
	
	<?php
	$i++;
	}
	?>	
</table>
</form>



<script type="text/javascript">
	function btn2(User_ID) {
	    //alert(did);
	    var mode = '2';
	    $.ajax({
	        type: "POST",
	        url: "user.php",
	        data: {
	            mode: mode,
	            User_ID : User_ID,
	        },
	        success: function (response)
            {   
                //alert ('edit');
                $( '.modal-content' ).html(response);
            }
	    });
	}
</script>