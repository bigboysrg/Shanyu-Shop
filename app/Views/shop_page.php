<link rel="stylesheet" href="<?= base_url('css/shop.css') ?>">

<div class="shop-container">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <section>
            <h2 class="filter-title">Filter by Price</h2>
            <div class="filter-line"></div>
            <ul class="filter-list">
                <li><a href="<?= site_url('products') ?>">All</a></li>
                <li><a href="?price=under5">Under 5$</a></li>
                <li><a href="?price=10-20">10$ - 20$</a></li>
                <li><a href="?price=20-50">20$ - 50$</a></li>
                <li><a href="?price=above100">Above 100$</a></li>
            </ul>
        </section>

        <section style="margin-top: 40px;">
            <h2 class="filter-title">Filter by Rating</h2>
            <div class="filter-line"></div>
            <ul class="filter-list">
                <li><a href="?rating=5">5 Stars ★★★★★</a></li>
                <li><a href="?rating=4">4 Stars ★★★★</a></li>
                <li><a href="?rating=3">3 Stars ★★★</a></li>
            </ul>
        </section>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <!-- Search Bar -->
        <form action="<?= site_url('products') ?>" method="get" class="search-container">
            <input type="text" name="search" placeholder="Search for products..." value="<?= esc(request()->getGet('search')) ?>">
            <button type="submit" class="search-icon">🔍</button>
        </form>

        <!-- Product Grid -->
        <div class="product-grid">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $p): ?>
                    <div class="shop-card">
                        <div class="card-img-holder">
                            <img src="<?= base_url('images/' . $p['img']) ?>" alt="<?= $p['name'] ?>">
                        </div>
                        <p class="product-name"><?= $p['name'] ?></p>
                        <p class="product-price">$<?= number_format($p['price'], 2) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="color: white; grid-column: 1/-1; text-align: center;">No products found.</p>
            <?php endif; ?>
        </div>
    </main>
</div>