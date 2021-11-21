<?php
$myTitle = 'Northampton News - Admin Articles';
require 'header.php';
?>

<h1><a href="addArticle.php">ADD ARTICLE</a></h1>



<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);


$stmt = $pdo -> prepare('SELECT * FROM assignment1.article');

$stmt->execute();




foreach ($stmt as $row){

echo '<li><a href="article.php?articleID=' . $row['articleID'] . '">' . $row['title'] . '</a></li>';

echo '<li><a href="editArticle.php?articleID=' . $row['articleID'] . '">' . 'Edit' . $row['title'];

echo '<li><a href="deleteArticle.php?articleID=' . $row['articleID'] . '">' . 'Delete' . $row['title'];
}

?>


<?php

require 'footer.php';

?>