<?php
  include_once('../includes/dbConnect.php');
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["level"])) {
    $level = $_GET["level"];
    $sql = "SELECT * FROM candidate_profiles WHERE education = '$level'";
  } else {
    $sql = "SELECT * FROM candidate_profiles LIMIT 15";
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
    <link rel="stylesheet" href="../css/card.css" />
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
      <p class="bcv-header">Cadidate</p>
    <div class="taskbar-2">
      <form action="candicateprofile.php" method="get">
        <ul class="sql-task">
          <li><button class="buttonn"type="submit">All</a></li>
          <li><button class="buttonn"type="submit" name="level" value="College">College</a></li>
          <li><button class="buttonn"type="submit" name="level" value="Graduate School">Graduate School</a></li>
          <li><button class="buttonn"type="submit" name="level" value="High School">High School</a></li>
        </ul>
      </form>
    </div>
    <ul class="certificate">
      <?php
        if ($resultCheck > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <li class="card green">
          <div class="general">
            <h3>
              <?php echo $row['full_name']; ?>
            </h3>
            <p style='color: black'>Preferred Job: <?php echo $row['preferred_job']; ?></p>
            <p style='color: black'>Experience: <?php echo $row['experience']; ?></p>
            <p style='color: black'>Skill: <?php echo $row['skill']; ?></p>
            <p style='color: black'>Education: <?php echo $row['education']; ?></p>
          </div>
        </li>
      <?php
          }
        }
      ?>
    </ul>

    <div class="bcv">
      <h1>Why Greeliving Hub is the best platform ?</h1>
    </div>
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
  </body>
</html>
    