<?php
session_start();
// Check if the UserID session variable is set, indicating that the user is logged in
if (isset($_SESSION["UserID"])) {
    $userID = $_SESSION["UserID"];
    $userEmail = $_SESSION["Email"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="styleMenu.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body onload="displayCart()">

    <!--Header-->
    <header class="Header">
        <a href="index.php"><img src="Pictures/Logo.jpg" class="Logo"></a>
        
        <nav class="navBar">
            <a href="index.php">Home</a>
            <a href="#">Menu</a>
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
            <input type="search" class="searchBox" placeholder="Search...">
            <label for="searchBox" class="fas fa-search"></label>
        </div>

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
            <a href="checkout.php" class="button">Checkout Now</a>
            <button class="button" onclick="clearCart()">Clear Cart</button>
         </div>
    </header>

    <!-- Menu -->
    <section class="menu" id="menu">
        <h1 class="Heading"> Our <span>Menu</span> </h1>

        <div class="menuBox">
            <div class="menuItems">
                <a href="menuItems/01.html"><img src="Pictures/butter-chicken.jpg" alt=""></a>
                <a href="menuItems/01.html"><h3>Butter Chicken</h3></a>
                <a href="menuItems/01.html"><div class="price">1200 LKR</div></a>
                <a class="button" onclick="addToCart('Butter Chicken', 1200)">Add to Cart</a>
            </div>

            <div class="menuItems">
                <a href="menuItems/02.html"><img src="Pictures/seafood-rice.jpg" alt=""></a>
                <a href="menuItems/02.html"><h3>Seafood Fried Rice</h3></a>
                <a href="menuItems/02.html"><div class="price">1500 LKR </div></a>
                <a class="button" onclick="addToCart('Seafood Fried Rice', 1500)">Add to Cart</a>
            </div>

            <div class="menuItems">
                <a href="menuItems/03.html"><img src="Pictures/mandhi2.jpg" alt=""></a>
                <a href="menuItems/03.html"><h3>Chicken Mandhi</h3></a>
                <a href="menuItems/03.html"><div class="price">1800 LKR</div></a>
                <a class="button" onclick="addToCart('Chicken Mandhi', 1800)">Add to Cart</a>
            </div>

            <div class="menuItems">
                <a href="menuItems/04.html"><img src="Pictures/chicken-biriyani-indian-style.png" alt=""></a>
                <a href="menuItems/04.html"><h3>Mutton Biriyani</h3></a>
                <a href="menuItems/04.html"><div class="price">2000 LKR</div></a>
                <a class="button" onclick="addToCart('Mutton Biriyani', 2000)">Add to Cart</a>
            </div>

            <div class="menuItems">
                <a href="menuItems/05.html"><img src="Pictures/tandoori-chicken.png" alt=""></a>
                <a href="menuItems/05.html"><h3>Tandoori Chicken</h3></a>
                <a href="menuItems/05.html"><div class="price">1600 LKR</div></a>
                <a class="button" onclick="addToCart('Tandoori Chicken', 1600)">Add to Cart</a>
            </div>

            <div class="menuItems">
                <a href="menuItems/06.html"><img src="Pictures/crab.png" alt=""></a>
                <a href="menuItems/06.html"><h3>Chettinad Crab Masala</h3></a>
                <a href="menuItems/06.html"><div class="price">1900 LKR</div></a>
                <a class="button" onclick="addToCart('Chettinad Crab Masala', 1900)">Add to Cart</a>
            </div>

            <div class="menuItems">
                <a href="menuItems/07.html"><img src="Pictures/cuttle.png" alt=""></a>
                <a href="menuItems/07.html"><h3>Cuttlefish Masala</h3></a>
                <a href="menuItems/07.html"><div class="price">1900 LKR</div></a>
                <a class="button" onclick="addToCart('Cuttllefish Masala', 1900)">Add to Cart</a>
            </div>

            <div class="menuItems">
                <a href="menuItems/08.html"><img src="Pictures/indian-bread-naan.png" alt=""></a>
                <a href="menuItems/08.html"><h3>Butter Naan</h3></a>
                <a href="menuItems/08.html"><div class="price">350 LKR</div></a>
                <a class="button" onclick="addToCart('Butter Naan', 350)">Add to Cart</a>
            </div>

            <div class="menuItems">
                <a href="menuItems/09.html"><img src="Pictures/badham-kulfi.png" alt=""></a>
                <a href="menuItems/09.html"><h3>Almond Kulfi</h3></a>
                <a href="menuItems/09.html"><div class="price">650 LKR</div></a>
                <a class="button" onclick="addToCart('Almond Kulfi', 650)">Add to Cart</a>
            </div>
            
            <div class="menuItems">
                <a href="menuItems/10.html"><img src="Pictures/pani-poori.png" alt=""></a>
                <a href="menuItems/10.html"><h3>Pani Poori</h3></a>
                <a href="menuItems/10.html"><div class="price">450 LKR</div></a>
                <a class="button" onclick="addToCart('Pani Poori', 450)">Add to Cart</a>
            </div>

            <div class="menuItems">
                <a href="menuItems/11.html"><img src="Pictures/mousse.jpg" alt=""></a>
                <a href="menuItems/11.html"><h3>Chocolate Mousse</h3></a>
                <a href="menuItems/11.html"><div class="price">900 LKR</div></a>
                <a class="button" onclick="addToCart('Chocolate Mousse', 900)">Add to Cart</a>
            </div>

            <div class="menuItems">
                <a href="menuItems/12.html"><img src="Pictures/biscuit-pudding-04-600x600.jpg" alt=""></a>
                <a href="menuItems/12.html"><h3>Biscuit Pudding</h3></a>
                <a href="menuItems/12.html"><div class="price">800 LKR</div></a>
                <a class="button" onclick="addToCart('Biscuit Pudding', 800)">Add to Cart</a>
            </div>

            
        </div>
    </section>

    <!--Footer-->

    <section class="footer">
        <div class="socials">
            <a href="https://www.facebook.com/foodrack.lk" target="_blank" class="fab fa-facebook"></a>
            <a href="https://www.instagram.com/mir.chiz/" target="_blank" class="fab fa-instagram"></a>
            <a href="https://wa.link/hqw4hd" target="_blank" class="fab fa-whatsapp"></a>
        </div>

        <div class="privacy-terms"><a  class="privacy-terms" href="privacy.html">Privacy Policy</a> | <a class="privacy-terms" href="terms.html">Terms and Conditions</a></div>
        <div class="creator">Created By <span>M. Z. Waznie</span> | All Rights Reserved</div>
    </section>

    <script src="script.js"></script>

</body>
</html>    