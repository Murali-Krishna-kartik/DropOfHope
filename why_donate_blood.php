<?php 
$active = 'why';
include('head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Why Donate Blood?</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <style>
    body {
      background-image: url('admin_image/blood-cells.jpg');
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
    }

    .why-container {
      padding: 80px 0;
    }

    .why-box {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
    }

    .why-title {
     color: #b30000;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .why-text {
      font-size: 17px;
      line-height: 1.7;
      color: #333;
    }

    .why-img {
      height: 600px;
      width: 100%;
      max-width: 500px;
      object-fit: fixed;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
      .why-img {
        height: 300px;
        margin-top: 30px;
      }
    }
  </style>
</head>

<body>

<div class="container why-container">
  <div class="row justify-content-center">
    <div class="col-lg-10 why-box">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h3 class="why-title">Why Should I Donate Blood?</h3>
          <div class="why-text">
            <?php
              include 'conn.php';
              $sql = "SELECT * FROM pages WHERE page_type='donor'";
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
          <img class="img-fluid why-img" src="image\08f2fccc45d2564f74ead4a6d5086871.png" alt="error">
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>

