<?php
$myTitle = 'Northampton News - Register';
require 'header.php';

?>
<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';


$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);


if (isset($_POST['submit'])) {
    $stmt = $pdo->prepare('INSERT INTO user(username, email, userpassword)
                           VALUES (:username, :email, :userpassword)');

        $password = $_POST['userpassword'];

        $hash = password_hash($password, PASSWORD_DEFAULT);


$values = [
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'userpassword'=> password_hash($_POST['userpassword'],PASSWORD_DEFAULT)
];

$stmt ->execute($values);


    echo ' Registration Successful';
    
    echo '<p><a href="login.php"> go to login</a></p>';
    }

else  {


?>

<form action="register.php" method="POST">
 <label>NAME: </label>
 <input type="text" name="username" />
 <label>EMAIL: </label>
 <input type="text" name="email" />
 <label>PASSWORD: </label>
 <input type="password" name="userpassword" />
 <input type="submit" name="submit" value="Register Now" />
</form>

<?php
}
?>

<?php

require 'footer.php';

?>





