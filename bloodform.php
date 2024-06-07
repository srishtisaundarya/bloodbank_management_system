
<body><font color="red">
  <div class="jumbotron">
  <h1>Blood details </h1>
  <hr class="my-4">
  <form action="" method="POST">
    <div class="form-group">
      <label>Donor ID</label><br>
      <input type="number" name="donor_id" placeholder="donor_id"><br><br>
    </div>
    <div class="form-group">
      <label>Blood Group</label><br>
      <input type="text" name="blood_group" placeholder="blood_group"><br><br>
    <div class="form-group">
      <label>Packets Donated</label><br>
      <input type="number" name="packets" placeholder="packets"><br><br>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</font>
</body>


<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $donor_id = $_POST['donor_id'];
    $blood_group = $_POST['blood_group'];
    $packets = $_POST['packets'];

    // Your database connection details
    $servername = "localhost"; // Change this to your database server
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "blood_bank"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert blood details into the database
    $sql = "INSERT INTO blood_details (donor_id, blood_group, packets) 
            VALUES ('$donor_id', '$blood_group', '$packets')";

    if ($conn->query($sql) === TRUE) {
        echo "Blood details submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


