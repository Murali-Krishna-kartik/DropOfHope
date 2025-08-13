<?php
$active = 'donate';
include('head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Donate Blood</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
   
    .donate-container {
      padding: 80px 0;
    }

    .form-box {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
    }

    .form-title {
      color: #b30000;
      font-weight: bold;
      margin-bottom: 30px;
    }

    label, .font-italic {
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

    textarea {
      resize: none;
    }
  </style>
</head>

<body>

<div class="container donate-container">
  <div class="row justify-content-center">
    <div class="col-lg-10 form-box">
      <h2 class="form-title text-center">Donate Blood</h2>
      <form name="donor" action="savedata.php" method="post">
        <div class="row">
          <div class="col-lg-4 mb-4">
            <label class="font-italic">Full Name<span style="color:red">*</span></label>
            <input type="text" name="fullname" class="form-control" required pattern="[A-Za-z/\s]+" title="Only lower and upper case and space">
          </div>
          <div class="col-lg-4 mb-4">
            <label class="font-italic">Mobile Number<span style="color:red">*</span></label>
            <input type="text" name="mobileno" class="form-control" pattern="^\d{10}$" title="10 numeric characters only" maxlength="10" required>
          </div>
          <div class="col-lg-4 mb-4">
            <label class="font-italic">Email ID<span style="color:red">*</span></label>
            <input type="email" name="emailid" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please write correct email">
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 mb-4">
            <label class="font-italic">Age<span style="color:red">*</span></label>
            <input type="number" name="age" class="form-control" min="18" max="65" title="Age should be between 18 and 65" maxlength="2" required>
          </div>
          <div class="col-lg-4 mb-4">
            <label class="font-italic">Gender<span style="color:red">*</span></label>
            <select name="gender" class="form-control" required>
              <option value="">Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="col-lg-4 mb-4">
            <label class="font-italic">Blood Group<span style="color:red">*</span></label>
            <select name="blood" class="form-control" required>
              <option value="" selected disabled>Select</option>
              <?php
                include 'conn.php';
                $sql= "SELECT * FROM blood";
                $result = mysqli_query($conn, $sql) or die("Query unsuccessful.");
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <option value="<?php echo $row['blood_id']; ?>"><?php echo $row['blood_group']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 mb-4">
            <label class="font-italic">Address<span style="color:red">*</span></label>
            <textarea class="form-control" name="address" rows="3" required></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col text-center">
            <input type="submit" name="submit" class="btn btn-primary px-5" value="Submit" style="cursor:pointer">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>

