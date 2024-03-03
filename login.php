<?php
session_start();
$message="Hello Admin";
    $con = mysqli_connect('sql209.infinityfree.com', 'if0_35850060', 'KLD2810','if0_35850060_u_reg') or die('Unable To connect');


    if(isset($_POST['login']))  
    {  
        $user_name=$_POST['username'];  
        $user_pass=$_POST['password'];
  
        $check_user="select * from admin_login WHERE admin_name='$user_name'AND admin_pass='$user_pass'";  
  
        $run=mysqli_query($con,$check_user);  
  
        if(mysqli_num_rows($run))  
        {  
            $row = mysqli_fetch_assoc($run);
            $position = $row['position']; 

            echo "<script>window.open('admin/index.php','_self')</script>";  
  
            $_SESSION['username']=$user_name;//here session is used and value of $user_email store in $_SESSION.  
            $_SESSION['position'] = $position;
           
        }  
        else  
        {  
          
            echo "<script>alert('Username or password is incorrect!')</script>";
            echo "<script>window.open('admin_index.php','_self')</script>";  
  
            
        }  
    }  
?>  