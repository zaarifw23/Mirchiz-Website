let navbar = document.querySelector('.navBar');

let SearchForm = document.querySelector('.searchForm');

document.querySelector('#searchButton').onclick = () =>{
    SearchForm.classList.toggle('active');
    cartItems.classList.remove('active');
}

let cartItems = document.querySelector('.cartBox');

document.querySelector('#cartButton').onclick = () =>{
    cartItems.classList.toggle('active');
    SearchForm.classList.remove('active');
}

window.onscroll = () => {
    cartItems.classList.remove('active');
    SearchForm.classList.remove('active');		
}

// Cart JS
function addToCart(productName, price){

    localStorage
    let cartItems=localStorage.getItem('cart') ? localStorage.getItem('cart').split(','):[];

    cartItems.push(`${productName} ${price.toFixed(2)} LKR`);

    //save updated cart

    localStorage
    localStorage.setItem('cart',cartItems);

    alert("Item Has Been Added To Cart!");

    // Update the total price
    updateTotalPrice(price);
2

    //refresh cart display

    displayCart();
}

    // Function to update the total price
    function updateTotalPrice(price) {
    // Retrieve existing total price from localStorage
    let totalPrice = localStorage.getItem('totalPrice') ? parseFloat(localStorage.getItem('totalPrice')) : 0;

    // Update the total price
    totalPrice += price;

    // Save the updated total price back to localStorage
    localStorage.setItem('totalPrice', totalPrice.toFixed(2));
}



    // Function to clear the cart
     function clearCart() {
    // Clear the cart in localStorage
    localStorage.removeItem('cart');
    localStorage.removeItem('totalPrice');


    // Refresh the cart display
    displayCart();
}

// Function to display the items in the cart
function displayCart() {
    // Retrieve cart items from localStorage
    let cartItems = localStorage.getItem('cart') ? localStorage.getItem('cart').split(',') : [];
    // Retrieve total price from localStorage
    let totalPrice = localStorage.getItem('totalPrice') ? parseFloat(localStorage.getItem('totalPrice')) : 0;

    // Get the cart items element
    let cartItemsElement = document.getElementById('cartlist');
    let totalPriceElement = document.getElementById('total');

    // Clear the previous contents
    cartItemsElement.innerHTML = '';
    totalPriceElement.textContent = '';


    // Populate the cart items
    cartItems.forEach(item => {
        let li = document.createElement('li');
        li.textContent = item;
        cartItemsElement.appendChild(li);
    });
// Display the total price
    totalPriceElement.textContent = ` ${totalPrice.toFixed(2)} LKR`;

}


//searchBar Script

function search_animal() { 
    let input = document.getElementById('searchBox').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('clothes'); 
    let list = document.getElementById('list');
    
    for (i = 0; i < x.length; i++) { 
      if (!x[i].innerHTML.toLowerCase().includes(input)) { 
        x[i].style.display="none"; 
        list.style.display = "block";
      } 
      else { 
        x[i].style.display="list-item"; 
        list.style.display = "none";       
      } 
    } 
  } 
  
  