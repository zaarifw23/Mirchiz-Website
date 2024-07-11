<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $email = $_POST["email"];
    $password_input = $_POST["password"];

    // SQL query to retrieve user data based on the provided email
    $sql = "SELECT UserID, Email, Password, UserName FROM users WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Verify the password for each fetched row
            if (password_verify($password_input, $row["Password"])) {
                // Password is correct for one of the rows, perform login
                $_SESSION["UserID"] = $row["UserID"];
                $_SESSION["Email"] = $row["Email"];

                // Display a personalized welcome message
                $welcomeMessage = "Welcome Back " . $row["UserName"] . "!";

                // Check if the user is an admin
                if ($row["Email"] == "admin@mirchiz.lk") {
                    // Redirect admin to the admin page
                    $conn->close(); // Close the database connection
                    echo '<script>alert("Welcome Back Admin !"); window.location.href="index.php";</script>';
                    exit();
                } else {
                    // Redirect normal users to the home page
                    $conn->close(); // Close the database connection
                    echo '<script>alert("' . $welcomeMessage . '"); window.location.href="index.php";</script>';
                    exit();
                }
            }
        }
        // If the loop finishes, it means no matching password was found
        echo '<script>alert("Invalid password."); window.location.href="Login.php";</script>';
        exit();
    } else {
        // Email not found
        echo '<script>alert("Email not found."); window.location.href="Login.php";</script>';
        exit();
    }
}
?>
