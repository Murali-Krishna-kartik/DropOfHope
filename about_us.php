<?php 
$active = 'about';
include('head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About Us</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <style>
   
    .page-container {
      padding: 80px 0;
    }

    .about-box {
      background-color: rgba(255, 255, 255, 0.94);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
    }

    .about-title {
      color: #b30000;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .about-text {
      font-size: 17px;
      line-height: 1.7;
    }

    .about-image {
      height: 400px;
      border-radius: 10px;
      object-fit: fixed;
      box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    @media (max-width: 768px) {
      .about-image {
        height: 300px;
        margin-top: 30px;
      }
    }
  </style>
</head>

<body>
  <div class="container page-container">
    <div class="row justify-content-center">
      <div class="col-lg-10 about-box">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2 class="about-title">About Us</h2>
            <div class="about-text">
              <?php
                include 'conn.php';
                $sql = "SELECT * FROM pages WHERE page_type='aboutus'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo nl2br($row['page_data']);
                  }
                }
              ?>
            </div>
          </div>
          <div class="col-md-6 text-center">
            <img src="image/banner_590x300.jpg"  alt="About Image" class="img-fluid about-image" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('footer.php'); ?>
</body>
</html>
