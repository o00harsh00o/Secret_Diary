<?php
require 'common.php';
 if(isset($_POST['logout']))
        {
            session_unset();
            session_destroy();
            header('location:login.php');
        } 
        else{
        
$diary = $_POST['diary'];
$email=$_SESSION['email'];
$pass=$_SESSION['password'];
if(isset($_POST['save'])){


    $insert_query="UPDATE users SET diary='$diary' WHERE users.email='$email'";
    $submit_query = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    $_SESSION['diary']=$diary;
    header('location:diary.php');
} 
        
        
        }     