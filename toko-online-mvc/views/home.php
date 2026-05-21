<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliteStore - Premium Online Shopping</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1a1a2e;
            --secondary: #16213e;
            --accent: #0f3460;
            --gold: #d4af37;
            --light: #f8f9fa;
            --gradient-1: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            --gradient-2: linear-gradient(135deg, #0f3460 0%, #533483 100%);
            --gradient-gold: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--gradient-1);
            background-attachment: fixed;
            color: var(--light);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(212, 175, 55, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(83, 52, 131, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(15, 52, 96, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
            animation: backgroundPulse 15s ease-in-out infinite;
        }

        @keyframes backgroundPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        /* Navbar */
        nav {
            background: rgba(26, 26, 46, 0.95);
            backdrop-filter: blur(20px);
            padding: 1.5rem 5%;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 700;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 2px;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
            list-style: none;
        }

        .nav-menu a {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-gold);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .search-bar {
            position: relative;
            margin: 0 2rem;
        }

        .search-bar input {
            padding: 0.7rem 2.5rem 0.7rem 1.2rem;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.05);
            color: var(--light);
            width: 300px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .search-bar input:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(255, 255, 255, 0.1);
            width: 350px;
        }

        .search-bar button {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--gradient-gold);
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-bar button:hover {
            transform: translateY(-50%) scale(1.1);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.6rem 1.5rem;
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .user-profile:hover {
            background: rgba(212, 175, 55, 0.2);
            transform: translateY(-2px);
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: var(--gradient-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--primary);
        }

        .user-name {
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Hero Section */
        .hero {
            padding: 6rem 5% 4rem;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 4.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 1s ease;
        }

        .hero p {
            font-size: 1.2rem;
            color: rgba(248, 249, 250, 0.8);
            max-width: 600px;
            margin: 0 auto 2rem;
            line-height: 1.8;
            animation: fadeInUp 1s ease 0.2s;
            animation-fill-mode: both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Products Grid */
        .products-section {
            padding: 4rem 5%;
            position: relative;
            z-index: 1;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            text-align: center;
            margin-bottom: 3rem;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-10px);
            border-color: var(--gold);
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.2);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            font-size: 0.8rem;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .product-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--light);
        }

        .product-description {
            font-size: 0.9rem;
            color: rgba(248, 249, 250, 0.7);
            margin-bottom: 1rem;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .product-stock {
            font-size: 0.85rem;
            color: rgba(248, 249, 250, 0.6);
        }

        .btn-buy {
            padding: 0.7rem 1.8rem;
            background: var(--gradient-gold);
            color: var(--primary);
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
        }

        .btn-buy:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(212, 175, 55, 0.4);
        }

        /* Footer */
        footer {
            background: rgba(26, 26, 46, 0.95);
            padding: 3rem 5%;
            margin-top: 4rem;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
            position: relative;
            z-index: 1;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-section p {
            color: rgba(248, 249, 250, 0.7);
            line-height: 1.8;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--gradient-gold);
            color: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
            color: rgba(248, 249, 250, 0.6);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .search-bar {
                margin: 0 1rem;
            }

            .search-bar input {
                width: 200px;
            }

            .search-bar input:focus {
                width: 220px;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1.5rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        /* Loading Animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-1);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loading.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(212, 175, 55, 0.3);
            border-top-color: var(--gold);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <!-- Navbar -->
    <nav>
        <div class="nav-container">
            <a href="index.php?action=home" class="logo">ELITESTORE</a>
            
            <ul class="nav-menu">
                <li><a href="index.php?action=home">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <form class="search-bar" method="GET" action="index.php">
                <input type="hidden" name="action" value="search">
                <input type="text" name="keyword" placeholder="Search products..." 
                       value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                <button type="submit">
                    <i class="fas fa-search" style="color: #1a1a2e;"></i>
                </button>
            </form>

            <?php if(isset($_SESSION['user_id'])): ?>
                <div class="user-profile">
                    <div class="user-avatar">
                        <?php echo strtoupper(substr($_SESSION['full_name'], 0, 1)); ?>
                    </div>
                    <div>
                        <div class="user-name"><?php echo htmlspecialchars($_SESSION['full_name']); ?></div>
                        <?php if($_SESSION['role'] === 'admin'): ?>
                            <a href="index.php?action=admin" style="font-size: 0.8rem; color: var(--gold);">Admin Panel</a>
                        <?php endif; ?>
                    </div>
                    <a href="index.php?action=logout" style="margin-left: 1rem; color: var(--gold);">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            <?php else: ?>
                <a href="index.php?action=login" class="user-profile" style="text-decoration: none;">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="user-name">Login</span>
                </a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Luxury at Your Fingertips</h1>
        <p>Discover premium products curated for the discerning customer. Excellence in every detail.</p>
    </section>

    <!-- Products Section -->
    <section class="products-section" id="products">
        <h2 class="section-title">Featured Collection</h2>
        
        <div class="products-grid">
            <?php
            if($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    echo '
                    <div class="product-card">
                        <img src="' . htmlspecialchars($image_url) . '" alt="' . htmlspecialchars($name) . '" class="product-image">
                        <div class="product-info">
                            <div class="product-category">' . htmlspecialchars($category) . '</div>
                            <h3 class="product-name">' . htmlspecialchars($name) . '</h3>
                            <p class="product-description">' . htmlspecialchars($description) . '</p>
                            <div class="product-footer">
                                <div>
                                    <div class="product-price">Rp ' . number_format($price, 0, ',', '.') . '</div>
                                    <div class="product-stock">Stock: ' . $stock . ' units</div>
                                </div>
                            </div>
                            <button class="btn-buy" onclick="buyProduct(' . $id . ')">Add to Cart</button>
                        </div>
                    </div>';
                }
            } else {
                echo '<p style="text-align: center; grid-column: 1/-1;">No products found.</p>';
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>EliteStore</h3>
                <p>Your premier destination for luxury online shopping. Quality products, exceptional service.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <p><a href="#" style="color: rgba(248, 249, 250, 0.7); text-decoration: none;">About Us</a></p>
                <p><a href="#" style="color: rgba(248, 249, 250, 0.7); text-decoration: none;">Products</a></p>
                <p><a href="#" style="color: rgba(248, 249, 250, 0.7); text-decoration: none;">Contact</a></p>
                <p><a href="#" style="color: rgba(248, 249, 250, 0.7); text-decoration: none;">FAQ</a></p>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <p><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</p>
                <p><i class="fas fa-phone"></i> +62 812-3456-7890</p>
                <p><i class="fas fa-envelope"></i> info@elitestore.com</p>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2026 EliteStore. All rights reserved. Built with MVC Architecture.</p>
        </div>
    </footer>

    <script>
        // Loading animation
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loading').classList.add('hidden');
            }, 800);
        });

        // Buy product function
        function buyProduct(productId) {
            <?php if(isset($_SESSION['user_id'])): ?>
                alert('Product added to cart! (Feature in development)');
            <?php else: ?>
                if(confirm('Please login to purchase products. Go to login page?')) {
                    window.location.href = 'index.php?action=login';
                }
            <?php endif; ?>
        }

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if(target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.product-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>
