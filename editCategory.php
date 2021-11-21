<?php
$myTitle = 'Northampton News - Edit Category';
require 'header.php';
?>

<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);





if(isset($_POST['submit'])){
    $stmt = $pdo->prepare('UPDATE category
                          SET name = :name, categoryId = :categoryId
                          WHERE categoryId = :categoryId');

$values = [
            'name'  => $_POST['name'],
            'categoryId'  => $_POST['categoryId']


];


$stmt -> execute($values);
echo '<li>' . $_POST['name'] . ' category has been edited' . '</li>';  

echo'<li><a href="admin.php">Manage Category</a</li>';

echo'<li><a href="adminCategories.php">Back To Category</a></li>';

}

else if (isset($_GET['categoryId'])) {
    $categorystmt = $pdo ->prepare('SELECT * FROM category WHERE categoryId = :categoryId');

    $values = [
        'categoryId' => $_GET['categoryId']
    ];


$categorystmt->execute($values);
$category = $categorystmt ->fetch();




?>
<form action="editCategory.php" method="POST">
	<input type="hidden" name="categoryId" value="<?php echo $category['categoryId']; ?>"/>

	<label>Category Name:</label>
	<input type="text" name="name"  value="<?php echo $category['name']; ?>" />

<?php

$stmt = $pdo->prepare('SELECT * FROM category');
$stmt-> execute();

foreach ($stmt as $row) {
    if ($row['categoryId'] == $category['categoryId']) {
        echo'<option value="' . $row['categoryId'] . '"selected="selected">' . '</option>';
    }

    else{
        echo'<option value="' . $row['categoryId'] . '">' . '</option>';
    }
}

?>
<input type="submit" name="submit" value="Edit"/>
</form>

<?php
}

?>
<?php
require 'footer.php';

?>

