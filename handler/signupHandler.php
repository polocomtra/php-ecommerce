<?php
    include("../partials/connect.php");
    $username=$_POST['username'];
    $password1=$_POST['password'];
    $password2=$_POST['re-password'];
    if($password1==$password2){
        $sql="insert into customers(username,password) values ('$username','$password1')";
        $connect->query($sql);
        echo "
        <script>
            alert('Sign up successfully');
            window.location.href='../loginPage.php';
        </script>";
    }else{
        echo "
        <script>
            alert('Password did not match');
            window.location.href='../signupPage.php';
        </script>
        ";
    }
?>