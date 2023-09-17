<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url() ?>/assets/i/pos.jpg" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SIPPOS</title>
  </head>
  <body>
    <div class="container">
    <section class="vh-100">
      
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://4.bp.blogspot.com/-MDEDxcdq5Zc/Vxw6Jmw0lDI/AAAAAAAAXB8/JaI42iBz5JkIm33JZUkcCMymVVh19vYxQCLcB/s1600/Logo%2BPos%2BIndonesia.jpg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="<?php echo site_url('Login/validasi')?>" method="post" >

      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
        <?php $pesan =$this->session->flashdata('pesan');?>
            <?php if(isset($pesan)):?>
            <div class="alert alert-danger">
                <strong>Login Salah!</strong> Username dan Password Anda Salah !
            </div>
            <?php endif ?>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="username" id="form1Example13" class="form-control form-control-lg" placeholder="Masukan Username"/>
            <label class="form-label" for="form1Example13">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password"  name="password" id="form1Example23" class="form-control form-control-lg" placeholder="Masukan Password"/>
            <label class="form-label" for="form1Example23">Password</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!">Forgot password?</a>
          </div> -->

           <!-- register -->
            <p>Don't have an account? <a href="<?php echo site_url()?>/Login/register" class="link-info">Register here</a></p>
        

          <!-- Submit button -->
          <br>
          <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

        </form>
      </div>
    </div>
  </div>
</section>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>