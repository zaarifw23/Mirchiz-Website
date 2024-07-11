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
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $contact = $_POST["contact"];

    // SQL query to check if email exists in the database
    $check_email_query = "SELECT COUNT(*) AS email_count FROM users WHERE Email = '$email'";
    $result = $conn->query($check_email_query);

    // SQL query to check if username exists in the database
    $check_username_query = "SELECT COUNT(*) AS username_count FROM users WHERE UserName = '$username'";
    $result2 = $conn->query($check_username_query);

    if ($result && $result2) {
        $row = $result->fetch_assoc();
        $row2 = $result2->fetch_assoc();
        if ($row['email_count'] > 0) {
            echo '<script>alert("Email already exists. Please use a different email."); window.location.href="Register.php";</script>';
            exit; // Stop further execution
        } elseif ($row2['username_count'] > 0) {
            echo '<script>alert("Username already exists. Please choose a different username."); window.location.href="Register.php";</script>';
            exit; // Stop further execution
        } else {
            // Email doesn't exist, proceed with insertion
            // SQL query to insert data into the database
            $insert_query = "INSERT INTO users (UserName, Email, Password, Telephone) VALUES ('$username', '$email', '$password', '$contact')";

            // Execute the query
            if ($conn->query($insert_query) === TRUE) {
                echo '<script>alert("Account Created Successfully"); window.location.href="Login.php";</script>';
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Error checking email: " . $conn->error;
        exit; // Stop further execution
    }

    // Close the database connection
    $conn->close();
}
?>
