<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Contact | Blood Donation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & jQuery -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Sticky Footer Style -->
  <style>
    html, body {
      height: 100%;
      margin: 0;
      background-color: #f8f9fa;
    }

    .wrapper {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
    }

    .footer {
      background-color: #343a40;
      color: #fff;
      text-align: center;
      padding: 15px 10px;
    }

    .contact-card {
      background-color: #fff;
      padding: 40px 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .section-title {
      color: #d62828;
      font-weight: 700;
    }

    .form-group label {
      font-weight: 600;
    }

    .contact-details h5 {
      color: #d62828;
    }
  </style>
</head>

<body>
<?php 
  $active = 'contact';
  include 'head.php'; 
?>

<?php
if (isset($_POST["send"])) {
    $name = htmlspecialchars($_POST['fullname']);
    $number = htmlspecialchars($_POST['contactno']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $conn = mysqli_connect("localhost", "root", "", "blood_donation");
    if (!$conn) {
        die("Connection error: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("INSERT INTO contact_query (query_name, query_mail, query_number, query_message, query_status) VALUES (?, ?, ?, ?, 2)");
    $stmt->bind_param("ssss", $name, $email, $number, $message);

    if ($stmt->execute()) {
        echo '<div class="container mt-4"><div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your query has been sent.</div></div>';
    } else {
        echo '<div class="container mt-4"><div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Please try again later.</div></div>';
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Wrapper keeps footer at bottom -->
<div class="wrapper">

  <!-- Page Content -->
  <div class="content">
    <div class="container py-5">
      <div class="contact-card">

        <h2 class="section-title text-center mb-4">Contact Us</h2>
        <div class="row">
          <!-- Left: Form -->
          <div class="col-md-7">
            <form method="post">
              <div class="form-group">
                <label>Full Name:</label>
                <input type="text" class="form-control" name="fullname" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" required>
              </div>
              <div class="form-group">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" name="contactno" pattern="^\d{10}$" title="10 numeric characters only" maxlength="10" required>
              </div>
              <div class="form-group">
                <label>Email Address:</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label>Message:</label>
                <textarea class="form-control" name="message" rows="5" maxlength="999" required></textarea>
              </div>
              <button type="submit" name="send" class="btn btn-danger btn-block">Send Message</button>
            </form>
          </div>
		
          <!-- Right: Contact Info -->
          <div class="col-md-5 mt-4 mt-md-0 contact-details">
            <h5>Emergency Contact Info</h5>
            <hr>
            <?php
            include 'conn.php';
            $sql = "SELECT * FROM contact_info";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                  <p><strong>Address:</strong><br><?php echo nl2br($row['contact_address']); ?></p>
                  <p><strong>Phone:</strong><br><?php echo $row['contact_phone']; ?></p>
                  <p><strong>Email:</strong><br><a href="mailto:<?php echo $row['contact_mail']; ?>"><?php echo $row['contact_mail']; ?></a></p>
            <?php } } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Always at the Bottom -->
  <?php include 'footer.php' ?>
</div>

</body>
</html>

