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
            --dark-header: #003d21; /* Match the dark green in your screenshot */
        }

        body { 
            background-color: var(--maroon); 
            font-family: 'Poppins', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        /* Fixed Sidebar Fix */
        .sidebar {
            background-color: var(--cream);
            min-height: 100vh;
            border-right: 2px solid var(--maroon);
            padding: 20px;
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

        /* Main Content Fix */
        .main-content {
            background-color: var(--cream);
            margin: 20px;
            border-radius: 8px;
            padding: 40px;
            min-height: 90vh;
            border: 1px solid var(--maroon);
        }

        /* Product Box Fix - Stops the stretching */
        .product-img-box {
            background: #fff;
            border: 1px solid var(--maroon);
            width: 100%;
            height: 400px; /* Fixed height to prevent stretching */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 5px 5px 15px rgba(0,0,0,0.1);
        }

        .product-img-box img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        /* Details Text */
        .product-title {
            font-family: 'Playfair Display', serif;
            font-weight: bold;
            color: var(--maroon);
            font-size: 2.2rem;
        }

        .price-text {
            color: var(--green);
            font-size: 2rem;
            font-weight: bold;
            margin: 15px 0;
        }

        /* Purchase Panel */
        .purchase-panel {
            padding-left: 20px;
        }

        .btn-buy {
            background-color: #333;
            color: white;
            width: 100%;
            padding: 12px;
            border: none;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 15px;
        }
        
        .btn-cart {
            background-color: #000;
            color: white;
            border: none;
            padding: 10px 20px;
        }

        .qty-input {
            width: 50px;
            text-align: center;
            border: 1px solid var(--maroon);
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        <!-- Sidebar Column -->
        <div class="col-md-2 d-none d-md-block">
            <div class="sidebar">
                <div class="mb-4"><strong>☰</strong></div>
                <span class="filter-label">Filter by Price</span>
                <a href="#" class="filter-item">All</a>
                <a href="#" class="filter-item">Under 5$</a>
                <a href="#" class="filter-item">10$ - 20$</a>
                
                <span class="filter-label">Filter by Rating</span>
                <a href="#" class="filter-item">5 Stars ★★★★★</a>
                <a href="#" class="filter-item">4 Stars ★★★★</a>
            </div>
        </div>

        <!-- Content Column -->
        <div class="col-md-10">
            <div class="main-content shadow-lg">
                <a href="<?= site_url('products') ?>" class="text-maroon text-decoration-none fw-bold mb-4 d-inline-block">← BACK TO SHOP</a>
                
                <div class="row">
                    <!-- Product Image Section -->
                    <div class="col-lg-6">
                        <div class="product-img-box">
                            <!-- Image path fix: assumes images are in public/assets/images/ -->
                            <img src="<?= base_url('images/' . $product['img']) ?>" 
                            alt="<?= $product['name'] ?>">
                        </div>
                    </div>

                    <!-- Purchase Section -->
                    <div class="col-lg-6 purchase-panel mt-4 mt-lg-0">
                        <h1 class="product-title"><?= $product['name'] ?></h1>
                        <p class="text-muted italic"><?= $product['overview'] ?></p>
                        
                        <div class="price-text">$<?= number_format($product['price'], 2) ?></div>

                        <div class="d-flex align-items-center mb-4">
                            <span class="me-3 fw-bold small">Quantity</span>
                            <button class="btn btn-sm btn-outline-dark" onclick="qty.value = Math.max(1, parseInt(qty.value)-1)">-</button>
                            <input type="text" id="qty" class="qty-input mx-2" value="1" readonly>
                            <button class="btn btn-sm btn-outline-dark" onclick="qty.value = parseInt(qty.value)+1">+</button>
                        </div>

                        <div class="small mb-2"><strong>Shipping:</strong> Standard 3-5 Days</div>
                        <div class="small mb-4"><strong>Payment:</strong> GCash, COD, Credit Card</div>

                        <div class="d-flex gap-2">
                            <button class="btn-cart">🛒 Add to Cart</button>
                            <button class="btn btn-outline-dark">♡</button>
                        </div>
                        <button class="btn-buy">Place Order Now</button>

                        <div class="mt-5 d-flex align-items-center border-top pt-3">
                            <div style="width:40px; height:40px; background:#ccc; border-radius:50%; margin-right:10px;"></div>
                            <span class="fw-bold">Shàn yú Official Shop</span>
                        </div>
                    </div>
                </div>

                <!-- Tabs Section -->
                <div class="mt-5 pt-5">
                    <ul class="nav nav-underline border-bottom mb-3">
                        <li class="nav-item"><a class="nav-link active text-maroon fw-bold" href="#">About Item</a></li>
                        <li class="nav-item"><a class="nav-link text-muted" href="#">Reviews</a></li>
                    </ul>
                    <div class="p-3 bg-white border">
                        <?= $product['desc'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>