<!DOCTYPE html>
<html>
<?php
    include("adminpartials/head.php");
    include("adminpartials/session.php");

?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
    include("adminpartials/header.php")
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
    include("adminpartials/aside.php")
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form role="form" action="proupdatehandler.php" method="post" enctype="multipart/form-data">
                <?php
                    include("../partials/connect.php");
                    $new_id=$_GET['up_id'];
                    $sql="SELECT * FROM products WHERE id='$new_id'";
                    $result=$connect->query($sql);
                    $final=$result->fetch_assoc();




                ?>
                    <h1>Products</h1>
                    <div class="box-body">
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" value="<?php echo $final['name']  ?>" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" value="<?php echo $final['price']  ?>" name="price" placeholder="Enter price">
                        </div>
                        <div class="form-group">
                        <label for="picture">File input</label>
                        <input type="file" name="file" id="picture" value="<?php echo $final['picture']  ?>">
                        </div>
                        <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description"   rows="10" placeholder="Enter description">
                        <?php echo $final['description']  ?>
                        </textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" name="category">
                            <?php
                                $cat="SELECT * FROM categories";
                                $results=mysqli_query($connect,$cat);
                                while($row=mysqli_fetch_assoc($results)){
                                  echo "<option value=".$row['id'].">".$row['name']."</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <input type="hidden" value="<?php echo $final['id']  ?>" name="form_id">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </section>
    
  </div>
  <!-- /.content-wrapper -->
  <?php
    include("adminpartials/footer.php")
  ?>
</body>
</html>
