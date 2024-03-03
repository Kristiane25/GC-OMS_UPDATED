<?php
session_start();
$message="Hello Admin";
    $con = mysqli_connect('sql209.infinityfree.com', 'if0_35850060', 'KLD2810','if0_35850060_u_reg') or die('Unable To connect');


    if(isset($_POST['login']))  
    {  
        $adv_name=$_POST['adv_name'];  
        $adv_pass=$_POST['adv_pass'];
  
        $check_user="select * from adv_login WHERE adv_name='$adv_name'AND adv_pass='$adv_pass'";  
  
        $run=mysqli_query($con,$check_user);  
  
        if(mysqli_num_rows($run))  
        {  
            $row = mysqli_fetch_assoc($run);
            $prog = $row['program'];
            $adv_id = $row['adv_no'];

            echo "<script>window.open('adviser/index.php','_self')</script>";  
  
            $_SESSION['adv_name']=$adv_name;
            $_SESSION['program']=$prog;
            $_SESSION['adv_no']=$adv_id;//here session is used and value of $user_email store in $_SESSION.  
  
        }  
        else  
        {  
            echo "<script>alert('Username or password is incorrect!')</script>";
            echo "<script>window.open('adv_index.php','_self')</script>";  
  
        }  
    }  
?>  