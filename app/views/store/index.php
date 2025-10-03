<?php
// Include the main layout
$content = ob_start();
?>

<!-- Store Hero Section -->
<section class="store-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1><?php echo $this->translate('nav_store', 'Store'); ?></h1>
            <p style="font-size: 1.25rem;">Support our mission by purchasing NGO-branded merchandise. All proceeds go directly to our programs and community initiatives.</p>
        </div>
    </div>
</section>

<!-- Store Filters -->
<section class="section" style="background: #f8f9fa; padding: 40px 0;">
    <div class="container">
        <div style="text-align: center;">
            <h3>Browse Products</h3>
            <form method="GET" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 1rem; max-width: 800px; margin-left: auto; margin-right: auto;">
                <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($search); ?>" style="flex: 1; min-width: 200px; padding: 0.75rem; border: 2px solid var(--border-light); border-radius: var(--border-radius);">
                <select name="category" style="padding: 0.75rem; border: 2px solid var(--border-light); border-radius: var(--border-radius);">
                    <option value="">All Categories</option>
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['category']; ?>" <?php echo $currentCategory === $category['category'] ? 'selected' : ''; ?>>
                                <?php echo ucfirst($category['category']); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
</section>

<!-- Products Grid -->
<section class="section">
    <div class="container">
        <?php if (!empty($products)): ?>
            <div class="grid grid-3">
                <?php foreach ($products as $product): ?>
                    <div class="card" style="height: 100%;">
                        <div class="card-body" style="display: flex; flex-direction: column;">
                            <div style="height: 200px; background: #f8f9fa; border-radius: var(--border-radius); margin-bottom: 1rem; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: var(--text-light-grey);">
                                👕
                            </div>
                            
                            <h3 style="margin-bottom: 1rem;"><?php echo $product['name']; ?></h3>
                            
                            <p style="margin-bottom: 1rem; flex-grow: 1;"><?php echo $product['description']; ?></p>
                            
                            <div style="margin-bottom: 1rem;">
                                <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary-blue);">
                                    <?php echo number_format($product['price']); ?> XAF
                                </span>
                                <?php if ($product['stock_quantity'] > 0): ?>
                                    <span style="color: green; margin-left: 1rem;">In Stock</span>
                                <?php else: ?>
                                    <span style="color: red; margin-left: 1rem;">Out of Stock</span>
                                <?php endif; ?>
                            </div>
                            
                            <div style="margin-top: auto;">
                                <a href="/store/product/<?php echo $product['id']; ?>" class="btn btn-primary" style="width: 100%; margin-bottom: 0.5rem;">View Details</a>
                                <?php if ($product['stock_quantity'] > 0): ?>
                                    <button class="btn btn-outline" style="width: 100%;" onclick="addToCart(<?php echo $product['id']; ?>)">Add to Cart</button>
                                <?php else: ?>
                                    <button class="btn btn-outline" style="width: 100%;" disabled>Out of Stock</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Default products if database is empty -->
            <div class="grid grid-3">
                <div class="card" style="height: 100%;">
                    <div class="card-body" style="display: flex; flex-direction: column;">
                        <div style="height: 200px; background: #f8f9fa; border-radius: var(--border-radius); margin-bottom: 1rem; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: var(--text-light-grey);">
                            👕
                        </div>
                        
                        <h3 style="margin-bottom: 1rem;">The Way of Hope T-Shirt</h3>
                        
                        <p style="margin-bottom: 1rem; flex-grow: 1;">High-quality cotton t-shirt featuring our logo and mission statement. Available in multiple sizes and colors.</p>
                        
                        <div style="margin-bottom: 1rem;">
                            <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary-blue);">5,000 XAF</span>
                            <span style="color: green; margin-left: 1rem;">In Stock</span>
                        </div>
                        
                        <div style="margin-top: auto;">
                            <a href="#" class="btn btn-primary" style="width: 100%; margin-bottom: 0.5rem;">View Details</a>
                            <button class="btn btn-outline" style="width: 100%;" onclick="addToCart(1)">Add to Cart</button>
                        </div>
                    </div>
                </div>
                
                <div class="card" style="height: 100%;">
                    <div class="card-body" style="display: flex; flex-direction: column;">
                        <div style="height: 200px; background: #f8f9fa; border-radius: var(--border-radius); margin-bottom: 1rem; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: var(--text-light-grey);">
                            🎒
                        </div>
                        
                        <h3 style="margin-bottom: 1rem;">Logo Tote Bag</h3>
                        
                        <p style="margin-bottom: 1rem; flex-grow: 1;">Eco-friendly canvas tote bag perfect for shopping or carrying books. Features our logo and mission statement.</p>
                        
                        <div style="margin-bottom: 1rem;">
                            <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary-blue);">3,000 XAF</span>
                            <span style="color: green; margin-left: 1rem;">In Stock</span>
                        </div>
                        
                        <div style="margin-top: auto;">
                            <a href="#" class="btn btn-primary" style="width: 100%; margin-bottom: 0.5rem;">View Details</a>
                            <button class="btn btn-outline" style="width: 100%;" onclick="addToCart(2)">Add to Cart</button>
                        </div>
                    </div>
                </div>
                
                <div class="card" style="height: 100%;">
                    <div class="card-body" style="display: flex; flex-direction: column;">
                        <div style="height: 200px; background: #f8f9fa; border-radius: var(--border-radius); margin-bottom: 1rem; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: var(--text-light-grey);">
                            🧢
                        </div>
                        
                        <h3 style="margin-bottom: 1rem;">Logo Cap</h3>
                        
                        <p style="margin-bottom: 1rem; flex-grow: 1;">Comfortable baseball cap with embroidered logo. Perfect for outdoor activities and showing your support.</p>
                        
                        <div style="margin-bottom: 1rem;">
                            <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary-blue);">4,000 XAF</span>
                            <span style="color: green; margin-left: 1rem;">In Stock</span>
                        </div>
                        
                        <div style="margin-top: auto;">
                            <a href="#" class="btn btn-primary" style="width: 100%; margin-bottom: 0.5rem;">View Details</a>
                            <button class="btn btn-outline" style="width: 100%;" onclick="addToCart(3)">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Shopping Cart -->
<div id="cartModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border-radius: var(--border-radius); padding: 2rem; max-width: 500px; width: 90%;">
        <h3>Shopping Cart</h3>
        <div id="cartItems"></div>
        <div style="margin-top: 2rem; text-align: center;">
            <button onclick="closeCart()" class="btn btn-outline" style="margin-right: 1rem;">Continue Shopping</button>
            <button onclick="checkout()" class="btn btn-primary">Checkout</button>
        </div>
    </div>
</div>

<!-- Store Information -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-title">
            <h2>Store Information</h2>
            <p>Everything you need to know about shopping with us</p>
        </div>
        
        <div class="grid grid-3">
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🚚</div>
                    <h4>Free Shipping</h4>
                    <p>Free shipping on all orders within Cameroon. International shipping available at additional cost.</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💳</div>
                    <h4>Secure Payment</h4>
                    <p>All payments are processed securely through our trusted payment partners. Multiple payment methods accepted.</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🎯</div>
                    <h4>Support Our Mission</h4>
                    <p>100% of profits go directly to our programs and community initiatives. Your purchase makes a real difference.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
let cart = [];

function addToCart(productId) {
    // In a real implementation, this would add the product to the cart
    cart.push({id: productId, quantity: 1});
    alert('Product added to cart!');
}

function showCart() {
    const modal = document.getElementById('cartModal');
    const cartItems = document.getElementById('cartItems');
    
    if (cart.length === 0) {
        cartItems.innerHTML = '<p>Your cart is empty.</p>';
    } else {
        cartItems.innerHTML = '<p>Cart functionality would be implemented here.</p>';
    }
    
    modal.style.display = 'block';
}

function closeCart() {
    document.getElementById('cartModal').style.display = 'none';
}

function checkout() {
    alert('Checkout functionality would be implemented here.');
    closeCart();
}
</script>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>
