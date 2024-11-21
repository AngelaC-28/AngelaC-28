<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakeylicious Shop</title>
    <style>
        body {
            font-family: 'Arial';
            text-align: center;
            padding: 20px;
            background-color: #F9F9f8; /* Pastel pink color */
        }

        #product-list {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap; /* Wrap items to the next row if necessary */
        }

        .product {
            border: 1px solid black; /* Black border */
            padding: 10px;
            width: 200px;
            height: 150px; /* Set height to match width for square shape */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Ensures content is spaced evenly */
            align-items: center;
            box-sizing: border-box; /* Ensures padding is included in the size */
        }

        button {
            padding: 5px 10px;
            background-color: #52a447;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #52a447;
        }

        #cart {
            margin-top: 20px;
        }

        #checkout {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Cakeylicious Shop</h1>

    <!-- Product List -->
    <div id="product-list">
        <div class="product">
            <h3>Chocolate Cake</h3>
            <p>Price: 300</p>
            <button class="add-to-cart" data-name="Chocolate Cake" data-price="300">Add to Cart</button>
        </div>
        <div class="product">
            <h3>Raspberry Cake</h3>
            <p>Price: 550</p>
            <button class="add-to-cart" data-name="Raspberry Cake" data-price="550">Add to Cart</button>
        </div>
        <div class="product">
            <h3>Cheese Cake</h3>
            <p>Price: 450</p>
            <button class="add-to-cart" data-name="Cheese Cake" data-price="450">Add to Cart</button>
        </div>
        <div class="product">
            <h3>Lemon Cake</h3>
            <p>Price: 300</p>
            <button class="add-to-cart" data-name="Lemon Cake" data-price="300">Add to Cart</button>
        </div>
        <div class="product">
            <h3>Caramel Cake</h3>
            <p>Price: 550</p>
            <button class="add-to-cart" data-name="Caramel Cake" data-price="550">Add to Cart</button>
        </div>
        <div class="product">
            <h3>Red Velvet Cake</h3>
            <p>Price: 900</p>
            <button class="add-to-cart" data-name="Red Velvet Cake" data-price="900">Add to Cart</button>
        </div>
        <div class="product">
            <h3>Mocha Cake</h3>
            <p>Price: 450</p>
            <button class="add-to-cart" data-name="Mocha Cake" data-price="450">Add to Cart</button>
        </div>
        <div class="product">
            <h3>Vanilla Cake</h3>
            <p>Price: 230</p>
            <button class="add-to-cart" data-name="Vanilla Cake" data-price="230">Add to Cart</button>
        </div>
        <div class="product">
            <h3>Strawberry Cake</h3>
            <p>Price: 370</p>
            <button class="add-to-cart" data-name="Strawberry Cake" data-price="370">Add to Cart</button>
        </div>
    </div>

    <!-- Cart Section -->
    <h2>Shopping Cart</h2>
    <div id="cart">
        <p>Your cart is empty.</p>
    </div>

    <!-- Checkout Section -->
    <div id="checkout">
        <button onclick="checkout()">Proceed to Checkout</button>
        <p id="total-price"></p>
    </div>

    <script>
        let cart = [];

        function updateCart() {
            const cartDiv = document.getElementById('cart');
            const totalPriceDiv = document.getElementById('total-price');
            if (cart.length === 0) {
                cartDiv.innerHTML = "<p>Your cart is empty.</p>";
                totalPriceDiv.innerHTML = "";
            } else {
                let cartHtml = "<ul>";
                let total = 0;
                cart.forEach(item => {
                    cartHtml += `<li>${item.name} - $${item.price} 🛒</li>`; // Add emoji
                    total += item.price;
                });
                cartHtml += "</ul>";
                cartDiv.innerHTML = cartHtml;
                totalPriceDiv.innerHTML = `Total: $${total}`;
            }
        }

        function addToCart(name, price) {
            cart.push({ name, price });
            updateCart();
        }

        function checkout() {
            if (cart.length === 0) {
                alert("Your cart is empty! Add items to your cart before proceeding.");
            } else {
                const total = cart.reduce((sum, item) => sum + item.price, 0);
                alert(`Proceeding to checkout. Total amount: $${total}`);
                cart = []; // Empty the cart after checkout
                updateCart();
            }
        }

        // Attach event listeners to all Add to Cart buttons
        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function () {
                const name = this.getAttribute('data-name');
                const price = parseFloat(this.getAttribute('data-price'));
                addToCart(name, price);
            });
        });
    </script>
</body>
</html>