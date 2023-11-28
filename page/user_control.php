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
    <p class="bcv-header">Edit</p>
  </div>
  <hr id="headerdivider">
  <form action="user_control.php" method="post">
    <fieldset id="bigform2">
      <label for="current_name">Enter current username:</label><br>
      <input type="text" name="current_name" id="current_name" required="required" placeholder="Enter current username" maxlength="25" size="50"><br><br>
      <label for="name">Name:</label><br>
      <input type="text" name="name" id="name" placeholder="Enter new username" maxlength="25" size="50"><br><br>
      <label for="password">Password:</label><br>
      <input type="text" name="password" id="password" placeholder="Enter new password" maxlength="40" size="50"><br><br>
      <label for="email">Email:</label><br>
      <input type="text" name="email" id="email" placeholder="Enter new email" maxlength="40" size="50"><br><br>
      <label for="role">Role:</label><br>
      <input type="text" name="role" id="role" placeholder="Enter new role" maxlength="40" size="50"><br><br>
      <input type="submit" value="Submit">
      <input type="reset" value="Reset">
    </fieldset>
  </form>

  <div class="update_user_info">
  <?php
  include_once('../includes/dbConnect.php');
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["current_name"]) && 
  ( (isset($_POST["name"]) && ($_POST["name"] != '')) || (isset($_POST["password"]) && ($_POST["password"] != '')) || (isset($_POST["email"]) && ($_POST["email"] != '')) || (isset($_POST["role"]) && ($_POST["role"] != '')) )) {
    $current_name = $_POST["current_name"];
    $sql = "UPDATE users";
    if (isset($_POST["name"]) && ($_POST["name"] != '')) {
      $name = $_POST["name"];
      $sql .= " SET username = '$name'";
    }
    if (isset($_POST["password"]) && ($_POST["password"] != '')) {
      $password = $_POST["password"];
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      if ($sql != "UPDATE users") {
        $sql .= ", password = '$hashed_password'";
      } else {
        $sql .= " SET password = '$hashed_password'";
      }
    }
    if (isset($_POST["email"]) && ($_POST["email"] != '')) {
      $email = $_POST["email"];
      if ($sql != "UPDATE users") {
        $sql .= ", email = '$email'";
      } else {
        $sql .= " SET email = '$email'";
      }
    } 
    if (isset($_POST["role"]) && ($_POST["role"] != '')) {
      $role = $_POST["role"];
      if ($sql != "UPDATE users") {
        $sql .= ", role = '$role'";
      } else {
        $sql .= " SET user_role = '$role'";
      }
    } 
    $sql .= " WHERE username = '$current_name'";
    if (mysqli_query($conn, $sql)) {
      echo "Updated record successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  else {
    echo "Please enter data to be changed";
  }
  ?>
  </div>

</body>

</html>