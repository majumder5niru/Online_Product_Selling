<form action="buy.php" method="post">
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
		include 'Library/dbconnect.php';
		$res = mysql_query("SELECT product_id,product_name,product_image,price,description FROM products");
		$i = 1;
		while ($row = mysql_fetch_array($res))
		{
				
				$s = $row['product_image'];
				header("Content-type: image/jpeg");
				//echo $row['product_image'];

		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $row['product_name'];?></td>
			<td><img src="data:image/jpeg;base64,<?php echo base64_encode($s); ?>" /></td>
			<td><?php echo $row['price'];?></td>
			<td><?php echo $row['description'];?></td>
			<td>
				<button class="btn btn-primary btn-xs" onclick="btn2(<?php echo $row['product_id'];?>)" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Buy</button>
			</td>
		</tr>
		
		<?php
		$i++;
		}
		?>	
	</table>
</form>


<script type="text/javascript">
	
	    $(document).ready(function() {
	        $('#tableData').DataTable(
	        	{
	        		"bFilter": false,
        			"bLengthChange": false
	        	});
	    });
	
</script>
<script type="text/javascript">
	function btn2(product_id) {
	    var mode = '2';
	    $.ajax({
	        type: "POST",
	        url: "product_modal.php",
	        data: {
	            mode: mode,
	            product_id : product_id,
	        },
	        success: function (response)
            {   
                //alert ('edit');
                $( '.modal-content' ).html(response);
            }
	    });
	}
</script>