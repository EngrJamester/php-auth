<?php

include_once("header.php");

?>
<section class="parent">
    <div class="child">
    <?php

        // if(!func::checkLoginState($dbh))
        // {
        //     header("location:login.php");
        //     exit();
        //     echo 'Welcome'.$_SESSION['username'].'!'. func::createString(30);
        // }
        // else
        // {
        //     header("location:login.php");
        // }

        if(!func::checkLoginState($dbh))
        {
            header("location:login.php");
            exit();
           
        }
        echo 'Welcome'.$_SESSION['username'].'!'. func::createString(30);

    ?>
    </div>
</section>

<?php
include_once("footer.php");
?>