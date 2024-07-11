<!DOCTYPE html>
<html>
<he ad>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

    function Validate(){
        if(ValidateEmail() && validatePassword()){
            alert("Logged In Successfully!");
            window.location.href("index.php");
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
            <a href="menuPage.php">Menu</a>
            <a href="index.php#about">About</a>
            <a href="index.php#contact">Contact</a>
            <a href="#" class="active">Login</a>
            
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
            <button class="button" onclick="clearCart()">Clear Cart</button>
        </div>
    </header>    

    <div class="wrapper">
        <form action="LoginPage.php" method="post">
            <h1>Login</h1>
            <div class="inputBox">
                <input type="text" placeholder="Email Address" id="txtEmail" name="email" required>
                <i class="fas fa-user-alt"></i>
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Password" id="txtPassword" name="password" required>
                <i class="fas fa-lock"></i>
            </div>

            <div class="forgotPass-Remember">
                <label><input type="checkbox"> Remember Me</label>
                <a href="#">Forgot Password?</a>
            </div>
            
            <button type="submit" class="button" onclick="Validate()">Login</button>

            <div class="regLink">
                <p>Don't have an Account? <a href="Register.php">Register</a></p>
            </div>
        </form>
    </div>

     
    <script src="script.js"></script>
</body>
</html>
