<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
        <title> <?php echo $myTitle; ?> </title>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="index.php">Latest Articles</a></li>
			

						<?php
			if (isset($_SESSION['loggedin'])) {

				echo'<li><a href="logout.php">Logout</a></li>';
				echo'<li><a href="admin.php">Admin</a></li>';

		

			}

			else
			{

				echo'<li><a href="login.php">Log In</a></li>';
				echo'<li><a href="register.php">Register</a></li>';
			}
			?>
				
				
			
			<li><a class="articleLink" href="#">Select Category</a>
			<ul>



			
			<?php




$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

$stmt = $pdo->prepare('SELECT * FROM  assignment1.category');

$stmt ->execute();

foreach($stmt as $row){

	echo '<li><a href="category.php?categoryId=' . $row['categoryId'] . '">' . $row['name'] . '</a></li>';
}

?>
</ul>

</ul>

		</nav>
		<img src="images/banners/randombanner.php" />
		<main>