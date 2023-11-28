<?php
  include_once('../includes/dbConnect.php');
  $sql = "SELECT certificates.certificate_name, users.username, certificates_earned.date_earned
          FROM certificates, users, certificates_earned
          WHERE certificates.certificate_id = certificates_earned.certificate_id
          AND users.user_id = certificates_earned.user_id
          ORDER BY certificates_earned.date_earned DESC";
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
  <form method="post" action="certificateearned.php">
          <fieldset id="bigform2">
            <legend id="legendofbigform">Applies for a Certificate Form</legend>

            <fieldset>
              <legend>User Information</legend>
              <p>
                <label for="userID"></label> 
                <input type="text" name="userID" id="userID" maxlength="25" size="50" required="required" placeholder="Enter user ID">
              </p>
            </fieldset>
            <fieldset>
              <legend>Certificate Information</legend>
              <p>
                <label for="certificateID"></label> 
                <input type="text" name="certificateID" id="certificateID" maxlength="40" size="50" required="required" placeholder="Enter certificate ID">
              </p>
            </fieldset>
            <input type="submit" value="Submit" class="button">
            <input type="reset" value="Reset" class="button">
          </fieldset>
        </form>
  <div>
    <?php
      include_once('../includes/dbConnect.php');
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["certificateID"]) && isset($_POST["userID"])) {
        $certificateID = $_POST["certificateID"];
        $userID = $_POST["userID"];
        $sql = "INSERT INTO certificates_earned (certificate_id, user_id, date_earned) VALUES ('$certificateID', '$userID', curdate())";
        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    ?>
  </div>
  <p class="bcv-header">Earned</p>
    <div style="margin: 2em;">
      <table style="width: 100%;">
            <tr>
              <th>Certificate Name</th>
              <th>Name</th>
              <th>Earned Date</th>
            </tr>
            <?php
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row['certificate_name']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['date_earned']; ?></td>
            </tr>
            <?php
                }
              }
            ?>
      </table>
    </div>
</body>

</html>