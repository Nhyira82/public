<?php
$myTitle = 'Northampton News - Log Out';
require 'header.php'

?>

<?php
unset($_SESSION['loggedin']);
echo '<h2>You are now logged out</h2>  <a href="index.php">Go to index.php</a>';
?>