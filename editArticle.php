<?php
$myTitle = 'Northampton News - Edit Article';
require 'header.php';
?>


<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);


if(isset($_POST['submit'])){
   
	$articleStmt = $pdo->prepare('UPDATE article 
                                    SET   title = :title, content = :content, articleID = articleID, categoryId = :categoryId
                                    WHERE articleID = :articleID');

	$values = [
		
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'articleID' => $_POST['articleID'],
        'categoryId' => $_POST['categoryId'],



	];

	$articleStmt->execute($values);
    echo $_POST ['title'] . ' Article is edited';

    echo'<li><a href="admin.php">Manage Article</a></li>';

    echo'<li><a href="adminArticles.php">Back To Article</a></li>';


}
	
else if (isset($_GET['articleID'])) {
    $artistmt = $pdo -> prepare('SELECT * FROM assignment1.article WHERE articleID = :articleID');

    $values = [
        'articleID' => $_GET['articleID']
    ];

    $artistmt->execute($values);

   $article = $artistmt->fetch();


?>

<form action="editArticle.php" method="POST">
	<input type="hidden" name="articleID" value="<?php echo $article['articleID']; ?>"/>

	<label>Article name:</label>
	<input type="text" name="title"  value="<?php echo $article['title']; ?>" />

    <label>Content:</label>
	<input type="text" name="content"  value="<?php echo $article['content']; ?>" />

	<label>Select Article:</label>
	<select name="categoryId">
	<?php

		$stmt = $pdo->prepare('SELECT * FROM category');
		$stmt->execute();

		foreach ($stmt as $row) {
			if ($row['categoryId'] == $article['categoryId']) {
				echo '<option value="' . $row['categoryId'] . '" selected="selected">' . $row['name'] . '</option>';
			}
			else {
				echo '<option value="' . $row['categoryId'] . '">' . $row['name'] . '</option>';
			}
		}

	?>
	</select>
	<input type="submit" name="submit" value="Edit" />

    </form>
<?php
}
?>

<?php

require 'footer.php';

?>

