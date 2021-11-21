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


$stmt = $pdo ->prepare('SELECT * FROM assignment1.article');
$stmt -> execute();

foreach($stmt as $row){


	echo '<li><a href="article.php?articleID=' . $row['articleID'] . '">' .$row['title'] . '</a></li>';
	echo '<p>'.'Published on the '.$row['publishDate'].'</p>';


}



?>

	
 
				<form>
					<p>Forms are styled like so:</p>

					<label>Field 1</label> <input type="text" />
					<label>Field 2</label> <input type="text" />
					<label>Textarea</label> <textarea></textarea>

					<input type="submit" name="submit" value="Submit" />
				</form>
			</article>
<?php

require 'footer.php'

?>