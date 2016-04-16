 <?php

 	session_start();
	include_once 'Library/dbconnect.php';
	include_once "Library/Library.php";
	include "header_page.php";
	include "footer_page.php";
	include "navbar.php";

	if (!empty($_SESSION['message'])) {
	    echo '<b> '.$_SESSION['message'].'</b>';
	    unset($_SESSION['message']);
	}
?>


<div class="row">
	<form  method="post" action="saveuser.php" >
		<div class="form-group">
			<div class="form-group col-sm-6">
				<label for="name" class="col-sm-4 control-label input-sm">Name</label>
				<div class="col-sm-8">
					<input type="hidden" name="message" >
					<input type="hidden" name="User_ID" >
					<input type="hidden" name="type" value="1">
					<input type="text" class="form-control input-sm" name="name" id="name"  value="<?php  if(isset($_POST['name'])) echo $_POST['name']; ?>" placeholder="Name"  required>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="address" class="col-sm-4 control-label input-sm">Address</label>
				<div class="col-sm-8">
					<input type="text" class="form-control input-sm" name="address" id="address" value="<?php  if(isset($_POST['address'])) echo $_POST['address']; ?>"placeholder="Address" >
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="city" class="col-sm-4 control-label input-sm">City</label>
				<div class="col-sm-8">
					<input type="text" class="form-control input-sm" name="city" id="city" value="<?php  if(isset($_POST['city'])) echo $_POST['city']; ?>"placeholder="City" >
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="email" class="col-sm-4 control-label input-sm">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control input-sm" name="email" id="email" value="<?php  if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email"  required>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="phone" class="col-sm-4 control-label input-sm">Phone</label>
				<div class="col-sm-8">
					<input type="text" class="form-control input-sm" name="phone" id="phone" value="<?php  if(isset($_POST['phone'])) echo $_POST['phone']; ?>" placeholder="Phone" >
				</div>
			</div>
			
			<div class="form-group col-sm-6">
				<label for="user_name" class="col-sm-4 control-label input-sm">Username</label>
				<div class="col-sm-8">
					<input type="text" class="form-control input-sm" name="user_name" id="user_name" placeholder="Username" value="<?php  if(isset($_POST['user_name'])) echo $_POST['user_name']; ?>" required>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="password" class="col-sm-4 control-label input-sm">Password</label>
				<div class="col-sm-8">
					<input type="password" class="form-control input-sm" name="password" id="password" placeholder="Password" pattern=".{4,}" title="4 characters minimum" required >
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="re_pass" class="col-sm-4 control-label input-sm">Re-Enter Password</label>
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



