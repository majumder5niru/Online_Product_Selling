<?php
	session_start();
	error_reporting(0);
	include "Library/dbconnect.php";
	include "navbar.php";
	include "header_page.php";

	if (!isset($_SESSION['SUserID'])) {
		header("Location: login.php");
		exit;
	}
	
?>
<html>
	<body  data-skin-type="skin-polaris-blue" class="skin-colortic" onload="viewdata()">
		<div id="u-app-wrapper"   class="collapse-true panel-fixed" >

			<div class="content-wrapper">
				<div class="col-xs-12">
					<center><h3>You can buy this product.</h3></center>
					<!-- Button trigger modal -->
					<!--<button type="button" id="btn1" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New Product</button> -->
					
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<!--MODAL CONTENT-->
								<?php
									//include 'product_modal.php';
								?>
							</div>
						</div>
					</div>

					<div style="margin-top: 10px;" id="viewdata">
						
					</div>

				</div>
			</div>
		</div>
		<?php
		include 'footer_page.php';
		?>

		<script type="text/javascript">

			function viewdata() {
			    $.ajax({
			        type: "GET",
			        url: "show_product.php",
			        dataType: "html"
			    }).done(function(msg) {
			        $("#viewdata").html(msg);
			    }).fail(function(jqXHR, textStatus) {
			        alert("Request failed: " + textStatus);
			    });
			}
		</script>

	</body>
</html>
