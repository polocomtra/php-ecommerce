<?php
    session_start();
    if (isset($_SESSION['cart'])) {
        $checker=array_column($_SESSION['cart'],'item_name');
        if(in_array($_GET['item_name'],$checker)){
            echo "<script>
                alert('Product has already in the cart');
                window.location.href='product.php';
            </script>";
        }else{
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('item_id'=>$_GET['item_id'],'item_name'=>$_GET['item_name'],'item_price'=>$_GET['price'],'quantity'=>1);
            echo "<script>
                alert('Product added successfully');
                window.location.href='product.php';
            </script>";
        }
    } else {
        $_SESSION['cart'][0]=array('item_id'=>$_GET['item_id'],'item_name'=>$_GET['item_name'],'item_price'=>$_GET['price'],'quantity'=>1);
        echo "<script>
            alert('Product added successfully');
            window.location.href='product.php';
        </script>";
    }
    
?>