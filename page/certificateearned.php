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
  <div>
    <?php
    session_start();
    include_once('../includes/dbConnect.php');
    if ($_SESSION["userID"]) {
      $userID = $_SESSION["userID"];
      $sql = "SELECT certificates.certificate_id, certificates_earned.certificate_id, enrollments.course_id, certificates.certificate_name FROM 
        certificates, certificates_earned, enrollments 
        WHERE enrollments.user_id = '$userID' 
        AND certificates_earned.user_id = '$userID'
        AND enrollments.course_id = certificates_earned.certificate_id
        AND certificates_earned.certificate_id = certificates.certificate_id";

      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $certificate_name = $row['certificate_name'];
          echo "$certificate_name"."<br>";
        }
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    ?>
  </div>
</body>

</html>