<!doctype html>
<html>
<body>
<?php
define ("FILENAME", "/home/flame/html_data/passwords.txt");
require 'PasswordHash.php';

function getPW($username)
{
    $file = fopen(FILENAME, "r") or die("Unable to open pw file");
    while (!feof($file))
    {
        $user = fgetcsv($file);
        if ($user[0] == $username)
        {
            fclose($file);
            return $user[1];
        }
    }
    fclose($file);
}

if (empty($_POST))
{
    echo <<<FORMSTUFF
<form action='createuser.php' method='post'>
username: <input type=text name=username><br>
password: <input type=password name=password><br>
<input type=submit name="submit" value="create"><br>
<input type=submit name="submit" value="login"><br>
</form>
FORMSTUFF;
} else {
    if ($_POST["submit"] == "create")
    {
        $pw = getPW($_POST['username']);
        if ($pw != null)
        {
            // echo "username already exists";
            include("sameUser.html");
        } 
        else {
            $password = $_POST["password"];
            if (strlen($password) < 6)
            {
                //echo "Password must be at least 6 characters";
                include("shortPass.html");
            }
            else
            {
                $hasher = new PasswordHash(8,false) or die("unable to hash PW");
                $hash = $hasher->HashPassword($password);
                $file =fopen(FILENAME, "a") or die("Unable to open pw file");
                fputs($file, $_POST["username"] . "," . 
                    $hash . "\n")
                    or die("Unable to update pw file");
                fclose($file)
                    or die("Unable to update pw file");
                echo "user was created<br>";
            }
        }
    } elseif ($_POST["submit"] == "login") {
        $hashed_pw = getPW($_POST['username']);
        if ($hashed_pw != null)
        {
            $hasher = new PasswordHash(8,false) or die("unable to hash PW");
            if ($hasher->CheckPassword($_POST['password'], $hashed_pw))
                echo "login successful<br>";
            else
                //echo "invalid username/password<br>";
                include("loginError.html");
        }
        else
        {
            echo "invalid username or password";
        }
    }
}
?>
</body>
</html>



