<?php
include 'src/config/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReWear - Community Clothing Exchange</title>
    <link href="./src/css/output.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-green-600">ReWear</h1>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors">Home</a>
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors">Browse</a>
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors">How It Works</a>
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors">Community</a>
                </nav>
                
                <!-- Auth Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="login.php" class="text-gray-700 hover:text-green-600 text-sm font-medium transition-colors">Login</a>
                    <a href="signup.php" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">Sign Up</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-green-50 to-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                    Sustainable Fashion <br>
                    <span class="text-green-600">Starts Here</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                    Join our community clothing exchange platform. Swap unused garments, earn points, and contribute to a more sustainable future while refreshing your wardrobe.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="signup.php" class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        Start Exchanging
                    </a>
                    <a href="#how-it-works" class="border border-green-600 text-green-600 hover:bg-green-50 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Bar Section -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-50 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">Find Your Next Favorite Piece</h2>
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" placeholder="Search for clothing items..." 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div class="flex-1">
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option>All Categories</option>
                            <option>Tops</option>
                            <option>Bottoms</option>
                            <option>Dresses</option>
                            <option>Outerwear</option>
                            <option>Accessories</option>
                        </select>
                    </div>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Shop by Category</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tshirt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900">Tops</h3>
                </div>
                <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900">Formal</h3>
                </div>
                <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-female text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900">Dresses</h3>
                </div>
                <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-jacket text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900">Outerwear</h3>
                </div>
                <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-running text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900">Activewear</h3>
                </div>
                <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-gem text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900">Accessories</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Items Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Featured Items</h2>
                <a href="#" class="text-green-600 hover:text-green-700 font-semibold">View All →</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-6">
                <!-- Product Card 1 -->
                 <?php
                    $sql = "SELECT * FROM listing ORDER BY id DESC LIMIT 5";
                    $result = $conn->query($sql);
                    ?>

                    <!-- Card Grid -->
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <?php
                        $images = json_decode($row['listing_img'], true);
                        $mainImage = $images[0] ?? "https://placehold.co/400x400";
                        ?>
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-square bg-gray-100 relative">
                            <div class="absolute top-4 left-4">
                            <span class="bg-green-600 text-white px-2 py-1 rounded-full text-xs font-semibold">New</span>
                            </div>
                            <img src="<?= htmlspecialchars($mainImage) ?>" alt="Product" class="w-full h-full object-cover">
                        </div>

                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2"><?= htmlspecialchars($row['listing_name']) ?></h3>
                            <p class="text-gray-600 text-sm mb-3">
                            <?= htmlspecialchars(mb_strimwidth($row['listing_desc'], 0, 60, '...')) ?>
                            </p>
                            <div class="flex justify-between items-center">
                            <span class="text-green-600 font-bold">50 Points</span>
                            <a href="product_detail.php?product_id=<?php echo $row['id']?>" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                View
                            </a>
                            </div>
                        </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">How ReWear Works</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Simple steps to start your sustainable fashion journey
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">List Your Items</h3>
                    <p class="text-gray-600">
                        Upload photos of your unused clothing items and set their condition and exchange value.
                    </p>
                </div>
                
                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Browse & Exchange</h3>
                    <p class="text-gray-600">
                        Discover items from other users and exchange using our point system or direct swaps.
                    </p>
                </div>
                
                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Refresh Your Style</h3>
                    <p class="text-gray-600">
                        Receive your new items and enjoy a refreshed wardrobe while helping the environment.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-green-600">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-white mb-4">
                Ready to Start Your Sustainable Fashion Journey?
            </h2>
            <p class="text-xl text-green-100 mb-8">
                Join thousands of users who are already making a difference through clothing exchange.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="signup.php" class="bg-white text-green-600 hover:bg-gray-100 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                    Join ReWear Today
                </a>
                <a href="#" class="border-2 border-white text-white hover:bg-white hover:text-green-600 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">What Our Community Says</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">S</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                            <p class="text-gray-600 text-sm">Fashion Enthusiast</p>
                        </div>
                    </div>
                    <p class="text-gray-700">
                        "ReWear has completely changed how I think about fashion. I've refreshed my entire wardrobe sustainably!"
                    </p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">M</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Mike Chen</h4>
                            <p class="text-gray-600 text-sm">Environmental Advocate</p>
                        </div>
                    </div>
                    <p class="text-gray-700">
                        "The point system is brilliant! I've earned so many points from items I never wore."
                    </p>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">A</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Anna Rodriguez</h4>
                            <p class="text-gray-600 text-sm">College Student</p>
                        </div>
                    </div>
                    <p class="text-gray-700">
                        "As a student, ReWear helps me stay stylish on a budget while being environmentally conscious."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo and Description -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold text-green-400 mb-4">ReWear</h3>
                    <p class="text-gray-300 mb-4">
                        Promoting sustainable fashion through community-driven clothing exchange. 
                        Join us in reducing textile waste and creating a more sustainable future.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-green-400 transition-colors">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-green-400 transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-green-400 transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-green-400 transition-colors">Browse Items</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-green-400 transition-colors">How It Works</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-green-400 transition-colors">Community</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-green-400 transition-colors">Support</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h4 class="font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-300">
                            <i class="fas fa-envelope mr-2"></i>
                            support@rewear.com
                        </li>
                        <li class="text-gray-300">
                            <i class="fas fa-phone mr-2"></i>
                            (555) 123-4567
                        </li>
                        <li class="text-gray-300">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            123 Green Street, Eco City
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400">
                    © 2025 ReWear. All rights reserved. Building a sustainable future, one exchange at a time.
                </p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        // Simple mobile menu toggle (you can enhance this with more advanced functionality)
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scrolling for anchor links
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        });
    </script>
</body>
</html>