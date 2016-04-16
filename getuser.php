<table class="table table-bordered table-condensed table-striped table-hover" id="example">
	<thead>
		<tr>
			<th>#Sl</th>
			<th>Name</th>
			<th>Designation</th>
			<th>Company Name</th>
			<th>Email</th>
			<th>Edit</th>
		</tr>
	</thead>
	<?php
	include_once 'Library/dbconnect.php';
	$res = mysql_query("SELECT * FROM _nisl_mas_user");
	$i = 1;
	while ($row = mysql_fetch_array($res))
	{
		extract($row);
	?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $Name;?></td>
		<td><?php echo $Designation;?></td>
		<td><?php echo $CompanyName;?></td>
		<td><?php echo $Email;?></td>
		
		<td>
			<button class="btn btn-primary btn-xs" onclick="btn2(<?php echo $User_ID;?>)" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button>
		</td>
	</tr>
	
	<?php
	$i++;
	}
	?>	
</table>

<script>
	$(document).ready(function() {
	    $('#example').DataTable({
	        "bFilter": false,
	        "bLengthChange": false,
	    });
	});
</script>
<script type="text/javascript">
	function btn2(User_ID) {
	    //alert(did);
	    var mode = '2';
	    $.ajax({
	        type: "POST",
	        url: "user_modal.php",
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