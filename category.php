<?php
$myTitle = 'Northampton News - Category';
require 'header.php';

?>
<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

$article = $pdo ->prepare ('SELECT * FROM article WHERE categoryId  = :categoryId');
$categoryStmt = $pdo ->prepare ('SELECT * FROM  category WHERE categoryId = :categoryId');

$value = [

    'categoryId'  => $_GET['categoryId']
];




$categoryStmt ->execute($value);
$article ->execute($value);



$category = $categoryStmt->fetch(); 


echo '<h2>' . $category['name'] . '</h2>';

echo '<ul>';
foreach ($article as $art) {


    echo '<h2>' . $art['title'] . '</h2>';
    echo '<p>' . $art['content'] . '</p>';

}

echo '</ul>';


?>




<?php

require 'footer.php';

?>




