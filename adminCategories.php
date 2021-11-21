<?php
$myTitle = 'Northampton News - Admin Categories';
require 'header.php';
?>


<h1><a href="addCategory.php">ADD CATEGORY</a></h1>

<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);


$stmt = $pdo ->prepare ('SELECT * FROM assignment1.category');

$stmt->execute();




foreach ($stmt as $row){
    echo '<li><a href="category.php?categoryId=' . $row['categoryId'] . '">' . $row['name'] . '</a></li>';

    echo '<li><a href="editCategory.php?categoryId=' . $row['categoryId'] . '">' . 'Edit' . $row['name'];
    
    echo '<li><a href="deleteCategory.php?categoryId=' . $row['categoryId'] . '">' . 'Delete' . $row['name'];
    }
    
?>



<?php

require 'footer.php';

?>
