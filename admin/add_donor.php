<?php include 'session.php'; ?>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

<style>
    body {
      background-color: #f8f9fa;
    }

    #sidebar {
      position: relative;
      margin-top: -20px;
    }

    #content {
      position: relative;
      margin-left: 210px;
      padding: 30px;
    }

    @media screen and (max-width: 768px) {
      #content {
        margin-left: 0;
      }
    }

    .form-section {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    h1.page-title {
      color: #b30000;
      font-weight: bold;
      text-align: center;
      margin-bottom: 30px;
    }

    .btn-primary {
      background-color: #b30000;
      border: none;
      transition: background 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #8b0000;
    }

    label,
    .font-italic {
      font-weight: 600;
      color: #333;
    }

    textarea {
      resize: none;
    }
  </style>
}
</style>
</head>

<body style="color:black">
  <?php
  include 'conn.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>
<div id="header">
<?php $active="add"; include 'header.php';
?>
</div>
<div id="sidebar">
<?php include 'sidebar.php'; ?>

</div>
 <div id="content">
      <div class="container-fluid">
        <div class="form-section">
          <h1 class="page-title text-center">Add New Donor</h1>

          <form name="donor" action="save_donor_data.php" method="post">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="font-italic">Full Name<span style="color:red">*</span></label>
                <input type="text" name="fullname" class="form-control" required pattern="[A-Za-z/\s]+" title="Only letters and spaces allowed">
              </div>
              <div class="form-group col-md-4">
                <label class="font-italic">Mobile Number<span style="color:red">*</span></label>
                <input type="text" name="mobileno" class="form-control" pattern="^\d{10}$" title="10 numeric characters only" maxlength="10" required>
              </div>
              <div class="form-group col-md-4">
                <label class="font-italic">Email ID<span style="color:red">*</span></label>
                <input type="email" name="emailid" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please enter a valid email">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="font-italic">Age<span style="color:red">*</span></label>
                <input type="number" name="age" class="form-control" min="18" max="65" title="Age should be between 18 and 65" required>
              </div>

              <div class="form-group col-md-4">
                <label class="font-italic">Gender<span style="color:red">*</span></label>
                <select name="gender" class="form-control" required>
                  <option value="">Select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>

              <div class="form-group col-md-4">
                <label class="font-italic">Blood Group<span style="color:red">*</span></label>
                <select name="blood" class="form-control" required>
                  <option value="" selected disabled>Select</option>
                  <?php
                  $sql = "SELECT * FROM blood";
                  $result = mysqli_query($conn, $sql) or die("Query unsuccessful.");
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <option value="<?php echo $row['blood_id']; ?>"><?php echo $row['blood_group']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="font-italic">Address<span style="color:red">*</span></label>
              <textarea class="form-control" name="address" rows="3" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary px-5">Submit</button>
          </form>
        </div>
      </div>
    </div>

  <?php
  } else {
    echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
  ?>
    <form method="post" action="login.php" class="form-horizontal mt-3">
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-4">
          <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
        </div>
      </div>
    </form>
  <?php } ?>
</body>

</html>
