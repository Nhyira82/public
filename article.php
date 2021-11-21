<?php
$myTitle = 'Northampton News - Article';
require 'header.php';

?>
<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';


$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);


$categStmt = $pdo ->prepare ('SELECT * FROM article WHERE articleID = :articleID');

$value = [

    'articleID'  => $_GET['articleID']
];



$categStmt ->execute($value);


$article = $categStmt->fetch(); 
echo '<h2>' . $article['title'] . '</h2>';
echo '<p>' . $article['content'] . '</p>';




?>




<?php

require 'footer.php';

?>




