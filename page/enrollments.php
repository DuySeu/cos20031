<?php
  include_once('../includes/dbConnect.php');
  $sql = "SELECT courses.course_name, users.username, enrollments.enrollment_date
          FROM courses, enrollments, users
          WHERE courses.course_id = enrollments.course_id
          AND users.user_id = enrollments.user_id
          ORDER BY enrollments.enrollment_date DESC";
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
      <hr id="headerdivider">
      <form method="post" action="enrollments.php">
        <fieldset id="bigform2">
          <legend id="legendofbigform">Enrollment Form</legend>

          <fieldset>
            <legend>User Information</legend>
            <p>
              <label for="userID"></label> 
              <input type="text" name="userID" id="userID" maxlength="25" size="50" required="required" placeholder="Enter user ID">
            </p>
          </fieldset>

          <fieldset>
            <legend>Personal Information</legend>
            <p>
              <label for="courseID"></label> 
              <input type="text" name="courseID" id="courseID" maxlength="40" size="50" required="required" placeholder="Enter course ID">
            </p>
          </fieldset>
          <input type="submit" value="Submit" class="button">
          <input type="reset" value="Reset" class="button">
        </fieldset>
      </form>

    <div class="datahandling">
    <?php
    session_start();
    include_once('../includes/dbConnect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userID"]) && isset($_POST["courseID"])) {
      $_SESSION["userID"] = $_POST["userID"];
      $userID = $_POST["userID"];
      $courseID = $_POST["courseID"];
      $sql = "INSERT INTO enrollments (user_id, course_id, enrollment_date) VALUES ('$userID', '$courseID', curdate())";
      if (mysqli_query($conn, $sql)) {
        echo "Record created";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    ?>
    </div>

    <p class="bcv-header">Enrollmented</p>
    <div style="margin: 2em;">
      <table style="width: 100%;">
            <tr>
              <th>Course Name</th>
              <th>Name</th>
              <th>Enrollment Date</th>
            </tr>
            <?php
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row['course_name']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['enrollment_date']; ?></td>
            </tr>
            <?php
                }
              }
            ?>
      </table>
    </div>

  </body>
</html> 