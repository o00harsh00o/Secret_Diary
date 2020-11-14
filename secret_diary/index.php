<?php
require 'common.php';
ob_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       
        <title>Secret Diary</title>
        <link href="index.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        
         
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
</style>
    </head>
    <body>
        <div class="container-fluid background-image">
            <div class="container content">
                <h1 style="font-size:50px;"> Secret Diary </h1>
                <?php
                  
                  if(isset($_POST['submit'])){
                  $email= mysqli_real_escape_string($con, $_POST['email']);
                  $password = mysqli_real_escape_string($con, $_POST['password']);



                  $user_select_query="SELECT id FROM users WHERE email='$email'";
                  $user_select_query_result=mysqli_query($con,$user_select_query) or die(mysqli_error($con));
                  $total_rows= mysqli_num_rows($user_select_query_result);
                 if($total_rows>0)
                  {
                    //header('location:index.php');
                    ?>               
                
                <div class="panel panel-danger">
    
      <div class="panel-body" style="background-color: #F5B7B1 ; color: red;">Email Already Exists!</div>
    
  </div>
                <?php }
else
{
    $pass= md5($password);
    $input_query = "INSERT INTO users(email,password) VALUES('$email','$pass')";
    $submit_query = mysqli_query($con, $input_query) or die(mysqli_error($con));
$_SESSION['id']= mysqli_insert_id($con);
$_SESSION['email']=$email;
$_SESSION['password']=$pass;
$_SESSION['diary']='';
if(isset($_POST['loggedin'])){
    setcookie('emailcookie',$email,time()+86400);
    setcookie('passcookie',$password, time()+86400);
    header('location:diary.php');
    
}
else{
    header('location:diary.php');
}
}
}
?>

                
                <h4> Store your thoughts permanently and securely. </h4>
                <br/>
                
                <h4> Interested? Sign up now.</h4>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2 col-lg-6 col-lg-offset-3">
                            <form method="post" action="" >
                                <div class="form-group">
                                    <input type="text" class="form-control " placeholder="Your Email" name="email" required value="<?php if(isset($_COOKIE['emailcookie'])){                   echo $_COOKIE['emailcookie'];}?>" >
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control " placeholder="Password" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required value="<?php if(isset($_COOKIE['passcookie'])){                   echo $_COOKIE['passcookie'];}?>" >
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" style="position: relative; left:-5px;" name="loggedin">Stay Logged In   
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-success btn-lg" value="submit">Sign Up</button>
                                </div>
                                <br/>
                                <a href="login.php" style="font-size: 20px; text-decoration: underline; font-weight: bold;"> Log in </a>
                            </form>
                                
                        </div>
                    </div>
                </div>
                 </div>
            
        </div>
    </body>
</html>
