<?php
$myTitle = 'Northampton News - Delete Article';
require 'header.php';
?>

<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

$stmt = $pdo->prepare('DELETE FROM assignment1.article
                       WHERE articleID = :articleID');



$values = [
    'articleID' => $_GET['articleID']
];

$stmt -> execute($values);

echo '<p> Article Deleted</p>';

echo '<p><a href="adminArticles.php">Back to Add Article</a>';

?>


<?php

require 'footer.php';

?>

