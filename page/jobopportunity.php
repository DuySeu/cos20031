<?php
  include_once('../includes/dbConnect.php');
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["level"])) {
    $level = $_GET["level"];
    $sql = "SELECT * FROM job_listings WHERE education = '$level'";
  } else {
    $sql = "SELECT * FROM job_listings LIMIT 15";
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
        <li class="mucluc"><a href="certificate.php">certificate</a></li>
        <li class="mucluc"><a href="candicateprofile.php">Candicate profile</a></li>
        <li class="mucluc"><a href="jobopportunity.php"> Job opportunity</a></li>
        <li class="mucluc"><a href="User.php">User</a></li>
        <li class="mucluc"><a href="Userreview.php">User Review</a></li>
        <li class="mucluc"><a href="login.php">Login</a></li>
      </ul>
    </div>
  <div class="taskbar-2">
    <form action="candicateprofile.php" method="get">
      <ul>
        <li><button type="submit">All</a></li>
        <li><button type="submit" name="level" value="College">College</a></li>
        <li><button type="submit" name="level" value="Graduate School">Graduate School</a></li>
        <li><button type="submit" name="level" value="High School">High School</a></li>
      </ul>
    </form>
  </div>
    <div class="bcv">
      <p class="bcv-header">Candidate</p>
    </div>
    <div class="job">
      <?php
        if ($resultCheck > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
      ?>
        

      <?php
          }
        }
      ?>
    </div>
    <main>
      <hr id="headerdivider">
      <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php">
        <fieldset id="bigform">
          <legend id="legendofbigform">User Application/legend>

          <fieldset>
            <legend>Job Information</legend>
            <p>
              <label for="jobID">Job_ID</label> 
              <input type="text" name="jobID" id="jobID" maxlength="25" size="50" required="required">
            </p>
          </fieldset>

          <fieldset>
            <legend>Course Information</legend>
            <p>
              <label for="courseID">Course_ID</label> 
              <input type="text" name="courseID" id="courseID" maxlength="40" size="50" required="required">
            </p>
          </fieldset>

          <fieldset>
            <legend>Application Date</legend>
            <label for="day">Day:</label>
            <select id="day" name="day" required></select>

            <label for="month">Month:</label>
            <select id="month" name="month" required></select>

            <label for="year">Year:</label>
            <select id="year" name="year" required></select>
          </fieldset>

          <input type="submit" value="Submit" class="button">
          <input type="reset" value="Reset" class="button">
        </fieldset>
      </form>

      <script>
        var daySelect = document.getElementById("day");
        for (var i = 1; i <= 31; i++) {
          var option = document.createElement("option");
          option.value = i;
          option.text = i;
          daySelect.add(option);
        }
        var monthSelect = document.getElementById("month");
        var months = [
          "January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];
        for (var i = 0; i < months.length; i++) {
          var option = document.createElement("option");
          option.value = months[i];
          option.text = months[i];
          monthSelect.add(option);
        }
        var yearSelect = document.getElementById("year");
        var currentYear = new Date().getFullYear();
        for (var i = currentYear; i >= 1900; i--) {
          var option = document.createElement("option");
          option.value = i;
          option.text = i;
          yearSelect.add(option);
        }
      </script>
    </main>
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