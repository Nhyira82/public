<?php
$myTitle = 'Northampton News - Add Category';
require 'header.php';
?>

<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

if (isset($_SESSION['loggedin'])){
$stmt = $pdo->prepare('SELECT * FROM assignment1.user WHERE userID = :userID');

$values = ['userID' => $_SESSION['loggedin']];
$stmt->execute($values);
$user = $stmt ->fetch();



if (isset($_POST['submit'])) {
$stmt = $pdo->prepare('INSERT INTO assignment1.category(name)
                       VALUES (:name)');


$values =[

    'name' => $_POST['name'],
];

$stmt-> execute($values);

echo 'Category Added Successful';

echo '<p><a href="adminArticle.php">Back to list</a>';
echo '<p><a href="addCategory.php">Add Category</a>';

}

else{


?>

<form action="addCategory.php" method="post">

<label>Name</label>
<input type="text"  name= "name"/>
<input type="submit" value="Add"  name= "submit"/>



</form>



<?php
}}

else{
    echo '<title> add category</title>' ;
    echo 'Log In First <a href="login.php">You Will Have To Log In First</a>' ;



}



require 'footer.php';

?>