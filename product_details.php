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
	if($_SESSION['SUserName']=='Admin'){ ?>
		<html>
			<body  data-skin-type="skin-polaris-blue" class="skin-colortic" onload="viewdata()">
				<div id="u-app-wrapper"   class="collapse-true panel-fixed" >

					<div class="content-wrapper">
						<div class="col-xs-12">
							<center><h3>Product Information</h3></center>
							<!-- Button trigger modal -->
							<button type="button" id="btn1" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New Product</button>
							
							<!-- Modal -->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<!--MODAL CONTENT-->
										<?php
											include 'product_modal.php';
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
					        url: "get_product.php",
					        dataType: "html"
					    }).done(function(msg) {
					        $("#viewdata").html(msg);
					    }).fail(function(jqXHR, textStatus) {
					        alert("Request failed: " + textStatus);
					    });
					}

					$('#btn1').click(function() {
						//alert();
						var mode = '1';
					    $.ajax({
					        type: "POST",
					        url: "product_modal.php",
					        data: {
					            mode: mode
					        },
					        success: function(response) {
					            //alert('add');
					            $('.modal-content').html(response);
					        }
					    });
					});

					function save() {
						//alert('yes');
						var product_name = document.MyForm.product_name.value;
						var product_img = document.MyForm.product_img.value;
						if(product_name==""){
							alert("You did not enter your product name.Please provide it.");
						}else{
							 $.ajax({
						        type: "POST",
						        url: "save_product.php",
						        data: $('#modal_form').serialize()+ '&product_img=' + product_img,

						    }).done(function(msg) {
						        alert(msg);
						        //viewdata();
						        window.location.href = 'product_details.php';
						    }).fail(function() {
						        alert("error");
						    });
						}
					}

					function updatedata(code) {
						var product_img = document.MyForm.product_img.value;
					    $.ajax({
					        type: "POST",
					        url: "update_product.php",
					        data : $('#modal_form').serialize()+ '&product_img=' + product_img,

					    }).done(function(msg) {
					        alert(msg);
					        viewdata();
					    }).fail(function() {
					        alert("error");
					    });
					}

					
				</script>

			</body>
		</html>
	<?php 
	}else{
		echo "Sorry, You can not access this page.";
	}
?>