<!-- 1. EXTERNAL ASSETS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<!-- Font Awesome for the Cart Icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    :root {
        --maroon: #800000;
        --cream: #F5E6BE;
        --price-green: #006400;
    }

    body {
        background-color: var(--maroon) !important;
        font-family: 'Poppins', sans-serif;
        margin: 0;
    }

    /* SIDEBAR */
    .sidebar-fixed {
        background-color: var(--cream);
        min-height: 100vh;
        padding: 30px 20px;
        border-right: 3px solid var(--maroon);
    }

    .filter-title {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        font-size: 1.6rem;
        color: var(--maroon);
        border-bottom: 2px solid var(--maroon);
        margin-bottom: 20px;
    }

    .filter-link {
        display: block;
        color: var(--maroon);
        text-decoration: none;
        margin-bottom: 10px;
        font-weight: 600;
    }

    /* PRODUCT AREA */
    .product-display-area {
        padding: 40px;
    }

    /* SEARCH & CART FLEX BOX */
    .search-flex-container {
        display: flex;
        align-items: center;
        gap: 15px;
        max-width: 850px;
        margin-bottom: 40px;
    }

    .search-capsule {
        background-color: var(--cream);
        border-radius: 50px;
        border: none;
        padding: 12px 30px;
        width: 100%;
        font-size: 1.1rem;
    }

    /* THE CART BUTTON */
    .cart-btn-circle {
        background-color: var(--cream);
        color: var(--maroon);
        width: 55px;
        height: 55px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        text-decoration: none;
        transition: 0.3s ease;
        flex-shrink: 0; /* Keeps it circular */
        border: none;
    }

    .cart-btn-circle:hover {
        background-color: #fff;
        transform: scale(1.1);
        color: var(--maroon);
    }

    /* THE GRID */
    .iem-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 25px;
    }

    .iem-card {
        background-color: var(--cream);
        padding: 20px;
        text-align: center;
        border-radius: 4px;
        height: 320px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-decoration: none;
        transition: 0.3s;
    }

    .iem-card:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 20px rgba(0,0,0,0.4);
    }

    .iem-img-container {
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .iem-img-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .iem-name {
        color: var(--maroon);
        font-weight: bold;
        font-size: 0.9rem;
        margin: 10px 0;
    }

    .iem-price {
        color: var(--price-green);
        font-weight: 800;
        font-size: 1.6rem;
    }
</style>

<div class="container-fluid p-0">
    <div class="d-flex">
        
        <!-- SIDEBAR -->
        <div style="width: 250px; flex-shrink: 0;">
            <div class="sidebar-fixed">
                <h4 class="filter-title">Filter by Price</h4>
                <a href="<?= site_url('products') ?>" class="filter-link">All</a>
                <a href="<?= site_url('products?price=under5') ?>" class="filter-link">Under 5$</a>
                <a href="<?= site_url('products?price=10-20') ?>" class="filter-link">10$ - 20$</a>
                <a href="<?= site_url('products?price=20-50') ?>" class="filter-link">20$ - 50$</a>
                <a href="<?= site_url('products?price=above100') ?>" class="filter-link">Above 100$</a>

                <h4 class="filter-title mt-5">Filter by Rating</h4>
                <a href="<?= site_url('products?rating=5') ?>" class="filter-link">5 Stars ★★★★★</a>
                <a href="<?= site_url('products?rating=4') ?>" class="filter-link">4 Stars ★★★★</a>
                <a href="<?= site_url('products?rating=3') ?>" class="filter-link">3 Stars ★★★</a>
            </div>
        </div>

        <!-- MAIN PRODUCT SECTION -->
        <div class="flex-grow-1 product-display-area">
            
            <!-- SEARCH & CART ICON WRAPPER -->
            <div class="search-flex-container">
                <form action="<?= site_url('products') ?>" method="get" class="flex-grow-1">
                    <input type="text" name="search" class="search-capsule" placeholder="Search products..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                </form>

                <!-- Link to your Shopping Cart Page -->
                <a href="<?= site_url('cart') ?>" class="cart-btn-circle" title="View Cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>

            <!-- GRID -->
            <div class="iem-grid">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $p): ?>
                        <a href="<?= site_url('products/details/' . $p['id']) ?>" class="iem-card">
                            <div class="iem-img-container">
                                <img src="<?= base_url('images/' . $p['img']) ?>" 
                                alt="<?= $p['name'] ?>" 
                                style="max-width:100%; max-height:100%; object-fit:contain;">
                            </div>
                            <div class="iem-name"><?= $p['name'] ?></div>
                            <div class="iem-price">$<?= number_format($p['price'], 2) ?></div>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h3 class="text-white italic">No products found.</h3>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>