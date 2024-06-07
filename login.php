<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body bgcolor="white" align="center"><font color="red">

    <!-- Login form -->
<h1>BLOOD BANK MANAGEMENT WEBSITE</h1><br><br>
    <h2>Login Form</h2>
    <form action="ss.php" method="post">
        ENTER EMAIL OR PHONE NUMBER:<br><br>
        <input type="email" placeholder="Email or phone number" name="username"> <br> <br>
        ENTER PASSWORD:<br><br>
        <input type="password" placeholder="Password" name="password"> <br> <br>
        <button><a href="./index.html">Login </button></a>
        <p> <strong> Forgotten Password </strong> </p>
        <button><a href="./signup.php">Donot have account? Create New Account</a></button>
    </form>
    <br>
    <br>
    <br>
</body>
</html>


<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

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

    // Prepare SQL statement to retrieve user from the database
    $sql = "SELECT * FROM users WHERE (contact = '$username' OR email = '$username') AND password = '$password'";
    $result = $conn->query($sql);

    // Check if user exists and password is correct
    if ($result->num_rows == 1) {
        // User found, set session variables and redirect to home page
        $_SESSION['username'] = $username;
        header("Location: home.php"); // Change this to the path of your home page
        exit();
    } else {
        // User not found or password incorrect, display error message
        echo "Invalid username or password";
    }

    $conn->close();
}
?>
