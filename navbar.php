<div class="bg-top navbar-light">
  <div class="container-fluid">
    <div class="row no-gutters d-flex align-items-center align-items-stretch">
      <div class="col-md-4 d-flex align-items-center py-4 form-inline">
        <a class="navbar-brand" href="index.php"><img width="300" src="./images/logoman2.png"/></a>
      </div>
      <div class="col-lg-8 d-block my-auto">
        <div class="row d-flex">
          <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
            <div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
            <div class="text">
              <span>Email</span>
              <span>theophluspracticalbibleschool@gmail.com</span>
            </div>
          </div>
          <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
            <div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
            <div class="text">
              <span>Call</span>
              <span>Call Us: +254-727-805511 +254-720-928720</span>
            </div>
          </div>
          <div class="col-md topper d-flex align-items-center justify-content-end">
            <p class="mb-0">
              <a href="#" class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
                <span>Enroll now</span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container-fluid d-flex align-items-center px-4">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a href="index.php" class="nav-link pl-0">Home</a></li>
        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
        <li class="nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
      </ul>

      <form action="search.php" method="post" class="searchform mx-auto">
        <div class="form-group d-flex">
          <input type="text" name="q" class="form-control pl-3" placeholder="Search for a course">
          <button type="submit" name="search" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
        </div>
      </form>

      <ul class="navbar-nav order-lg-last">
        <?php
          if (isset($_SESSION['logged_in'])) {
            ?>
            <li class="nav-item"><a href="profile.php" class="nav-link"><?php echo $_SESSION['username'];?></a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            <?php
          } else {
          ?>
            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
          <?php } ?>
      </ul>
    </div>
  </div>
</nav>
