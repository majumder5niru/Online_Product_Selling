
<table class="table table-bordered table-condensed table-striped table-hover" id="tableData">
	<thead>
		<tr>
			<th>SL.</th>
			<th>Product Name</th>
			<th>Image</th>
			<th>Price</th>
			<th>Description</th>
			<th>Edit</th>
			<th>Delete</th>
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
			<button class="btn btn-primary btn-xs" onclick="btn2(<?php echo $row['product_id'];?>)" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button>	
		</td>
		<td>
			<form action="delete.php" method="post">
				<button class="btn btn-danger btn-xs" onclick="ConfirmDelete()"  >Delete</button>
				<input type="hidden" name="product_id"id="product_id" value="<?php echo $row['product_id'];?>">
			</form>
		</td>
	</tr>
	
	<?php
	$i++;
	}
	?>	
</table>

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
<script type="text/javascript">

  function ConfirmDelete()
  {		
    confirm("Delete Product?")           
  }
</script>


  