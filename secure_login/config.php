<?php
   ini_set('display_errors',1);
   ini_set('display_startup_errors',1);
   error_reporting(E_ALL);
   
    $server = 'localhost';
    $dbname = 'securelogin';
    $username = 'root';
    $password = 'root';
    

   $dbh = new PDO('mysql:host='.$server.';dbname='.$dbname,$username,$password);

    $stmt = $dbh->prepare("SELECT * FROM users");
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $row)
    {
        echo $row['user_username'];
    }
?>