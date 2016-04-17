<?php
    include "header_page.php";
    include "footer_page.php";
    include "navbar.php";
    include "Library/dbconnect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="scripts/Stripe.js"></script>

        <script>
            Stripe.setPublishableKey('pk_test_h0NY1TZXQKaWylxqVfG2H22L');   // Test key!
        </script>

        <script src="scripts/buy-controller.js"></script>
    </head>
     
    <body>
        <center><h2>Payment Form</h2></center>
        <?php
            $product_id = $_POST['product_id'];
        ?>
        <div class="row">
            <form id="buy-form" method="post" action="javascript:">
                <div class="form-group col-sm-6">
                    <label for="first-name" class="col-sm-4 control-label input-sm">First Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input-sm" id="first-name" name="first-name" spellcheck="false">
                        <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="last-name" class="col-sm-4 control-label input-sm">Last Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input-sm" id="last-name" name="last-name" spellcheck="false">
                    </div>
                </div>
                 <div class="form-group col-sm-6">
                    <label for="email" class="col-sm-4 control-label input-sm">Email Address:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input-sm" id="email" name="email" spellcheck="false">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="card-number" class="col-sm-4 control-label input-sm">Credit Card Number:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input-sm" id="card-number" name="card-number" autocomplete="off">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-sm-4 control-label input-sm">Expiration Date:</label>
                    <div class="col-sm-3">
                        <select class="form-control input-sm" id="expiration-month">
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control input-sm" id="expiration-year">
                            <?php 
                               $yearRange = 20;
                                $thisYear = date('Y');
                                $startYear = ($thisYear + $yearRange);
                             
                                foreach (range($thisYear, $startYear) as $year) 
                                {
                                    if ( $year == $thisYear) {
                                        print '<option value="'.$year.'" selected="selected">' . $year . '</option>';
                                    } else {
                                        print '<option value="'.$year.'">' . $year . '</option>';
                                    }
                                } 
                                
                            ?>
                            <!--<option value="17">2017</option>
                                <option value="18">2018</option>
                                <option value="19">2019</option>
                                <option value="20">2020</option>
                                <option value="21">2021</option>
                                <option value="22">2022</option>
                                <option value="23">2023</option>
                                <option value="24">2024</option>
                                <option value="25">2025</option>
                                <option value="26">2026</option>
                                <option value="27">2027</option>
                                <option value="28">2028</option> -->
                        </select>
                    </div>
                </div>
                 <div class="form-group col-sm-6">
                    <label for="card-security-code" class="col-sm-4 control-label input-sm">CVC:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input-sm" id="card-security-code" autocomplete="off">
                        
                    </div>
                </div>.
                <div class="form-group col-sm-12">
                    <label for="card-number" class="col-sm-4 control-label input-sm "></label>
                    <div class="col-sm-8">
                        <input id="buy-submit-button" type="submit" class="btn btn-success btn-sm sub pull-right "value="Pay for Order »" onclick="save()">
                    </div>
                </div>
                
            </form>
        </div>
        <script type="text/javascript">
            function save() {
                    $.ajax({
                        type: "POST",
                        url: "sold.php",
                        data: $('#buy-form').serialize(),

                    }).done(function(msg) {
                        alert(msg);
                        //viewdata();
                        //window.location.href = 'product_details.php';
                    }).fail(function() {
                        alert("error");
                    });
                }
        </script>
    </body>
</html>