<body bgcolor="white" ><font color="red">

  <div class="jumbotron text-centre" style="background-color:#f7f7f7;">
    <h1> Contact us </h1>
    <p>Contact for blood inquiries. Our 24x7 operated system understands emergencies.</p>
    <p> </p>
    <hr class="my-4">
  <form method="post">
    <div class="form-group">
      <label>Blood Group</label><br>
      <input type="text" name="bgroup"  placeholder="bgroup"><br><br>
    </div>
    <div class="form-group">
      <label>Number of Packets (units)</label><br>
      <input type="number" name="bpackets"  placeholder="bpackets"><br><br>
    </div>
      <div class="form-group">
        <label>Full Name</label><br>
        <input type="text" name="fname"  placeholder="fname" ><br><br>
      </div>

    <div class="form-group">
      <label>Address</label><br>
      <input type="text" name="address" placeholder="address"><br><br>
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
  </form>
</div>
</font>
</body>


<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $bgroup = $_POST['bgroup'];
    $bpackets = $_POST['bpackets'];
    $fname = $_POST['fname'];
    $address = $_POST['address'];

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

    // Prepare SQL statement to insert contact details into the database
    $sql = "INSERT INTO contact_details (blood_group, number_of_packets, full_name, address) 
            VALUES ('$bgroup', '$bpackets', '$fname', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "Contact details submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

