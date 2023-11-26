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
  <link rel="stylesheet" href="../css/certificate.css" />
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
        <li><button type="submit">All</button></li>
        <li><button type="submit" name="courseName" value="Computer Science">Computer Science</button></li>
        <li><button type="submit" name="courseName" value="Mathematics">Math</button></li>
        <li><button type="submit" name="courseName" value="Biology">Biology</button></li>
        <li><button type="submit" name="courseName" value="Art">Art</button></li>
        <li><button type="submit" name="courseName" value="Geography">Geography</button></li>
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
          <div class="cert_id">
            Certifiate ID: <?php echo $row['certificate_id']; ?>
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
  <main>
    <hr id="headerdivider">
    <form method="post" action="certificate.php">
      <fieldset id="bigform">
        <legend id="legendofbigform">Certificate</legend>

        <fieldset>
          <legend>Personal Information</legend>
          <p>
            <label for="userID">User_ID</label>
            <input type="text" name="userID" id="userID" maxlength="25" size="50" required="required" placeholder="Enter user ID">
          </p>
        </fieldset>

        <fieldset>
          <legend>Certificate Information</legend>
          <p>
            <label for="course_id">Certificate_ID</label>
            <input type="text" name="course_id" id="course_id" maxlength="40" size="50" required="required" placeholder="Enter certificate ID">
          </p>
        </fieldset>

        <fieldset>
          <legend>Date Certificate Earned</legend>
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

  <?php
    include_once('../includes/dbConnect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userID"]) && isset($_POST["course_id"])) {
      $userID = $_POST["userID"];
      $course_id = $_POST["course_id"];
      $sql = "INSERT INTO enrollments (user_id, course_id, enrollment_date) VALUES ('$userID', '$course_id', curdate())";
      if (mysqli_query($conn, $sql)) {
        echo "Record created";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    ?>

</body>

</html>