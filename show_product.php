<?php
	include "header_page.php";
	include "footer_page.php";
	include 'Library/dbconnect.php';
	include "navbar.php";
	session_start();
	error_reporting(0);
	if (!isset($_SESSION['SUserID'])) {
		header("Location: login.php");
		exit;
	}
?>
<html>
	<body>
		<center><h3>You can Buy this product.</h3></center>
		<table class="table table-bordered table-condensed table-striped table-hover" id="tableData">
			<thead>
				<tr>
					<th>SL.</th>
					<th>Product Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Description</th>
					<th>Buy</th>
				</tr>
			</thead>
			<?php
			
			$res = mysql_query("SELECT product_id,product_name,product_image,price,description FROM products");
			$i = 1;
			while ($row = mysql_fetch_array($res))
			{	
				//$s = $row['product_image'];
				//header("Content-type: image/jpeg");
				//echo $row['product_image'];
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['product_name'];?></td>
				<td><img src="data:image/jpeg;base64,<?php echo base64_encode($s); ?>" /></td>
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['description'];?></td>
				<td>
					<form action="buy.php" method="post">
						<button class="btn btn-primary btn-xs" > Buy</button>
						<input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
					</form>
				</td>
			</tr>
			
			<?php
				$i++;
			}
			?>	
		</table>
	</body>
</html>

<script type="text/javascript">
	
	    $(document).ready(function() {
	        $('#tableData').DataTable(
	        	{
	        		"bFilter": false,
        			"bLengthChange": false
	        	});
	    });
	
</script>
