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
You do not need to be logged in to see this page.<br>
<a href=index.php>home</a><br>
<a href=secure.php>secure page</a>
    </body>
</html>

