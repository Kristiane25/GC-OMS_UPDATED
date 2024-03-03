<?php
session_start();
$message="Hello Admin";
    $con = mysqli_connect('sql209.infinityfree.com', 'if0_35850060', 'KLD2810','if0_35850060_u_reg') or die('Unable To connect');


    if(isset($_POST['login']))  
    {  
        $email=$_POST['email'];  
        $stud_pass=$_POST['stud_pass'];
  
        $check_user="select * from stud_login WHERE email='$email'AND stud_password='$stud_pass'";  
  
        $run=mysqli_query($con,$check_user);  
  
        if(mysqli_num_rows($run))  
        {  
            $row = mysqli_fetch_assoc($run);
            $u_id = $row['u_id'];
            $name = $row['name'];
            $prog = $row['program'];
            $company_supervisor = $row['company_supervisor'];
            $company_name = $row['company_name'];
            $company = $row['company_address'];

            // $adv_id = $row['adv_no'];

            echo "<script>window.open('student/index.php','_self')</script>";  
  
            $_SESSION['name']=$name;
            $_SESSION['u_id']=$u_id;
            $_SESSION['program']=$prog;
            $_SESSION['company_supervisor']=$company_supervisor;
            $_SESSION['company_name']=$company_name;
            $_SESSION['company_address']=$company;
            // $_SESSION['adv_no']=$adv_id;//here session is used and value of $user_email store in $_SESSION.  
  
        }  
        else  
        {  
            echo "<script>alert('Username or password is incorrect!')</script>";
            echo "<script>window.open('stud_index.php','_self')</script>";  
  
        }  
    }  
?>  