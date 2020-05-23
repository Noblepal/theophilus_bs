<?php

session_start();

// MySQL connection
$con = mysqli_connect('localhost', 'theophil_theophil', '9JNJppff{3%p', 'theophil_tbs');

if(isset($_SESSION['logged_in'])){

} else {
  #header("location: maintenance.html");
}

if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
  if(isset($_POST['registerUser'])){
    registerUser($_POST);
  } else if(isset($_POST['loginUser'])){
    loginUser($_POST);
  }
}

function getCourses(){
  global $con;
  $stmt=$con->prepare("SELECT * FROM courses ORDER BY title ASC");
  $stmt->execute();
  $courses = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->free_result();
  $stmt->close();
  return $courses;
}

function searchCourses($q){
  global $con;
  $query = "%" . $q . "%";
  $stmt=$con->prepare("SELECT * FROM courses WHERE title LIKE ? OR course_description LIKE ? OR type LIKE ? ORDER BY title ASC");
  $stmt->bind_param("sss", $query, $query, $query);
  $stmt->execute();
  $courses = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->free_result();
  $stmt->close();
  return $courses;
}

function getTopCourses(){
  global $con;
  $stmt=$con->prepare("SELECT * FROM courses WHERE popular = 'yes' ORDER BY created_at DESC LIMIT 5");
  $stmt->execute();
  //$stmt->store_result();
  $courses = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->free_result();
  $stmt->close();
  return $courses;
}

function registerUser($post){
  global $con;
  extract($post);

  if (isUserExists($email)) {
    header('location: register.php?register=0&message=Email address already exists');
  } else if(isUserExistsPhone($phone)){
    header('location: register.php?register=0&message=Phone number already exists');
  } else {
    $status = 'pending';
    $stmt=$con->prepare("INSERT INTO users (username, phone, email, password, gender,status, created_at) VALUES (?,?,?,?,?,?, now())");
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ssssss", $username, $phone, $email, $password, $gender, $status);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->affected_rows > 0) {
      $_SESSION['logged_in']=true;
      $_SESSION['username']=$username;
      $_SESSION['email']=$email;
      $_SESSION['phone']=$phone;
      header('location: register.php?register=1&message=Account created successfully. Redirecting...');
    } else {
      header('location: register.php?register=0&message='.$stmt->error);
    }
  }

}

function loginUser($post){
  global $con;
  extract($post);
  $stmt = $con->prepare("SELECT username, email, phone, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($username, $email, $phone, $hashed_password);
  $stmt->fetch();
  if ($stmt->num_rows > 0) {
    $stmt->free_result();
    $stmt->close();
    if (password_verify($password, $hashed_password)) {
      $_SESSION['logged_in']=true;
      $_SESSION['username']=$username;
      $_SESSION['email']=$email;
      $_SESSION['phone']=$phone;
      header('location: login.php?logged_in=1&message=Logged in successfully. Redirecting...');
    } else {
      header('location: login.php?logged_in=0&message=You have entered an incorrect password');
    }
  } else {
    header('location: login.php?logged_in=0&message=Account not found!');
  }
}

function isUserExists($email){
  global $con;
  $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    $stmt->close();
    return true;
  } else {
    $stmt->close();
    return false;
  }
}

function isUserExistsPhone($phone){
  global $con;
  $stmt = $con->prepare("SELECT * FROM users WHERE phone = ?");
  $stmt->bind_param("s", $phone);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    $stmt->close();
    return true;
  } else {
    $stmt->close();
    return false;
  }
}

 ?>
