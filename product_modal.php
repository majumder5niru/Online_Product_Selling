<?php
	include 'Library/dbconnect.php';
	include 'Library/Library.php';
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<?php
	if ($_POST['mode'] == '1'){
	?>
		<h4 class="modal-title" id="myModalLabel">Add Product</h4>
	<?php }
	if ($_POST['mode'] == '2'){
	?>
		<h4 class="modal-title" id="myModalLabel">Edit Product</h4>
	<?php }?>

</div>
<div class="modal-body">
	<form id="modal_form" name="MyForm" enctype="multipart/form-data" >

		<?php
			if ($_POST['mode'] == '2')
			{	
				$product_id = $_POST['product_id'];
				$SeNTlist = "SELECT * FROM products WHERE product_id = '$product_id' ";
		 		$ExSeNTlist=mysql_query($SeNTlist) or die(mysql_error());
		 		while($rowNewsTl=mysql_fetch_array($ExSeNTlist))
		 		{
		 			extract($rowNewsTl);
		 		}
				
			}
		?>
		<input type="hidden" name="product_id" value="<?php if(isset($rowNewsTl)) {echo $product_id;} ?>" >
		<div class="form-group col-xs-6">
			<label for="product_name">Product Name</label>
			<div class="input-group">
				<input type="text" class="form-control" name="product_name" id="product_name" value="<?php if(isset($rowNewsTl)) {echo $product_name;}?>" placeholder="Product Name" >
			</div>
		</div>
		
		<div class="form-group col-xs-6">
			<label for="description">Product Description</label>
			<div class="input-group">
				<textarea type="text" class="form-control" name='description' id='description' ><?php if(isset($rowNewsTl)) {echo str_replace('<br />', '', $description);} ?></textarea>
			</div>
		</div>

		<div class="form-group col-xs-6">
			<label for="price">Price</label>
			<div class="input-group">
				<input type="text" class="form-control" name="price" id="price" value="<?php if(isset($rowNewsTl)) {echo $price;}?>"  placeholder="Price ">
			</div>
		</div>
		
		<div class="form-group col-xs-6">
			<div class="form-group">
	            <label>Product Image</label>
	            <input id="file-3" type="file" name="product_img" value="<?php if(isset($rowNewsTl)) {echo $product_img;}?>" multiple=true>
        	</div>
		</div>
		
	</form>
</div>
<div class="clr"></div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<?php
	if ($_POST['mode'] == '1'){
	?>
		<button type="button" class="btn btn-primary" onclick="save()" >Submit</button> 
	<?php }
	if ($_POST['mode'] == '2'){
	?>
		<button type="button" onclick="updatedata('<?php echo $_POST['product_id']; ?>')" class="btn btn-primary" data-dismiss="modal">Update</button>
	<?php }?>
	
</div>

<script>
 
    $("#file-3").fileinput({
		showUpload: false,
		showCaption: false,
		browseClass: "btn btn-primary btn-lg",
		fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
	});

</script>