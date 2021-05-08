<?php
    session_start();    
    include("../partials/connect.php");
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="select * from customers where username='$username' and password='$password'";
    $result=$connect->query($sql);
    $final=$result->fetch_assoc();
    $_SESSION['username']=$final['username'];
    $_SESSION['password']=$final['password'];
    $_SESSION['customerId']=$final['id'];
    if($username==$final['username'] and $password==$final['password']){
        header('location:../index.php');
    }else{
        echo "<script> 
            alert('Credentials not valid');
            window.location.href='../loginPage.php';        
        </script>";
    }
    
?>