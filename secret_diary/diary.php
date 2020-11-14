<?php
require 'common.php';

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
        <link href="diary.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        
         
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
</style>
    </head>
    <body>
       
     
              <div class="header">
            <div class="container-fluid">
                <nav class="navbar navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                 <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                              </button>
                          
                              <a class="navbar-brand" href="index.php">Secret Diary</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <form method="post" action="input.php">
                                        <button type="submit" name="logout" class="btn success" style="border: 3px solid green;">Logout</button></form></li>
                                
                                
                                
                            </ul>
                        </div>
                    </div>
                    
                </nav>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid background-image">
                <div class="row">
                    <div class="col-xs-12">
                         <div class="textarea">
                             <form method="post" action="input.php">
                                 <div class="form-group">
                                     <textarea name="diary" style="color:black;" rows="30px" class="form-control" id="diary" ><?php if($_SESSION['diary']!=''){ echo $_SESSION['diary'];} ?></textarea>
                                     <button type="submit" class="btn btn-success" name="save">SAVE</button>
                                 </div>
                                 <div class="form-group">
                                     <input type="hidden" name="user_id" id="user_id">
                                     <div id="autosave"></div>
                                 </div>
                             </form>
                         </div>
                    </div>
                </div>
                
           </div>
        </div>
        

    </body>
</html>