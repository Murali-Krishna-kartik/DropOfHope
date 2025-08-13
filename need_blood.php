<?php
$active = 'need';
include('head.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Need Blood</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
   

    .form-section {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
      margin-top: 40px;
    }

    h1 {
      color: #b30000;
      font-weight: bold;
    }

    label,
    .font-italic {
      font-weight: bold;
      color: #333;
    }

    .btn-primary {
      background-color: #b30000;
      border: none;
    }

    .btn-primary:hover {
      background-color: #8b0000;
    }

    .card {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 30px;
    }

    .alert {
      font-weight: bold;
    }
  </style>
</head>

<body>

  <div class="container form-section">
    <h1 class="text-center mb-4">Need Blood</h1>
    <form name="needblood" action="" method="post">
      <div class="row">
        <div class="col-lg-6 mb-4">
          <label class="font-italic">Blood Group<span style="color:red">*</span></label>
          <select name="blood" class="form-control" required>
            <option value="" selected disabled>Select</option>
            <?php
            include 'conn.php';
            $sql = "SELECT * FROM blood";
            $result = mysqli_query($conn, $sql) or die("Query unsuccessful.");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <option value="<?php echo $row['blood_id']; ?>"><?php echo $row['blood_group']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-lg-6 mb-4">
          <label class="font-italic">Reason, why do you need blood?<span style="color:red">*</span></label>
          <textarea class="form-control" name="address" rows="3" required></textarea>
        </div>
      </div>

      <div class="row">
        <div class="col text-center">
          <input type="submit" name="search" class="btn btn-primary px-5" value="Search" style="cursor:pointer">
        </div>
      </div>
    </form>

    <div class="row mt-5">
      <?php
      if (isset($_POST['search'])) {
        $bg = $_POST['blood'];
        $sql = "SELECT * FROM donor_details JOIN blood ON donor_details.donor_blood = blood.blood_id WHERE donor_blood='{$bg}' ORDER BY rand() LIMIT 5";
        $result = mysqli_query($conn, $sql) or die("Query unsuccessful.");
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
      ?>
            <div class="col-lg-4 col-sm-6">
              <div class="card">
                <img class="card-img-top" src="image/heart.jpeg" alt="Card image" style="width:100%; height:300px">
                <div class="card-body">
                  <h4 class="card-title text-danger font-weight-bold"><?php echo $row['donor_name']; ?></h4>
                  <p class="card-text">
                    <strong>Blood Group:</strong> <?php echo $row['blood_group']; ?><br>
                    <strong>Mobile No.:</strong> <?php echo $row['donor_number']; ?><br>
                    <strong>Gender:</strong> <?php echo $row['donor_gender']; ?><br>
                    <strong>Age:</strong> <?php echo $row['donor_age']; ?><br>
                    <strong>Address:</strong> <?php echo $row['donor_address']; ?>
                  </p>
                </div>
              </div>
            </div>
          <?php
          }
        } else {
          echo '<div class="col-12"><div class="alert alert-danger text-center">No Donor Found For Your Selected Blood Group.</div></div>';
        }
      }
      ?>
    </div>
   
  </div>
  <br><br><br>
 <?php include 'footer.php'; ?>
</body>

</html>

