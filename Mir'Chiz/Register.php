<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="logIn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script>
        function ValidateEmail(){	
            let Email = document.getElementById("txtEmail").value;
            let at = Email.indexOf("@");
            let dot = Email.lastIndexOf(".");
            let len = Email.length;
            
            if((at<2) || (dot-at<2) || (len-dt<2) ){
                alert("Incorrect Email Format");
                return false;
            }
            else{
                return true;
            }
            
        }
    
        function ValidateName(){
            let Fname = document.getElementById("txtUsername").value;
            if((Fname == "" )||(Fname==null)){
                alert("Name cannot be empty!")
                return false;
            }
            else{
                return true;
            }
        }
    
        function validatePassword(){
            let Password = document.getElementById("txtPassword").value;
            if(Password.length<=5){
                alert("Password Should Contain Atleast 5 Characters");
                return false;
            }
            else{
                return true;
            }
        }
        function validatePasswordCheck(){
            let Password = document.getElementById("txtPassword").value;
            let checkPassword = document.getElementById("txtConfirmPassword").value;
            
            if(Password == checkPassword){
                return true;
            }
            else{
                alert("Passwords do not match!");
                return false;
            }
        }
    
        function checkPhone(){
            let tel= document.getElementById("txtContact").value;
            if(tel.length!=10){
                alert("Telephone Number should contain exactly 10 numbers");
                return false;
            }---
            else{
                return true;
            }
        }
    
        function Validate(){
            if(ValidateEmail() && ValidateName() && validatePassword() && validatePasswordCheck() && checkPhone()){
                alert("Valid Details Entered!");
            }
            else{
                event.preventDefault();
            }
        }
    </script>
</head>

<body onload="displayCart()">

    <!--Header-->
    <header class="Header">
        <a href="index.php"><img src="Pictures/Logo.jpg" class="Logo"></a>
        
        <nav class="navBar">
            <a href="index.php">Home</a>
            <a href="menuPage.html">Menu</a>
            <a href="index.php#about">About</a>
            <a href="index.php#contact">Contact</a>
            <a href="#">Register</a>
            
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
            <a href="#" class="button">Checkout Now</a>
            <button class="button" onclick="clearCart()">Clear Cart</button>
        </div>
    </header>    

    <div class="wrapper">
        <form action="connect.php" method="post">
            <h1>Create Account</h1>
            <div class="inputBox">
                <input type="text" placeholder="Email Address" id="txtEmail" name="email" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="inputBox">
                <input type="text" placeholder="Username" id="txtUsername" name="username" required>
                <i class="fas fa-user-alt"></i>
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Password" id="txtPassword" name="password" required>
                <i class="fas fa-lock-open"></i>
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Confirm Password" id="txtConfirmPassword" required>
                <i class="fas fa-lock"></i>
            </div>
            <div class="inputBox">
                <input type="tel" placeholder="Phone Number" id="txtContact" name="contact" required>
                <i class="fas fa-phone"></i>
            </div>
            
            <button type="submit" class="button" onclick="Validate()">Create Account</button>

            <div class="regLink">
                <p>Already have an Account? <a href="Login.php">Login</a></p>
            </div>
        </form>
    </div>

     
    <script src="script.js"></script>
</body>
</html>
