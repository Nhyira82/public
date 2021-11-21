<?php
$myTitle = 'Northampton News - Login';
require 'header.php';

?>
<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);




if (isset($_POST['submit'])) {


    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email');

    $values = [
     'email' => $_POST['email'],
     
    ];
    $stmt->execute($values);
    $user = $stmt->fetch();


if (password_verify($_POST['userpassword'], $user['userpassword'])) {
    $_SESSION['loggedin'] = $user['userID'];
}
 

else{

echo 'Sorry, your account could not be found';
 
 }
}




else  { 
?>



<form action="login.php" method="POST">
 <label>Email: </label>
 <input type="text" name="email" />
 <label>Password: </label>
 <input type="password" name="userpassword" />
 <input type="submit" name="submit" value="Log In" />
</form>

<?php
}
?>




<?php

require 'footer.php'

?>