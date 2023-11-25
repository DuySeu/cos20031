<?php
  include_once('../includes/dbConnect.php');
  $sql = "SELECT * FROM users";
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
    <p class="bcv-header">User list</p>
    <div style="margin: 2em;">
      <table style="width: 100%;">
        <tr>
          <th>User ID</th>
          <th>Name </th>
          <th>Password</th>
          <th>Email</th>
          <th>Role</th>
          <th>Edit</th>
        </tr>
      <?php
        if ($resultCheck > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <td><?php echo $row['user_id']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['password']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['user_role']; ?></td>
          <td><a href="#" class="btn">Edit</a></td>
        </tr>
      <?php
          }
        }
      ?>
      </table>
    </div>
  </body>
</html>