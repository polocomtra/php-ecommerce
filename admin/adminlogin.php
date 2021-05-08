<?php
    include("adminpartials/head.php");
    include("../partials/connect.php");
    session_start();
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT * from admins WHERE username='$email' and password='$password'";
        $result=$connect->query($sql);
        $final=$result->fetch_assoc();
        $_SESSION['email']=$final['email'];
        $_SESSION['password']=$final['password'];
        
        if($email=$final['username'] and $password=$final['password']){
            header('location: adminindex.php');
        }else{
            header('location: adminlogin.php');
        }
    }
?>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Admin login</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="adminlogin.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3"  class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="login">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
    <div class="col-sm-4"></div>
</div>