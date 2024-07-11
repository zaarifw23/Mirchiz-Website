
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn More</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleLearnMore.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body onload="displayCart()">

    <!--Header-->
    <header class="Header">
        <a href="index.php"><img src="Pictures/Logo.jpg" class="Logo"></a>
        
        <nav class="navBar">
            <a href="index.php">Home</a>
            <a href="menuPage.php">Menu</a>
            <a href="#">About</a>
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

    <div class="lmPic02">
        <img src="Pictures/LearnMorepic02.jpg" alt="">
    </div>
    
    <div class="learnmore">
        <h1 class="Heading"> <span>our</span> vision </h1>
    </div>
    <div class="vision">
        <p>Mir'chiz  was founded not just to create delectable, mouthwatering dishes; it's about shaping a culinary narrative that resonates with you. 
            Our vision is to be the go-to destination for those seeking remarkable flavors, a sense of belonging, and a warm, 
            home-cooked meal that leaves an indelible mark on your heart.Our vision is rooted in a deep passion for culinary excellence and a commitment to creating something truly special. 
            We believe in the power of food to bring joy, comfort, and a sense of togetherness to every table it graces. 
            Our journey as a home-based food venture is driven by a vision that extends far beyond simply crafting delicious meals; it's about making a meaningful impact on the lives we touch.</p>
            
        <div class="lmPic01">
            <img src="Pictures/LearnMorepic01.jpg" alt="">
        </div>
    
    </div>

    
    <div class="learnMore">
        <h1 class="Heading">Our <span>Mission</span></h1>
    </div>
    <div class="mission">

        <p>
            Our mission is to be able to provide flavorful, innovative tastes to homes all across
            Sri Lanka, and soon, onto the global stage with consistency and efficiency.
            <h3>Serving Sri Lanka:</h3> Our primary focus is to delight the taste buds of families and food enthusiasts in Sri Lanka. We aim to become a trusted name, 
            known for our authentic flavors and culinary creativity, offering a diverse menu that caters to the unique palates of our fellow Sri Lankans.

            <h3>Global Expansion:</h3> While we cherish our roots, we also harbor a vision of sharing our delectable creations with the world. Our mission extends 
            to expanding our reach beyond Sri Lanka's borders, bringing the taste of our beloved homeland to tables worldwide. We aspire to introduce the world to the richness of Sri Lankan cuisine.

        </p>
    </div>

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