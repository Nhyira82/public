<?php
$myTitle = 'Northampton News - Add Article';
require 'header.php';
?>

<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);





if (isset($_POST['submit'])) {
    $stmt = $pdo->prepare('INSERT INTO  article(title, content, publishDate, categoryId) 
                           VALUES (:title, :content, :publishDate, :categoryId)');


        $date= new Datetime();
        $date= $date -> format('Y-m-d H:i');




	$values = [
		'title' => $_POST['title'],
        'content' => $_POST['content'],
        'categoryId' => $_POST['categoryId'],
        'publishDate' => $date
    
	];

	$stmt -> execute($values);

	echo  'Article Added Successful';

    echo '<p><a href="adminArticle.php">Back to list</a>';
    echo '<p><a href="addArticle.php">Add Article</a>';
    
    
}
else {

?>
<form action="addArticle.php" method="POST">
	<label>Title:</label>
	<input type="text" name="title" />
    <label>Content:</label>
    <input type="text" name="content" />
    <label>Category:</label>
    <select  name="categoryId">
        <?php
        $stmt=$pdo->prepare('SELECT * FROM assignment1.category');
        $stmt->execute();

        foreach ($stmt as $row) {
            echo '<option value="' . $row['categoryId'] . '">' . $row['name'] .  '</option>';
        }
        
        ?>
    </select>
	<input type="submit" name="submit" value="Add" />
</form>
<?php



}
?>





<?php

require 'footer.php';

?>