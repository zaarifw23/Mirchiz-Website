<?php
session_start();

// Check if the UserID session variable is set, indicating that the user is logged in
if (isset($_SESSION["UserID"])) {
    $userID = $_SESSION["UserID"];
    $userEmail = $_SESSION["Email"];

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

    // Retrieve user information
    $userID = $_SESSION['UserID'];
    $sqlUser = "SELECT * FROM users WHERE UserID = '$userID'";
    $resultUser = $conn->query($sqlUser);

    if ($resultUser->num_rows > 0) {    
        $rowUser = $resultUser->fetch_assoc();
        $userName = $rowUser['UserName'];
        $email = $rowUser['Email'];
        $telephone = $rowUser['Telephone'];

           // Retrieve all orderIDs
           $sqlOrder = "SELECT OrderID FROM orders WHERE UserID = '$userID'";
           $resultOrder = $conn->query($sqlOrder);
   
           if ($resultOrder->num_rows > 0) {
               $orderIDs = array();
               while ($rowOrder = $resultOrder->fetch_assoc()) {
                   $orderIDs[] = $rowOrder['OrderID'];
               }
           } else {
               // Handle the case when no orderID is found
               $orderIDs = array("No Orders Yet");
           }
   
        $conn->close();
    } else {
        exit();
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mir'Chiz</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body onload="displayCart()">

    <!-- Header -->
    <header class="Header">
        <a href="index.php"><img src="Pictures/Logo.jpg" class="Logo"></a>
        
        <nav class="navBar">
            <a href="index.php#home">Home</a>
            <a href="index.php#menu">Menu</a>
            <a href="index.php#about">About</a>
            <a href="index.php#contact">Contact</a>
            <?php
                // Check if user is logged in
                if (isset($_SESSION['UserID'])) {
                    if ($_SESSION['Email'] === 'admin@mirchiz.lk') {
                        echo '<a href="admin.php">Admin</a>';
                    } else {
                        echo '<a href="profile.php">Profile</a>';
                    }
                }else{
                    echo '<a href="Login.php">Login</a>';
                }
            ?>
        </nav>

        <div class="headerIcons">
            <div class="fas fa-search" id="searchButton"></div>
            <div class="fas fa-shopping-cart" id="cartButton"></div>            
        </div>

        <div class="searchForm">
            <input type="search" class="searchBox" placeholder="Search..." onkeyup="search_animal()">
            <label for="searchBox" class="fas fa-search" ></label>
        </div>
        <!-- Cart Box -->
        <div class="cartBox">
            <div class="cartBar">
                <div class="cartItems">
                        <ul id="cartlist">
                            Your Cart is Empty
                        </ul>
                </div>
                <div class="cartFooter">
                    <h3>Total</h3>
                    <h2 id="total">0.00 LKR</h2>
                </div>
            </div>
            <a href="checkout.php" class="button" onclick="clearCart()">Checkout Now</a>
            <button class="button" onclick="clearCart()">Clear Cart</button>
         </div>
     </header>
        <!-- Profile Grid -->  
            <div class="grid-container">
                <div class="grid-item" id="gridLeft">
                    <h2>User Information</h2>
                    <p>Username </p>
                    <p>Email </p>
                    <p>Telephone </p>
                    <p>Order History (Order #)</p>
                </div>

                <div class="grid-item" id="gridRight">
                    <p>: <?php echo $userName; ?></p>
                    <p>: <?php echo $email; ?></p>
                    <p>: <?php echo $telephone; ?></p>
                    <p>:
                        <?php
                            foreach ($orderIDs as $orderID) {
                                echo "$orderID<br>";
                            }
            ?>
        </p>
                </div>
            </div>
            <div class="logoutButton">
               <a href="logout.php" class="button">Log Out</a>
             </div>

    <!-- Footer -->
    <section class="footer">
        <div class="socials">
            <a href="https://www.facebook.com/foodrack.lk" target="_blank" class="fab fa-facebook"></a>
            <a href="https://www.instagram.com/mir.chiz/" target="_blank" class="fab fa-instagram"></a>
            <a href="https://wa.link/hqw4hd" target="_blank" class="fab fa-whatsapp"></a>
        </div>

        <div class="privacy-terms">
            <a class="privacy-terms" href="privacy.html">Privacy Policy</a> | 
            <a class="privacy-terms" href="terms.html">Terms and Conditions</a>
        </div>
        <div class="creator">Created By <span>M. Z. Waznie</span> | All Rights Reserved</div>
    </section>

    <script src="script.js"></script>
</body>
</html>
