<?php
    session_start();
    if(empty($_SESSION['username'] and $_SESSION['password'])){
        echo "<script>
            alert('Please sign in');
            window.location.href='../loginPage.php';
        </script>";
    }
?>