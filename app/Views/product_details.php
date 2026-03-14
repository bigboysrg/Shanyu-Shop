<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $product['name'] ?> | Shàn yú</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --maroon: #800000;
            --cream: #F5E6BE;
            --green: #006400;
        }

        body { 
            background-color: var(--maroon); 
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: var(--cream);
            min-height: 100vh;
            border-right: 2px solid var(--maroon);
            padding: 20px;
            position: sticky;
            top: 0;
        }

        .filter-label {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-weight: bold;
            color: var(--maroon);
            border-bottom: 1px solid var(--maroon);
            margin-top: 20px;
            display: block;
        }

        .filter-item {
            display: block;
            color: var(--maroon);
            text-decoration: none;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        /* Main Content Container */
        .main-content {
            background-color: var(--cream);
            margin: 20px;
            border-radius: 8px;
            padding: 40px;
            min-height: 95vh;
            border: 1px solid var(--maroon);
        }

        /* IMAGE BOX - FIXED SIZE */
        .product-img-box {
            background: #fff;
            border: 1px solid var(--maroon);
            width: 100%;
            max-width: 500px; /* Prevents the image from being too wide */
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 5px 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .product-img-box img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        /* Product Details Styling */
        .product-title {
            font-family: 'Playfair Display', serif;
            font-weight: bold;
            color: var(--maroon);
            font-size: 2.8rem;
            margin-bottom: 5px;
        }

        .price-text {
            color: var(--green);
            font-size: 2.2rem;
            font-weight: bold;
            margin: 15px 0;
        }

        .qty-input {
            width: 60px;
            text-align: center;
            border: 1px solid var(--maroon);
            font-weight: bold;
        }

        .btn-cart {
            background-color: #000;
            color: white;
            border: none;
            padding: 12px 30px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-cart:hover {
            background-color: #333;
        }

        .btn-buy {
            background-color: #333;
            color: white;
            width: 100%;
            max-width: 450px;
            padding: 15px;
            border: none;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 20px;
            display: block;
            text-align: center;
            text-decoration: none;
        }

        .btn-buy:hover {
            background-color: #000;
            color: #fff;
        }

        /* Breadcrumb/Back link */
        .back-link {
            color: var(--maroon);
            font-weight: bold;
            text-decoration: none;
            margin-bottom: 30px;
            display: inline-block;
        }

        @media (max-width: 991px) {
            .sidebar { min-height: auto; border-right: none; border-bottom: 2px solid var(--maroon); }
            .product-title { font-size: 2rem; }
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        
        <!-- SIDEBAR (2 Columns) -->
        <div class="col-lg-2 col-md-3">
            <div class="sidebar">
                <div class="mb-4"><strong>☰ Menu</strong></div>
                <span class="filter-label">Filter by Price</span>
                <a href="#" class="filter-item">All Products</a>
                <a href="#" class="filter-item">Under 5$</a>
                <a href="#" class="filter-item">10$ - 50$</a>
                
                <span class="filter-label">Filter by Rating</span>
                <a href="#" class="filter-item">5 Stars ★★★★★</a>
                <a href="#" class="filter-item">4 Stars ★★★★</a>
            </div>
        </div>

        <!-- MAIN CONTENT (10 Columns) -->
        <div class="col-lg-10 col-md-9">
            <div class="main-content shadow-lg">
                
                <a href="<?= site_url('products') ?>" class="back-link">← BACK TO SHOP</a>
                
                <div class="row align-items-start">
                    
                    <!-- LEFT COLUMN: PRODUCT IMAGE -->
                    <div class="col-xl-5 col-lg-6">
                        <div class="product-img-box">
                            <!-- Using base_url correctly for the public/images folder -->
                            <img src="<?= base_url('images/' . $product['img']) ?>" alt="<?= $product['name'] ?>">
                        </div>
                    </div>

                    <!-- RIGHT COLUMN: PRODUCT DETAILS -->
                    <div class="col-xl-7 col-lg-6 ps-lg-5">
                        <h1 class="product-title"><?= $product['name'] ?></h1>
                        <p class="text-muted italic mb-4" style="font-size: 1.1rem;"><?= $product['overview'] ?></p>
                        
                        <div class="price-text">$<?= number_format($product['price'], 2) ?></div>

                        <!-- CART FORM -->
                        <form action="<?= site_url('cart/add') ?>" method="POST">
                            <!-- Hidden Data -->
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="product_name" value="<?= $product['name'] ?>">
                            <input type="hidden" name="product_price" value="<?= $product['price'] ?>">
                            <input type="hidden" name="product_img" value="<?= $product['img'] ?>">

                            <!-- Quantity Selector -->
                            <div class="d-flex align-items-center mb-4">
                                <span class="me-3 fw-bold small">Quantity</span>
                                <button type="button" class="btn btn-sm btn-outline-dark" 
                                    onclick="let q=document.getElementById('qty'); q.value=Math.max(1,parseInt(q.value)-1)">-</button>
                                <input type="number" name="quantity" id="qty" class="qty-input mx-2" value="1" readonly>
                                <button type="button" class="btn btn-sm btn-outline-dark" 
                                    onclick="let q=document.getElementById('qty'); q.value=parseInt(q.value)+1">+</button>
                            </div>

                            <div class="small mb-2"><strong>Shipping:</strong> Standard 3-5 Days</div>
                            <div class="small mb-4"><strong>Payment:</strong> GCash, COD, Credit Card</div>

                            <div class="d-flex gap-2 mb-2">
                                <button type="submit" class="btn-cart">🛒 Add to Cart</button>
                                <button type="button" class="btn btn-outline-dark">♡</button>
                            </div>
                        </form>

                        <a href="<?= site_url('cart') ?>" class="btn-buy">Place Order Now</a>

                        <div class="mt-5 d-flex align-items-center border-top pt-3">
                            <div style="width:45px; height:45px; background:#800000; border-radius:50%; margin-right:12px; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:bold;">S</div>
                            <span class="fw-bold" style="color: var(--maroon);">Shàn yú Official Shop</span>
                        </div>
                    </div>
                </div>

                <!-- DESCRIPTION TABS -->
                <div class="mt-5 pt-4">
                    <ul class="nav nav-underline border-bottom mb-3">
                        <li class="nav-item">
                            <a class="nav-link active text-maroon fw-bold" href="#">About Item</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted" href="#">Reviews</a>
                        </li>
                    </ul>
                    <div class="p-4 bg-white border shadow-sm rounded">
                        <p style="line-height: 1.6;"><?= $product['desc'] ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>