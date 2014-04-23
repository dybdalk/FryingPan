<?php
require('checkuser.php');

// output form for logging in or for creating a user account.
// use GET params to determine which operation.
// Default op is login
// GET param 'dest' is used to redirect user after successful login

    // Option 2: create a new user
if ($_POST['submit'] == 'create')
    {
        if(strlen($_POST['username'])< 4) 
            echo "Invalid User Name. Must be at least 4 characters<br>";
        if (userAlreadyExists($_POST['username']))
        {
?>
<!doctype html>
<html>
<body>
User already exists. Please pick a new username.<br>
</body>
</html>
<?php
        } else {
            $password = $_POST['password'];
            if(strlen($password)< 8)
                echo "Invalid password. Must be at least 8 characters<br>";
            $hasher = new PasswordHash(8,false) or die('unable to hash PW');
            $hash = $hasher->HashPassword($password);
            if (strlen($hash)< 20) die('Invalid hashed PW');
            $file =fopen(FILENAME, 'a') or die('Unable to open pw file');
            fputs($file, $_POST['username'] . ',' . 
                $hash . "\n")
                or die('Unable to update pw file');
            fclose($file)
                or die('Unable to update pw file');
            markUserLoggedIn($_POST['username']);
            header('Location: productList.html');
        }
    } elseif ($_POST['submit'] == 'login') {
        // OPTION 3: user is attempting login
        if (userIsLoggedIn()) session_destroy();
        if (validateCredentials($_POST['username'], $_POST['password']))
        {
            markUserLoggedIn($_POST['username']);
            if (isset($_GET['dest']))
            {
                $dest = $_GET['dest'];
                header("Location: $dest");
            }
            else
                header('Location: productList.html');
        } else {
?>
<!doctype html>
<html>
<body>
Invalid username/password<br>

</body>
</html>
<?php
        }
    }

?>
