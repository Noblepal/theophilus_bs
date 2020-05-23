<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('head.php'); ?>
  <body>
	  <?php include('navbar.php'); ?>
    <!-- END nav -->
<!--
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/img212.png'); background-position: top;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Registration</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section> -->

    <section class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5 mt-5 box well">
            <h2 class="mb-5">Register new account</h2>
            <?php
              if (isset($_GET['register'])) {
                if ($_GET['register'] == 0) {
                  ?>
                  <div class="col-md-12 alert alert-danger" role="alert">
                    <?php echo $_GET['message'];?>
                  </div>
                  <?php
                } else if ($_GET['register'] == 1){
                  ?>
                  <div class="col-md-12 alert alert-success" role="alert">
                    <?php echo $_GET['message'];?>
                  </div>
                  <script>
                    setTimeout(function(){
                      window.location.replace("index.php");
                    }, 2000);

                  </script>
                  <?php
                }
              }
            ?>
            <form action="" method="post">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Full Name</label>
                      <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="gender">Gender</label>
                      <select class="form-control" name="gender" id="gender" required>
                        <option value="" disabled selected>Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="email">Email Address</label>
                      <input type="text" name="email" id="email" class="form-control " required>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="name">Phone Number</label>
                      <input type="text" name="phone" id="phone" class="form-control " required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Password</label>
                      <input type="password" name="password" id="password" class="form-control " required>
                    </div>

                    <div class="col-md-6 form-group">
                      <label for="name">Re-type Password</label>
                      <input type="password" id="cpassword" class="form-control " required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <button type="submit" name="registerUser" class="btn btn-primary">Register</button>
                    </div>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </section>

    <?php include('footer.php'); ?>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <?php include('scripts.php'); ?>

  </body>
</html>
