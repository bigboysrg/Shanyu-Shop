<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Shàn yú</title>
    <!-- Google Fonts for that elegant look -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --maroon: #800000;
            --cream: #F5E6BE;
            --dark-green: #006400;
            --text-dark: #2c2c2c;
        }

        body { 
            background-color: var(--maroon); 
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
        }

        /* Top Navbar Aesthetic */
        .navbar-custom {
            background-color: var(--cream);
            padding: 15px 40px;
            border-bottom: 3px solid var(--maroon);
        }
        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: bold;
            color: var(--maroon);
            text-decoration: none;
        }
        .nav-links-aesthetic {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-weight: bold;
            color: var(--maroon);
        }

        /* Main Cart Container */
        .cart-panel {
            background-color: var(--cream);
            border-radius: 8px;
            padding: 30px;
            min-height: 500px;
        }

        .shop-header {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-style: italic;
            color: var(--maroon);
            border-bottom: 2px solid var(--maroon);
            margin-bottom: 25px;
            padding-bottom: 10px;
        }

        /* Product Card Styling */
        .product-card {
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid var(--maroon);
            border-radius: 5px;
            padding: 20px;
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .img-box {
            width: 180px;
            height: 120px;
            background: #fff;
            border: 1px solid var(--maroon);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--maroon);
        }
        .product-price {
            color: var(--dark-green);
            font-weight: bold;
            font-size: 22px;
        }

        /* Sidebar Summary Styling */
        .sidebar-cream {
            background-color: var(--cream);
            border-radius: 8px;
            padding: 25px;
            height: fit-content;
        }
        .summary-label {
            font-family: 'Playfair Display', serif;
            font-weight: bold;
            font-size: 18px;
            color: var(--maroon);
            margin-top: 15px;
        }
        .aesthetic-input {
            background: #fff;
            border: 1px solid var(--maroon);
            padding: 8px;
            width: 100%;
            border-radius: 4px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
        }
        .value-box {
            background: white;
            border: 1px solid var(--maroon);
            padding: 2px 10px;
            min-width: 90px;
            text-align: right;
            font-weight: bold;
        }

        /* Buttons */
        .place-order-btn {
            background-color: var(--maroon);
            color: var(--cream);
            width: 100%;
            border: none;
            padding: 12px;
            font-weight: bold;
            font-size: 18px;
            text-transform: uppercase;
            margin-top: 20px;
            transition: 0.3s;
        }
        .place-order-btn:hover {
            background-color: #5a0000;
            color: white;
        }

        .back-btn {
            color: var(--cream);
            text-decoration: none;
            font-size: 20px;
            margin-bottom: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>

<nav class="navbar-custom d-flex justify-content-between align-items-center">
    <div>
        <span class="bg-danger text-white p-2 rounded-circle me-2">Logo</span>
        <a href="#" class="logo-text">Shàn yú</a>
    </div>
    <div class="nav-links-aesthetic d-none d-md-block">
        <span class="mx-3">Home</span>
        <span class="mx-3">About Us</span>
        <span class="mx-3">Contact</span>
    </div>
</nav>

<div class="container mt-4 mb-5">
    <a href="/store" class="back-btn">← Back to Store</a>
    
    <div class="row g-4">
        <!-- LEFT PANEL: CART ITEMS -->
        <div class="col-lg-8">
            <div class="cart-panel shadow">
                <div class="shop-header">Your Shopping Cart</div>
                
                <!-- Example Item -->
                <div class="product-card">
                    <div class="img-box me-4">Product Image</div>
                    <div class="flex-grow-1">
                        <h4 class="mb-1 fw-bold">Zero IEM Headphones - Blue</h4>
                        <p class="text-muted small">Premium High-Fidelity Audio</p>
                        <div class="product-price">$89.99</div>
                    </div>
                    <button class="btn btn-sm btn-outline-danger">Remove</button>
                </div>

                <!-- Empty State Message -->
                <p class="mt-4 italic text-muted">Your cart is empty. Add products to begin checkout.</p>
            </div>
        </div>

        <!-- RIGHT PANEL: SUMMARY -->
        <div class="col-lg-4">
            <div class="sidebar-cream shadow">
                <div class="summary-label">Address</div>
                <textarea class="aesthetic-input" rows="2" placeholder="Enter complete shipping address..."></textarea>

                <div class="summary-row mt-3">
                    <span>Items (1):</span>
                    <div class="value-box">$89.99</div>
                </div>
                <div class="summary-row">
                    <span>Total:</span>
                    <div class="value-box">$89.99</div>
                </div>
                <div class="summary-row border-bottom border-dark pb-2">
                    <span>Shipping Fee:</span>
                    <div class="value-box">$50.00</div>
                </div>

                <div class="summary-label">Payment</div>
                <div class="small mb-3">
                    <span class="me-2">Debit</span>| <span class="mx-2">Credit</span>| <span class="mx-2">Cash</span>| <span class="ms-2">Gcash</span>
                </div>

                <div class="summary-label">Delivery Options:</div>
                <div class="small mb-3">
                    <u class="fw-bold">Standard</u> <span class="ms-3">Priority</span>
                </div>

                <div class="summary-label">Notes to seller:</div>
                <textarea class="aesthetic-input" placeholder="Special instructions..."></textarea>

                <div class="summary-row mt-4">
                    <span class="h5 fw-bold text-maroon">Subtotal:</span>
                    <div class="value-box h5 mb-0">$139.99</div>
                </div>

                <button class="place-order-btn">Place Order</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>