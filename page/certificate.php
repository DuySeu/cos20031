<?php
  include_once('../includes/dbConnect.php');
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["courseName"])) {
    $courseName = $_GET["courseName"];
    $sql = "SELECT * FROM certificates WHERE course_name = '$courseName'";
  } else {
    $sql = "SELECT * FROM certificates LIMIT 15";
  }
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Trang Web Ví Dụ</title>
    <link rel="stylesheet" href="../css/web.css" />
  </head>
  <body>
    <div class="taskbar">
    <ul>
        <li class="mucluc"><a href="../index.php">Home page</a></li>
        <li class="mucluc"><a href="course.php">Course</a></li>
        <li class="mucluc"><a href="certificate.php">Certificate</a></li>
        <li class="mucluc"><a href="candicateprofile.php">Candicate profile</a></li>
        <li class="mucluc"><a href="jobopportunity.php"> Job opportunity</a></li>
        <li class="mucluc"><a href="User.php">User</a></li>
        <li class="mucluc"><a href="Userreview.php">User Review</a></li>
        <li class="mucluc"><a href="login.php">Login</a></li>
      </ul>
    </div>
    <div>
      <li><a href="certificateearned.php">Certificate Earned</a></li>
    </div>
    <div class="taskbar-2">
      <form action="certificate.php" method="get">
        <ul class="sql-task">
          <li><button type="submit">All</a></li>
          <li><button type="submit" name="courseName" value="Computer Science">Computer Science</a></li>
          <li><button type="submit" name="courseName" value="Mathematics">Math</a></li>
          <li><button type="submit" name="courseName" value="Biology">Biology</a></li>
          <li><button type="submit" name="courseName" value="Art">Art</a></li>
          <li><button type="submit" name="courseName" value="Geography">Geography</a></li>
        </ul>
      </form>
    </div>
    <ul class="certificate">
      <?php
      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <li class="cerificate-display">
          <div class="logo">
            <?php echo $row['issuing_authority']; ?>
          </div>
          <div class="marquee">
            <?php echo $row['certificate_name']; ?>
            </div>
          <div class="assignment">
            Validity period: <?php echo $row['validity_period']; ?> years
          </div>
          <div class="reason">
            <?php echo $row['description']; ?>
          </div>
        </li>
      <?php
        }
      }
      ?>
    </ul>
    </div>
  </body>
</html>