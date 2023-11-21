<?php
  include_once('includes/dbConnect.php');
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["level"])) {
    $level = $_GET["expertise"];
    $sql = "SELECT * FROM instructors WHERE expertise = '$level'";
  } else {
    $sql = "SELECT * FROM instructors LIMIT 15";
  }
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Trang Web Ví Dụ</title>
    <link rel="stylesheet" href="css/index.css" />
  </head>
  <body>
    <div class="taskbar">
      <ul>
        <li class="mucluc"><a href="index.php">Home page</a></li>
        <li class="mucluc"><a href="page/course.php">Course</a></li>
        <li class="mucluc"><a href="page/candicateprofile.php">Candicate profile</a></li>
        <li class="mucluc"><a href="page/jobopportunity.php"> Job opportunity</a></li>
        <li class="mucluc"><a href="page/contact.php">Contact</a></li>
      </ul>
    </div>

    <div class="main-content">
      <p class ="title"; style="color: white; font-size: 70px;">Welcome to our platform !</p>
      <p>Our platform is created for community purposes. Especially for those </br>
      who need to acquire knowledge and those who want to transmit this knowledge. Simply put,</br>
      we provide a place of teaching and learning for everyone who needs knowledge in social life.</p>
    </div>
    <div class="bcv">
      <p class="bcv-header">Advisory Board – Lecturers</p>
    </div>
    <div class="taskbar-2">
      <form action="candicateprofile.php" method="get">
        <ul>
          <li><button type="submit">All</a></li>
          <li><button type="submit" name="level" value="Advanced">Advanced</a></li>
          <li><button type="submit" name="level" value="Expert">Expert</a></li>
        </ul>
      </form>
    </div>
    <ul class="instructors">
      <?php
        if ($resultCheck > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <li style='border: solid 1px; border-radius: 1em;'>
            <img style='border-radius: 1em 1em 0 0' src='image/Mr-jan.jpg' alt='' width='100%' height='auto' />
            <h3> <?php echo $row['instructor_name']; ?></h3>
            <p style='color: black'> <?php echo $row['bio']; ?></p>
          </li>
      <?php
          }
        }
      ?>
    </ul>
  </body>
</html>
