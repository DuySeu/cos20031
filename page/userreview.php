<?php
  include_once('../includes/dbConnect.php');
  $sql = "SELECT courses.course_name, users.username, user_reviews.rating, user_reviews.review_text, user_reviews.review_date
          FROM courses, users, user_reviews
          WHERE courses.course_id = user_reviews.course_id
          AND users.user_id = user_reviews.user_id";
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
    <div class="review">
      <table style="width: 100%;">
            <tr>
              <th>Review Name</th>
              <th>Course Review</th>
              <th>Rating</th>
              <th>Review</th>
              <th>Date</th>
            </tr>
            <?php
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['course_name']; ?></td>
              <td><?php echo $row['rating']; ?></td>
              <td><?php echo $row['review_text']; ?></td>
              <td><?php echo $row['review_date']; ?></td>
            </tr>
            <?php
                }
              }
            ?>
      </table>
    </div>
  </body>
</html>