<?php 
include('checkuser.php'); 
?>
<!doctype html>
<html>
    <head>
        <title>Secure site demo</title>
    </head>
    <body>
<?php outputGreeting() ?>
        <a href=createuser.php?op=create>create user</a><br>
        <a href=createuser.php?op=login>login user</a><br>
        <a href=unsecure.php>unsecure page</a><br>
        <a href=secure.php>secure page</a><br>
    </body>
</html>

