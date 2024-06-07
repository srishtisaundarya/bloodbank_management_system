<html>
  <head>
    <body bgcolor="white" ><font color="red">

<div class="jumbotron" style="background-color:#f7f7f7;">
  <h1>Add donor details here. </h1>
  <hr class="my-4">
  <form action="" method="POST">
    <div class="form-group">
      <label>Donor Name</label><br>
      <input type="text" name="donor_name" placeholder="donor_name"><br><br>
    </div>
    <div class="form-group">
      <label>Sex</label><br>
      <input type="text" name="sex" placeholder="sex"><br><br>
      <!-- <input type="radio" name="sex" value={{request.form.sex}}> Male<br>
      <input type="radio" name="sex" value={{request.form.sex}}> Female<br>
      <input type="radio" name="sex" value={{request.form.sex}}> Other -->
    </div>
    <div class="form-group">
      <label>Age</label><br>
      <input type="number" name="age" placeholder="age"><br><br>
    </div>
    <div class="form-group">
      <label>Weight</label><br>
      <input type="number" name="weight" placeholder="weight"><br><br>
    </div>
    <div class="form-group">
      <label>Address</label><br>
      <input type="text" name="address" placeholder="address"><br><br>
    </div>
    <div class="form-group">
      <label>Disease</label><br>
      <input type="text" name="disease" placeholder="disease"><br><br>
    </div>
    <div class="form-group">
      <label>Email</label><br>
      <input type="email" name="email" placeholder="email"><br><br>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</font>
    </body>
  </head>
</html>


<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data if set
    $donor_name = isset($_POST['donor_name']) ? $_POST['donor_name'] : '';
    $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $disease = isset($_POST['disease']) ? $_POST['disease'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // database connection details
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

    // Prepare SQL statement to insert donor details into the database
    $sql = "INSERT INTO donor_details (donor_name, sex, age, weight, address, disease, email) VALUES ('$donor_name', '$sex', '$age', '$weight', '$address', '$disease', '$email')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
}
?>
