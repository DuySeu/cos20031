<?php
  include_once('../includes/dbConnect.php');
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["courseName"])) {
    $courseName = $_GET["courseName"];
    $sql = "SELECT * FROM courses WHERE course_name = '$courseName'";
  } else {
    $sql = "SELECT * FROM courses LIMIT 15";
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
        <li ><a href="coursecompletion.php">Course Completion</a></li>
        <li ><a href="enrollment.php">Enrollment</a></li>
      </div>
    <div class="taskbar-2">
      <form action="course.php" method="get">
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
    <div class="bcv">
      <h3>Our business offers you 5 main courses to improve the level of students and help them access the working environment more easily</h3>
    </div>
    <ul class="course">
      <?php
      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <li style='border: solid 1px; border-radius: 1em;'>
            <img style='border-radius: 1em 1em 0 0' src='../image/course.jpg' alt='' width='100%' height='auto' />
            <h3> <?php echo $row['course_name']; ?></h3>
            <p style='color: black'> <?php echo $row['description']; ?></p>
          </li>
      <?php
        }
      }
      ?>
    </ul>
    </div>
    <div class="bcv">
      <h1>Why Greeliving Hub is the best platform ?</h1>
      <div class="container">
        <div class="sub-container">
          <img src="../image/No.1.svg" alt="" width="225" height="225" />
          <h3 style="text-align: center">No.1</h3>
          <p style="color: black; text-align: center">World-class training and enrollment partner</p>
        </div>
        <div class="sub-container">
          <img src="../image/No.2.svg" alt="" width="225" height="225" />
          <h3 style="text-align: center">No.2</h3>
          <p style="color: black; text-align: center">The training program is highly practical <br>and associated with practice</p>
        </div>
        <div class="sub-container">
          <img src="../image/No.3.svg" alt="" width="225" height="225" />
          <h3 style="text-align: center">No.3</h3>
          <p style="color: black; text-align: center">Output results are evidenced by employment <br>and salary after graduation</p>
        </div>
        <div class="sub-container">
          <img src="../image/No.4.svg" alt="" width="225" height="225" />
          <h3 style="text-align: center">No.4</h3>
          <p style="color: black; text-align: center">One-on-one support service by teachers from schools, <br>advisors from businesses, and experts <br>in each industry and profession</p>
        </div>
        <div class="sub-container">
          <img src="../image/No.5.svg" alt="" width="225" height="225" />
          <h3 style="text-align: center">No.5</h3>
          <p style="color: black; text-align: center">The exchange community is closely linked between <br> businesses - training organizations - students</p>
        </div>
      </div>
    </div>
  </body>
</html>