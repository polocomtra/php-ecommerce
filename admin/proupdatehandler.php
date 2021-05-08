<?php
    include("../partials/connect.php");
    if(isset($_POST['update'])){
       $newId=$_POST['form_id'];
        $newName=$_POST['name'];
       $newPrice=$_POST['price'];
       $newDesc=$_POST['description'];
   $newCate=$_POST['category'];

       $target="../uploads/";
        $file_path=$target.basename($_FILES['file']['name']);
        $file_name=$_FILES['file']['name'];
        $file_tmp=$_FILES['file']['tmp_name'];
        $file_store="../uploads/".$file_name;

         move_uploaded_file($file_tmp,$file_store);
        

         $sql="UPDATE products SET name='$newName',price='$newPrice',picture='$file_path',description='$newDesc',category_id='$newCate' WHERE id='$newId'";

        if(mysqli_query($connect,$sql)){
           header('location: productsshow.php');
         }else{
            header('location: adminindex.php');
        }

    }
    


?>