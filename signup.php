 <!DOCTYPE html>
<html lang="en">
    <head>
        <title>signup</title>
    </head>
    <body align="center"><font color="red">
<!-- Sign up form -->
<h1>BLOOD BANK MANAGEMENT WEBSITE</h1><br>
        <h2>SIGN UP</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        First name:<br><br>
        <input type="text" name= "firstname" placeholder="First name"><br><br>
        LAST NAME:<br><br>
        <input type="text" name="lastname" placeholder="Last name"> <br> <br>
        ENTER NUMBER OR EMAIL-ID:<br><br>
        <input type="text" name="contact" placeholder="Mobile number or Email"> <br> <br>
        ENTER NEW PASSWORD:<br><br>
        <input type="text" name="" placeholder="New Password">

        <p> <strong> GENDER: </strong> </p>
        <input type="radio" name="gender"> Male
        <input type="radio" name="gender"> Female
        <input type="radio" name="gender"> Custom<br><br>

        <button type="submit"><a href="./index.html">Sign UP</a></button>

        <br>
        </font>
    </body></html>


    <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // Database connection
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

    // Insert data into database
    $sql = "INSERT INTO users (firstname, lastname, contact, password, gender) VALUES ('$firstname', '$lastname', '$contact', '$password', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
