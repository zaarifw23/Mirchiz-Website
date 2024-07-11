<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["UserID"])) {
    // Redirect to login page if not logged in
    header("Location: Login.php");
    exit();
}

// Check if the user is an admin
if ($_SESSION['Email'] !== 'admin@mirchiz.lk') {
    echo '<script>alert("Unauthorized Access."); window.location.href="index.php";</script>';
    exit();
}

// Include your database connection parameters
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

// Check if UserID is provided through POST
if (isset($_POST['userId']) && is_numeric($_POST['userId'])) {
    $userIdToDelete = $_POST['userId'];

    // Prepare and execute SQL statement to delete the user
    $stmt = $conn->prepare("DELETE FROM users WHERE UserID = ?");
    $stmt->bind_param("i", $userIdToDelete);

    if ($stmt->execute()) {
        echo '<script>alert("User Deleted Successfully"); window.location.href="admin.php";</script>';
        exit();
    } else {
        
        echo '<script>alert("Failed to Delete User"); window.location.href="admin.php";</script>';
        exit();
    }
} else {
    // Redirect to admin page if UserID is not provided
    header("Location: admin.php");
    exit();
}
?>
