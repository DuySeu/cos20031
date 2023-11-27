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
  <div class="bcv">
    <p class="bcv-header">Job Application</p>
  </div>
    <hr id="headerdivider">
    <form action="job_application.php" method="post">
      <fieldset id="bigform2">
        <label for="jobID">Job ID:</label><br>
        <input type="text" name="jobID" id="jobID" required="required" placeholder="Enter job ID" maxlength="25" size="50"><br>
        <label for="userID">User ID:</label><br>
        <input type="text" name="userID" id="userID" required="required" placeholder="Enter user ID" maxlength="40" size="50"><br><br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
      </fieldset>
    </form>

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