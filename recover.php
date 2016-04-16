
<?php 
    session_start();
    include "Library/dbconnect.php"; 
    include "header_page.php";
    include "footer_page.php";
    include "navbar.php";
    error_reporting(0);

    if (isset($_POST['email'])){
        $email = $_POST['email'];
        $query = "SELECT * from user where email='$email'";
        $result   = mysql_query($query);
        $count = mysql_num_rows($result);
        if($count==1)
        {
            $rows=mysql_fetch_array($result);
            $pass  =  $rows['password'];//FETCHING PASS
            $to = $rows['email'];
            $from = "Authority";
            $body  =  "Password recovery Script
            -----------------------------------------------
            email Details is : $to;
            Here is your password  : $pass;
            Sincerely,
            Authority";
            $from = "admin@admin.com";
            $subject = " Password recovered";
            $headers1 = "From: $from\n";
            $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
            $headers1 .= "X-Priority: 1\r\n";
            $headers1 .= "X-MSMail-Priority: High\r\n";
            $headers1 .= "X-Mailer: Just My Server\r\n";
            $sentmail = mail ( $to, $subject, $body, $headers1 );
        } else {
                echo "<span style='color: #ff0000;'> Not found your email in our database</span>";  
        }
        if($sentmail==1)
        {

           echo "<span style='color: #ff0000;'> Your Password Has Been Sent To Your Email Address.</span>";

        }
        else
        {
        
        echo "<span style='color: #ff0000;'> Cannot send password to your e-mail address.Problem with sending mail...</span>";
    }
}

?>


<div class="cotainer">
    <div class="row">

        <form action="recover.php" method="post">

            <div class="form-group">
                <div class="form-group col-sm-6">
                    <label for="name" class="col-sm-4 control-label input-sm">Enter your Email Address :</label>
                    <div class="col-sm-8">
                        <input id="email" type="text" name="email" class="form-control input-sm"/>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <div class="col-md-6" >
                    <button type="submit"  class="btn btn-success btn-sm sub pull-left" >Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
    


