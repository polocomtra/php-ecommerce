<?php 
    session_start();
    include("../partials/connect.php");
    $phone=$_POST['phone'];
    $total=$_POST['total'];
    $address=$_POST['address'];
    $customerId=$_SESSION['customerId'];
    $sql="insert into orders(customer_id,phone,address,total) values('$customerId','$phone','$address','$total')";
    $connect->query($sql);

    $sql2="select id from orders order by id DESC limit 1";
    $result=$connect->query($sql2);
    $final=$result->fetch_assoc();
    $orderId=$final['id'];

    foreach($_SESSION['cart'] as $key=>$value){
        $proId=$value['item_id'];
        $quantity=$value['quantity'];
        $sql3="insert into order_details(order_id,product_id,quantity) values('$orderId','$proId','$quantity')";
        $connect->query($sql3);
    }
    echo "<script>alert('ORDER IS PLACED');
        window.location.href='../index.php';</script>";
    
?>