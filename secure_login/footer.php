<?php include_once('header.php') ?>
<footer>
<?php
echo'
<a href="index.php">Index</a> | <a href="admin.php">Admin</a> |';
if(func::checkLoginState($dbh)) 
    echo' <a href="logout.php">Logout</a>' ;
else 
    echo '<a href="loging.php">Login</a>';
?>

</footer>

<?php
echo '';

?>