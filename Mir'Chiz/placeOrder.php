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
    $fname = $_POST["firstname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];

    // Assuming that UserID is stored in the session
    session_start();
    if (isset($_SESSION["UserID"])) {
        $userID = $_SESSION["UserID"];

        // Insert order with UserID
        $sql = "INSERT INTO orders (UserID, firstName, Email, Address, City, State, Zip) VALUES 
        ('$userID', '$fname', '$email', '$address', '$city', '$state', '$zip')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            // Retrieve the last inserted OrderID
            $lastOrderID = $conn->insert_id;

            // Return the OrderID as part of the response
            echo '<script>alert("Order Placed Successfully. Your OrderID is: ' . $lastOrderID . '"); window.location.href="index.php";</script>';
        } else {
            // Return an error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "UserID not found in session.";
    }

    // Close the database connection
    $conn->close();
}
?>
