<?php
    session_start();

    include "Library/dbconnect.php";
    
    if(isset($_POST['u_name'])&& $_POST['u_name']!="" || isset($_POST['pass']) && $_POST['pass']!="" ){
    $u_name = $_POST['u_name'];
    $pass = $_POST['pass'];
    $member_query = " Select *
                    from user
                    where user_name='$u_name'  AND password='$pass' ";
                 
    $rset = mysql_query($member_query) or die(mysql_error());
    if(mysql_num_rows($rset)>0){
        while($row = mysql_fetch_array($rset)){
            extract($row);
            
            if(($u_name==$user_name) && ($pass==$password) )
                {
                    echo "Bal".$user_name."bal".$u_name;
                    $_SESSION['SUserID'] = $User_ID ;
                    $_SESSION['SUserName'] = $user_name;
                    header("Location: home.php");
                    exit;
                }else{
                    header("Location: login.php");
                    exit;
                }
        }
    }else{
        header("Location: login.php");
        exit;
    }
    

        
    }
?>