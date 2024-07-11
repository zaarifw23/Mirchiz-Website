<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    // Insert data into the userInfo table
    $sql = "INSERT INTO userInfo (Name, Phone, Email) VALUES ('$name', '$phone', '$email')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Thank you for your Information! We will get back to you shortly.");window.location.href="index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
