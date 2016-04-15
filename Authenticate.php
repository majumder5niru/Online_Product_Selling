<?php
    include "Library/dbconnect.php";
    session_start();

    if(isset($_POST['name'])&& $_POST['name']!="" || isset($_POST['pass']) && $_POST['pass']!="" || isset($_POST['type']) && $_POST['type']!=""){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $type = $_POST['type'];
    $member_query = " Select user_name,password,type
                    from user
                    where user_name='$name' AND type='$type' AND password='$pass' ";
                 
    $rset = mysql_query($member_query) or die(mysql_error());
    if(mysql_num_rows($rset)>0){
        while($row = mysql_fetch_array($rset)){
            extract($row);
            echo $password;
            if(($name==$user_name) && ($pass==$password) && ($type==1))
                {
                    
                    $User_ID = $_SESSION['SUserID'];
                    $User_Name = $_SESSION['SUserName'];
                    header("Location: dashboard.php");
                    exit;
                }elseif(($name==$user_name) && ($pass==$password) && ($type==2)){
                    $_SESSION['SUserID']= $User_ID;
                    $_SESSION['SUserName']= $User_Name;
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