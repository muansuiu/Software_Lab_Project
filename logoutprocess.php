<?php
    /// delete the session variable
    /// forward to sign in page

    session_start();

    unset($_SESSION['email']);
    unset($_SESSION['type']);
    unset($_SESSION['id']);
    unset($_SESSION['order_id']);
    

    echo "<script>window.location.assign('signin.php');</script>";
?>