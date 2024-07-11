<?php
session_start();
// Check if the UserID session variable is set, indicating that the user is logged in
if (isset($_SESSION["UserID"])) {
    $userID = $_SESSION["UserID"];
    $userEmail = $_SESSION["Email"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mir'Chiz</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

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
            <!-- Section to delete users -->
            <h2>Delete Users</h2>
            <form action="deleteUser.php" method="post">
                <label for="userId">User ID:</label>
                <input type="text" name="userId" required>
                <br>
                <input type="submit" value="Delete User" class="button">
            </form>

            <!-- Section to add products -->
            <h2>Add Products</h2>
            <form action="add_product.php" method="post" enctype="multipart/form-data">
                <label for="productName">Product Name:</label>
                <input type="text" name="productName" required>
                <br>
                <label for="productPrice">Product Price:</label>
                <input type="text" name="productPrice" required>
                <br>
                <label for="productImage">Product Image (Path):</label>
                <input type="file" name="ProductImage" required>
                <br>
                <input type="submit" value="Add Product" class="button">
            </form>

            <!-- Section to reply to frequently asked questions -->
            <h2>Reply to FAQs</h2>
            <form action="reply_faq.php" method="post">
                <label for="faqId">FAQ ID:</label>
                <input type="text" name="faqId" required>
                <br>
                <label for="reply">Your Reply:</label>
                <textarea name="reply" rows="1" required></textarea>
                <br>
                <input type="submit" value="Reply" class="button">
            </form>
        </div>

    </div>
        <div class="logoutButton">
           <a href="logout.php" class="button">Log Out</a>
         </div>

    <!-- Footer -->
    <section class="footer">
        
        <div class="creator">Created By <span>M. Z. Waznie</span> | All Rights Reserved</div>
    </section>

    <script src="script.js"></script>
</body>
</html>
