<?php
    $myTitle = 'Northampton News - Admin';
    require 'header.php';
?>

<?php

if (isset($_POST['submit'])) {


    if ($_POST ['email'] ==='adminonly@nn.com' && $_POST ['password'] === 'password') {


        $_SESSION['loggedin'] = true;

       
echo '<p><a href="adminArticles.php">Manage Article Check</a></p>';


echo '<p><a href="adminCategories.php">Manage Category Check</a></p>';

    }



else {

    echo'<p> Admin Email and Password Incorrect</p>';

   

    }



}
else{

    ?>

    <form action="admin.php" method = "POST">
    <label>Email:</label>
    <input type="text" name="email"/>
    <label>Password:</label>
    <input type="password" name="password"/>
    <input type="submit" name="submit" value="Log In"/>

    </form>
    <?php

}


?>





<?php

require 'footer.php';

?>





