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
    <form method="post" action="">
      <fieldset id="bigform1">
        <legend id="legendofbigform">Course Review</legend>
            <fieldset>
                <legend>Personal information</legend>
                <p>
                    <label for="firstname">User_ID</label> 
                    <input type="text" name="firstname" id="firstname" maxlength="25" size="50" required="required">
                </p>
            </fieldset>

            <fieldset>
                <legend>Course Information</legend>
                <p>
                    <label for="streetaddress">Course_ID</label> 
                    <input type="text" name="streetaddress" id="streetaddress" maxlength="40" size="50" required="required">
                </p>
            </fieldset>
            <fieldset>
                <legend>Service Rating (1-5)</legend>
                <div class="rating">
                  <input type="radio" id="star5" name="rating" value="5" required>
                  <label for="star5"></label>
                  <input type="radio" id="star4" name="rating" value="4" required>
                  <label for="star4"></label>
                  <input type="radio" id="star3" name="rating" value="3" required>
                  <label for="star3"></label>
                  <input type="radio" id="star2" name="rating" value="2" required>
                  <label for="star2"></label>
                  <input type="radio" id="star1" name="rating" value="1" required>
                  <label for="star1"></label>
                </div>
              </fieldset>
            <fieldset>
                <legend>User Comment</legend>
                <textarea id="enquiry" name="enquiry" rows="5" cols="50" placeholder="Specify a particular aspect you are interested in!"></textarea>
            </fieldset>
            <input type= "submit" value="Submit" class="button">
            <input type= "reset" value="Reset" class="button">
      </fieldset>
    </form>
  </body>
</html>