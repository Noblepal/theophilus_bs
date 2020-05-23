<?php

include('functions.php');

$results = array();

if(isset($_POST['search'])){
  $name=$_POST['q'];
  $results = searchCourses($name);

}

?>

<!DOCTYPE html>
<html lang="en">
  <?php include('head.php'); ?>
  <body>

    <?php include('navbar.php'); ?>
    <!-- END nav -->

    <section class="ftco-section">
			<div class="container px-4">
				<div class="row mt-1">
          <?php
          $num = sizeof($results);
          global $results;

          if ($num < 1) {
            ?>
              <div class="d-flex justify-content-center">
                <h1 class="text-center">No Results</h1>
            </div>
            <?php
          } else {
            echo "<div class=\"col-md-12\"><h2 class=\"\">Found ".$num." results</h2></div>";
            foreach($results as $course){
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
