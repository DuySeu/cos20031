<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Demo</title>
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

  <main>
    <hr id="headerdivider">
    <form action="job_application.php" method="post">
      <fieldset id="bigform2">
        <legend id="legendofbigform">Job Application</legend>

        <fieldset>
          <legend>Job Information</legend>
          <p>
            <label for="jobID">Job_ID</label>
            <input type="text" name="jobID" id="jobID" maxlength="25" size="50" required="required" placeholder="Enter job ID">
          </p>
        </fieldset>

        <fieldset>
          <legend>User Info</legend>
          <p>
            <label for="userID">User ID</label>
            <input type="text" name="userID" id="userID" maxlength="40" size="50" required="required" placeholder="Enter user ID">
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

        <button type="submit" value="Submit">Submit</button>
        <button type="reset" value="Submit">Reset</button>
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
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jobID"]) && isset($_POST["userID"])) {
      $jobID = $_POST["jobID"];
      $userID = $_POST["userID"];
      $sql = "INSERT INTO job_application (job_id, user_id, application_date) VALUES ('$jobID', '$userID', curdate())";
      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    ?>

</body>
</html>