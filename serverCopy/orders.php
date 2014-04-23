<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="fryingPanStyle.css">
        <link href='http://fonts.googleapis.com/css?family=Arvo:400,400italic'
        rel='stylesheet' type='text/css'>

        <title>Out of the Frying Pan</title>
    </head>
    <body>
<?php
session.start();
if($_SESSION['loggedIn'] == 'false'){
        echo "
<div  id='welcome1'>
    Welcome to
</div>
<div id='welcome2'>
     Out of the Frying Pan
    </div>
    <div id='form'>
        <font size='10px'>Create account or log in</font>
    <form name='myForm' action='createuser.php' method='post'>
        <div id='inputs'>
        <input class='required'type='text' placeholder='Username' name='username'><br>
        <input class='required' type='password' placeholder='Password' name='password'><br>
        </div>
        <!-- <font size='2px'>* indicates a required field</font><br><br> -->
        <input type='submit' name='submit' value='create'>
        <input type='submit' name='submit' value='login'>
    </form>
</div>
    <div class='footer'>
        <a href='underConstruction.html'>Contact Us</a>
        <a href='index.html'>Home</a>
        <a href='privacy.html'>Privacy Policy</a>
        <a href='orders.html'>Shop Products</a>
        <a href='account.html'>Account Settings</a>
    </div>";
    }else{
       echo "<form name='pform' action='privateO.php' method='post'>
       <div id='welcome1'> Product Order Form </div>
       <p>product 1: <input type=text placeholder='Enter product name here' name=prdt1><br>
       product 2: <input type=text placeholder='Enter product name here' name=prdt2><br>
       product 3: <input type=text placeholder='Enter product name here' name=prdt3><br>
       product 4: <input type=text placeholder='Enter product name here' name=prdt4><br>
       product 5: <input type=text placeholder='Enter product name here' name=prdt5><br>
       <input type=submit>

       <div class='footer'>
           <a href='underConstruction.html'>Contact Us</a>
           <a href='index.php'>Home</a>
           <a href='privacy.html'>Privacy Policy</a>
           <a href='orders.php'>Shop Products</a>
           <a href='account.php'>Account Settings</a>
       </div>";
     }
   </body>
   </html>

