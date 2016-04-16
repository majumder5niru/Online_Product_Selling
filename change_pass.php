 <?php
 	session_start(); 
	include_once 'Library/dbconnect.php';
	include_once "Library/Library.php";
	include "header_page.php";
	include "footer_page.php";
	include "navbar.php";

	
	$SUserName = $_SESSION['SUserName'];

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

<div class="row">
	<form  method="post" action="update_password.php" >
		<div class="form-group">
			<div class="form-group col-sm-6">
				<label for="password" class="col-sm-4 control-label input-sm">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control input-sm" name="email" >
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="password" class="col-sm-4 control-label input-sm">Old Password</label>
				<div class="col-sm-8">
					<input type="password" class="form-control input-sm" name="password" id="password" placeholder="Password" pattern=".{4,}" title="4 characters minimum" required >
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="new_pass" class="col-sm-4 control-label input-sm">New Password</label>
				<div class="col-sm-8">
					<input type="password" class="form-control input-sm" name="new_pass" id="new_pass" placeholder="Password" pattern=".{4,}" title="4 characters minimum" required >
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="re_pass" class="col-sm-4 control-label input-sm">Re-Enter New Password</label>
				<div class="col-sm-8">
					<input type="password" class="form-control input-sm" name="re_pass" id="re_pass" placeholder="Re-Enter Password"  required >
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<div class="col-md-12" >
				<button type="submit"  class="btn btn-success btn-sm sub pull-right" >Submit</button>
			</div>
		</div>
	</form> 
</div>
<div class="clr"></div>



