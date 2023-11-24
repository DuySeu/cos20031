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
            <legend>Course Information</legend>
            <p>
              <label for="courseID">Course_ID</label> 
              <input type="text" name="courseID" id="courseID" maxlength="40" size="50" required="required">
            </p>
          </fieldset>

          <fieldset>
            <legend>Enrollment Date</legend>
            <label for="day">Day:</label>
            <select id="day" name="day" required></select>

            <label for="month">Month:</label>
            <select id="month" name="month" required></select>

            <label for="year">Year:</label>
            <select id="year" name="year" required></select>
          </fieldset>

          <input type="submit" value="Submit" class="button">
          <input type="reset" value="Reset" class="button">
        </fieldset>
      </form>

      <script>
        var daySelect = document.getElementById("day");
        for (var i = 1; i <= 31; i++) {
          var option = document.createElement("option");
          option.value = i;
          option.text = i;
          daySelect.add(option);
        }
        var monthSelect = document.getElementById("month");
        var months = [
          "January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];
        for (var i = 0; i < months.length; i++) {
          var option = document.createElement("option");
          option.value = months[i];
          option.text = months[i];
          monthSelect.add(option);
        }
        var yearSelect = document.getElementById("year");
        var currentYear = new Date().getFullYear();
        for (var i = currentYear; i >= 1900; i--) {
          var option = document.createElement("option");
          option.value = i;
          option.text = i;
          yearSelect.add(option);
        }
      </script>
    </main>
  </body>
</html>