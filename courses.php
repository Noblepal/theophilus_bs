<?php

include('functions.php');

?>
<!DOCTYPE html>
<html lang="en">
  <?php include('head.php'); ?>
  <body>

    <?php include('navbar.php'); ?>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/blackboard.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Courses</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Courses <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
			<div class="container-fluid px-4">
				<div class="row">

          <?php $courses = getCourses();

          foreach($courses as $course){
            ?>
            <div class="col-md-3 course ftco-animate">
  						<div class="img" style="background-image: url('https://via.placeholder.com/300x300');"></div>
  						<div class="text pt-4">
  							<p class="meta d-flex">
  								<span><i class="icon-user mr-2"></i><?php echo $course['teacher'];?></span>
  								<span><i class="icon-calendar mr-2"></i><?php echo $course['duration'];?> Weeks</span>
  							</p>
  							<h3><a href="#"><?php echo $course['title'];?></a></h3>
  							<p><?php echo $course['course_description'];?></p>
  							<p><a href="apply-course.php?course_id=<?php echo $course['id'];?>" class="btn btn-primary">Apply now</a></p>
  						</div>
  					</div>
            <?php
          }

          ?>
				</div>
			</div>
		</section>

    <?php include('footer.php'); ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("scripts.php"); ?>

  </body>
</html>
