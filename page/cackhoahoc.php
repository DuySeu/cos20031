<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Trang Web Ví Dụ</title>
    <link rel="stylesheet" href="../css/web.css" />
    <link rel="stylesheet" href="../css/course.css" />
  </head>
  <body>
    <div class="taskbar">
      <ul>
        <li><a href="../index.php">Home page</a></li>
        <li><a href="cackhoahoc.php">Course</a></li>
        <li><a href="hosoungvien.php">Candicate profile</a></li>
        <li><a href="cohoivieclam.php"> Job opportunity</a></li>
        <li><a href="lienhe.php">Contact</a></li>
      </ul>
    </div>
  <div class="bcv">
    <h1>Course</h1>
    <h3>Our business offers you 5 main courses to improve the level of students and help them access the working environment more easily</h3>
  </div>
  <div class="container">
    <h2 class="product-title">Course</h2>
  </div>
  <hr>

  <hr>
  <ul class="course_display">
    <?php
    include_once('../includes/dbConnect.php');
    $sql = "SELECT * FROM courses";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $courseName = $row['course_name'];
          $description = $row['description'];
            echo "
              <li class='course_detail'>
                <h3>$courseName</h3>
                <p style='color: black;'>$description</p>
              </li>
            ";
        }
    }
    ?>            
  </ul>
  <!-- <div class="container">
    <h2 class="product-title">Course</h2>
      <ul>
        <li class="img_wrapper">
            <h3>$courseName</h3>
            <h3>$description</h3>
        </li>
      </ul>
  </div> -->
  <!-- <div class="bcv">
    <h1>Why Greeliving Hub is the best platform ?</h1>
    <div class="container">
      <div class="sub-container">
        <img src="./image/1.svg" alt="" width="225" height="225" />
        <h3 style="text-align: center">No.1</h3>
        <p style="color: black; text-align: center">World-class training and enrollment partner</p>
      </div>
      <div class="sub-container">
        <img src="./image/2.svg" alt="" width="225" height="225" />
        <h3 style="text-align: center">No.2</h3>
        <p style="color: black; text-align: center">The training program is highly practical <br>and associated with practice</p>
      </div>
      <div class="sub-container">
        <img src="./image/3.svg" alt="" width="225" height="225" />
        <h3 style="text-align: center">No.3</h3>
        <p style="color: black; text-align: center">Output results are evidenced by employment <br>and salary after graduation</p>
      </div>
      <div class="sub-container">
        <img src="./image/4.svg" alt="" width="225" height="225" />
        <h3 style="text-align: center">No.4</h3>
        <p style="color: black; text-align: center">One-on-one support service by teachers from schools, <br>advisors from businesses, and experts <br>in each industry and profession</p>
      </div>
      <div class="sub-container">
        <img src="./image/5.svg" alt="" width="225" height="225" />
        <h3 style="text-align: center">No.5</h3>
        <p style="color: black; text-align: center">The exchange community is closely linked between <br> businesses - training organizations - students</p>
      </div>
    </div>
  </div> -->