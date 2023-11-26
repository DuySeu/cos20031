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
    <main>
      <hr id="headerdivider">
      <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php">
        <fieldset id="bigform2">
          <legend id="legendofbigform">Enrollment Form</legend>

          <fieldset>
            <legend>Job Information</legend>
            <p>
              <label for="jobID">Job_ID</label> 
              <input type="text" name="jobID" id="jobID" maxlength="25" size="50" required="required">
            </p>
          </fieldset>

          <fieldset>
            <legend>Personal Information</legend>
            <p>
              <label for="courseID">User_ID</label> 
              <input type="text" name="courseID" id="courseID" maxlength="40" size="50" required="required">
            </p>
          </fieldset>
          <input type="submit" value="Submit" class="button">
          <input type="reset" value="Reset" class="button">
        </fieldset>
      </form>
    </main>
  </body>
</html> 