<?php 
include('checkuser.php'); 
mustBeLoggedIn();
?>
<!doctype html>
<html>
    <head>
        <title>Secure site demo</title>
    </head>
    <body>
<?php outputGreeting() ?>
You must be logged in to see this page.<br>
<a href=index.php>home</a><br>
<a href=unsecure.php>unsecure page</a>
    </body>
</html>

