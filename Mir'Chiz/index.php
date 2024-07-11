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
    <title>Mir'Chiz</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body onload="displayCart()"></body>

    <!--Header-->
    <header class="Header">
        <a href="index.php"><img src="Pictures/Logo.jpg" class="Logo"></a>
        
        <nav class="navBar">
            <a href="#home">Home</a>
            <a href="#menu">Menu</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
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
    
    <!--Home-->
    <section class="home" id="home">
        <div class="Elements">
            <h3 class="h3">Treat yourself to our weekly bestseller</h3>
            <p class="p">Chicken Mandhi:  Arabian Rice Dish with Tender Meat, Fragrant Spices, and a Smoky, Flavorful Essence</p>
            <a href="menuItems/03.html" class="button">Buy Now</a>
        </div>
    </section>
    <!--Menu-->
    
    <section class="menu" id="menu">
        <h1 class="Heading"> Featured <span>Dishes</span> </h1>

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
                <a href="menuItems/12.html"><img src="Pictures/biscuit-pudding-04-600x600.jpg" alt=""></a>
                <a href="menuItems/12.html"><h3>Biscuit Pudding</h3></a>
                <a href="menuItems/12.html"><div class="price">800 LKR</div></a>
                <a class="button" onclick="addToCart('Biscuit Pudding', 800)">Add to Cart</a>
            </div>
            <div class="menuButton">
                <a href="menuPage.php" id="viewMenu" class="button">View Full Menu</a>
            </div>
        </div>
    </section>

    <!--About-->
    <section class="about" id="about">
        <h1 class="Heading"> <span>About</span> us </h1>

        <div class="row">

            <div class="image">
                <img src="Pictures/mandhi.jpg" alt="">
            </div>

            <div class="Elements">
                <h3 class="h3">What Makes Our Food Special?</h3>
                <p class="p">Discover a culinary journey through the authentic flavors of India and Arabia at our shop. With a commitment to homemade authenticity, we craft each dish with love, using time-honored recipes and the finest ingredients. Come savor the genuine taste of our heritage and become a part of our culinary family.</p>
                <a href="learnMore.php" target="" class="button">Learn More</a>
            </div>
        </div>
    </section>

    <!--Contact-->
    <section class="contact" id="contact">
        <h1 class="Heading">contact <span>us </span></h1>

        <div class="row">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1980.6953805620428!2d79.88153511186498!3d6.843669961966064!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1698180557562!5m2!1sen!2slk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
            <form action="reachout.php"method="post">
                <h3>Reach Out To Us</h3>
                <div class="inputBox">
                    <span class="fas fa-user"></span>
                    <input type="text" placeholder="Name" name="name" required>
                </div>
                <div class="inputBox">
                    <span class="fas fa-phone"></span>
                    <input type="tel" minlength="10" placeholder="Phone Number" name="phone" required>
                </div>
                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input type="email" placeholder="Email Address" name="email" required>
                </div>

                <input type="submit" value="Contact Now" class="button">
            </form>
        
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