<?php
	session_start();
	include "header_page.php";
	include "footer_page.php";
	include "navbar.php";

	if (!isset($_SESSION['SUserID'])) {
		header("Location: login.php");
		exit;
	}
	if($_SESSION['SUserName']=='Admin'){ ?>
		<table class="table table-bordered table-condensed table-striped table-hover" id="tableData">
			<thead>
				<tr>
					<th>SL.</th>
					<th>Product Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Customer</th>
					<th>Email</th>
					<th>Card Number</th>
				</tr>
			</thead>
			<?php
			include 'Library/dbconnect.php';
			$res = mysql_query("SELECT 
									products.product_name,
									products.price,
									products.product_image,
									sold.first_name,
									sold.email,
									sold.card_number
									FROM products
									LEFT JOIN sold ON  sold.product_id = products.product_id");
			$i = 1;
			while ($row = mysql_fetch_array($res))
			{
					$s = $row['product_image'];
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['product_name'];?></td>
				<td><img src="data:image/jpeg;base64,<?php echo base64_encode($s); ?>" /></td>
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['first_name'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['card_number'];?></td>
			</tr>
			
			<?php
				$i++;
			}
			?>	
		</table>
	<?php
	}else{
		echo "You don't have access to this page. Please Log in as Admin.";
	}
?>


<script type="text/javascript">
	
	    $(document).ready(function() {
	        $('#tableData').DataTable(
	        	{
	        		"bFilter": false,
        			"bLengthChange": false
	        	});
	    });
	
</script>



  