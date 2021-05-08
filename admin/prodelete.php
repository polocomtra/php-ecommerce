<?php
    include("../partials/connect.php");
    $newId=$_GET['del_id'];
    $sql="delete from products where id='$newId'";
    if(mysqli_query($connect,$sql)){
        header('location: productsshow.php');
    }else{
        echo "No deleted";
    }

?>