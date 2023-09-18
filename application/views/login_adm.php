<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin || Log In</title>
    <base href="<?php echo base_url() ?>"/>
    <!-- Bootstrap -->
    <link rel="icon" href="assets/img/logo_bnpp.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrapku.min.css">
    <script type="text/javascript" src="assets/bootstrap/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrapku.min.js"></script>
  </head>
  <body style="background:url(assets/img/background-biru.png)">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <br><br><br><br><br>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="page-header">
                        <div class="login-box-body">
          <center><img src="assets/img/logo_bnpp.png" width="80x" height="70px"></center>
                            <h4 align="center" class="login-box-msg" style="color:green"><b>Login Administrator/KABAG</b></h4>
                        </div>
                        <form method="post" action="index.php/login_adm/proses_login_adm">
                            <div class="form-group">
                                <label for="inputEU1">Username</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="username" class="form-control" value="" placeholder=" Username" autofocus />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputPass1">Password</label>
                                <div class="input-group" >
                                     <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" name="password" class="form-control" placeholder=" Password"  />
                                </div>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox"/> Simpan</label>
                            </div>
                            <hr>
                            <a href="" class="btn btn-danger" ><span class="glyphicon glyphicon-arrow-left"> Back</span></a> &nbsp; &nbsp;
                            <button type="submit" name="login_adm" class="btn btn-success"><span class="glyphicon glyphicon-lock"></span> Login</button>
                        </form>
                        <hr>
                        <center><?php ?> <?php echo $this->config->item('nama_aplikasi'); ?></center>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>  