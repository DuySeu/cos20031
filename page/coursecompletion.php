<?php
  include_once('../includes/dbConnect.php');
  $sql = "SELECT courses.course_name, users.username, course_completion.completion_date
          FROM courses, course_completion, users
          WHERE courses.course_id = course_completion.course_id
          AND users.user_id = course_completion.user_id";
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
    <p class="bcv-header">Course Completed</p>
    <div style="margin: 2em;">
      <table style="width: 100%;">
            <tr>
              <th>Course Name</th>
              <th>Name</th>
              <th>Date</th>
            </tr>
            <?php
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row['course_name']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['completion_date']; ?></td>
            </tr>
            <?php
                }
              }
            ?>
      </table>
    </div>
  </body>
</html>