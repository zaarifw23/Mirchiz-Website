<?php
session_start();
// Check if the UserID session variable is set, indicating that the user is logged in
if (isset($_SESSION["UserID"])) {
    $userID = $_SESSION["UserID"];
    $userEmail = $_SESSION["Email"];
}else{
  echo '<script>alert("You need to login to place an Order, Sorry for the Inconvenience"); window.location.href="Login.php";</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout.css" />

    <script>
      function ValidateEmail(){	
          let Email = document.getElementById("email").value;
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

      function checkCVV(){
          let cvv= document.getElementById("cno").value;
          if(cvv.length!=3){
              alert("CVV should contain exactly 3 numbers");
              return false;
          }
          else{
              return true;
          }
      }
      function Validate(){
            if(ValidateEmail() && checkCVV()){
                alert("Details Added");
            }
            else{
                event.preventDefault();
            }
        }
  </script>
</head>
<body>
<div class="card">
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="placeOrder.php"  method="post">
        <h1>Billing And Payment Details</h1>
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John Doe" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="jdoe@gmail.com" value="<?php echo $userEmail; ?>" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="528/1, Main Rd, Colombo" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Colombo"required >

            <div class="row">
              <div class="col-50">
                <label for="state">Province</label>
                <input type="text" id="state" name="state" placeholder="Western" >
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001" >
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Guglielmo Marcon">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="October"required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2026"required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cno" name="cvv" placeholder="567" required>
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" value="Place Order" class="button" id="myBtn" onclick="Validate()">
        
        <div id="myModal" class="modal">
          <!-- Modal content -->
          <div class="modal-content" id="xx">
            <a href="index.php"><span class="close">&times;</span></a>
            <h2>PAYMENT SUCCESSFUL</h2>
            <h4>YOUR ORDER HAS BEEN PLACED THANK YOU</h4>
            <a href="trackOrder.html" class="button">Track Order</a>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
</div>

<script src="script.js"></script>
</body>
</html>
