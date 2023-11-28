<?php
  include_once('../includes/dbConnect.php');
  $sql = "SELECT job_listings.job_title, users.username, job_application.application_date
          FROM job_listings, users, job_application
          WHERE job_listings.job_id = job_application.job_id
          AND users.user_id = job_application.user_id
          ORDER BY job_application.application_date DESC";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
?>
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
      <form method="post" action="job_application.php">
          <fieldset id="bigform2">
            <legend id="legendofbigform">Application Form</legend>

            <fieldset>
              <legend>User Information</legend>
              <p>
                <label for="userID"></label> 
                <input type="text" name="userID" id="userID" maxlength="25" size="50" required="required" placeholder="Enter user ID">
              </p>
            </fieldset>
            <fieldset>
              <legend>Job Information</legend>
              <p>
                <label for="jobID"></label> 
                <input type="text" name="jobID" id="jobID" maxlength="40" size="50" required="required" placeholder="Enter jobb ID">
              </p>
            </fieldset>
            <input type="submit" value="Submit" class="button">
            <input type="reset" value="Reset" class="button">
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
  <p class="bcv-header">Applied</p>
    <div style="margin: 2em;">
      <table style="width: 100%;">
            <tr>
              <th>Applied Job</th>
              <th>Name</th>
              <th>Application Date</th>
            </tr>
            <?php
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row['job_title']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['application_date']; ?></td>
            </tr>
            <?php
                }
              }
            ?>
      </table>
    </div>
  </body>
</html>