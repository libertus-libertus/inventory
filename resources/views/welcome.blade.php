<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linventory - Smart Inventory Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 50%, #581c87 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .feature-card {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .floating-animation {
            animation: floating 6s ease-in-out infinite;
        }
        
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .fade-in-up {
            animation: fadeInUp 1s ease-out;
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
    </style>
</head>
<body class="bg-gray-50" x-data="{ mobileMenuOpen: false }">
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-2 rounded-lg">
                        <i class="fas fa-boxes text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            Linventory
                        </h1>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Home</a>
                    <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Features</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Contact</a>
                    <a href="{{ route('login') }}" 
                        class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login
                    </a>
                </div>
                
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 hover:text-blue-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-white border-t border-gray-200">
            <div class="px-4 py-4 space-y-4">
                <a href="#home" class="block text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="#features" class="block text-gray-700 hover:text-blue-600 font-medium">Features</a>
                <a href="#contact" class="block text-gray-700 hover:text-blue-600 font-medium">Contact</a>
                <a href="{{ route('login') }}"
                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-lg font-semibold">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <section id="home" class="hero-gradient min-h-screen flex items-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25px 25px, rgba(255,255,255,0.3) 2px, transparent 0), radial-gradient(circle at 75px 75px, rgba(255,255,255,0.3) 2px, transparent 0); background-size: 100px 100px;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-white fade-in-up">
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        Smart Inventory
                        <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                            Management
                        </span>
                        Made Simple
                    </h1>
                    <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                        Streamline your inventory operations with our powerful, intuitive platform. 
                        Track stock, manage suppliers, and optimize your warehouse efficiency in real-time.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button 
                            @click="showAuthModal = true; activeTab = 'login'"
                            class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                            <i class="fas fa-rocket mr-2"></i>
                            Get Started
                        </button>
                        <button class="glass-effect text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white/20 transition-all duration-200">
                            <i class="fas fa-play mr-2"></i>
                            Watch Demo
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-3 gap-8 mt-12">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-400">500+</div>
                            <div class="text-blue-200">Companies</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-400">99.9%</div>
                            <div class="text-blue-200">Uptime</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-400">24/7</div>
                            <div class="text-blue-200">Support</div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="floating-animation">
                        <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white/20 rounded-xl p-4 text-center">
                                    <i class="fas fa-chart-line text-yellow-400 text-3xl mb-2"></i>
                                    <div class="text-white font-semibold">Analytics</div>
                                </div>
                                <div class="bg-white/20 rounded-xl p-4 text-center">
                                    <i class="fas fa-warehouse text-green-400 text-3xl mb-2"></i>
                                    <div class="text-white font-semibold">Warehouse</div>
                                </div>
                                <div class="bg-white/20 rounded-xl p-4 text-center">
                                    <i class="fas fa-truck text-blue-400 text-3xl mb-2"></i>
                                    <div class="text-white font-semibold">Shipping</div>
                                </div>
                                <div class="bg-white/20 rounded-xl p-4 text-center">
                                    <i class="fas fa-users text-purple-400 text-3xl mb-2"></i>
                                    <div class="text-white font-semibold">Team</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Powerful Features</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Everything you need to manage your inventory efficiently and scale your business
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="bg-blue-100 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-chart-bar text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Real-time Analytics</h3>
                    <p class="text-gray-600">
                        Get instant insights into your inventory levels, sales trends, and performance metrics with our advanced analytics dashboard.
                    </p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="bg-green-100 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-sync-alt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Auto Sync</h3>
                    <p class="text-gray-600">
                        Automatically synchronize inventory across multiple warehouses and sales channels in real-time.
                    </p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="bg-purple-100 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Secure & Reliable</h3>
                    <p class="text-gray-600">
                        Enterprise-grade security with 99.9% uptime guarantee. Your data is always safe and accessible.
                    </p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="bg-yellow-100 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Mobile Ready</h3>
                    <p class="text-gray-600">
                        Access your inventory from anywhere with our responsive design and mobile apps.
                    </p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="bg-red-100 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-bell text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Smart Alerts</h3>
                    <p class="text-gray-600">
                        Get notified about low stock, expiring items, and important inventory events automatically.
                    </p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="bg-indigo-100 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-cogs text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Easy Integration</h3>
                    <p class="text-gray-600">
                        Seamlessly integrate with your existing ERP, accounting, and e-commerce platforms.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Get in Touch</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Have questions or need support? We're here to help!
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-6">Contact Information</h3>
                    <div class="space-y-6">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-blue-600 text-2xl mr-4"></i>
                            <p class="text-lg text-gray-700">123 Linventory Street, Inventory City, IN 12345</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-blue-600 text-2xl mr-4"></i>
                            <p class="text-lg text-gray-700">+1 (555) 123-4567</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-blue-600 text-2xl mr-4"></i>
                            <p class="text-lg text-gray-700">support@linventory.com</p>
                        </div>
                    </div>
                    <div class="mt-8">
                        <h4 class="text-xl font-semibold text-gray-900 mb-4">Follow Us</h4>
                        <div class="flex space-x-6">
                            <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">
                                <i class="fab fa-facebook-f text-2xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">
                                <i class="fab fa-twitter text-2xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">
                                <i class="fab fa-linkedin-in text-2xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">
                                <i class="fab fa-instagram text-2xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-6 text-center">Send us a Message</h3>
                    <form method="POST" action="/contact" class="space-y-6">
                        @csrf <div>
                            <label for="contact_name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                            <input 
                                id="contact_name" 
                                name="name" 
                                type="text" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                placeholder="Enter your name">
                        </div>
                        <div>
                            <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">Your Email</label>
                            <input 
                                id="contact_email" 
                                name="email" 
                                type="email" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                placeholder="Enter your email">
                        </div>
                        <div>
                            <label for="contact_message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea 
                                id="contact_message" 
                                name="message" 
                                rows="5" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                placeholder="Write your message here..."></textarea>
                        </div>
                        <button 
                            type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-white mb-6">
                Ready to Transform Your Inventory Management?
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                Join thousands of businesses that trust Linventory to streamline their operations
            </p>
            <a href="{{ route('login') }}" 
                class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                <i class="fas fa-rocket mr-2"></i>
                Start Free Trial
            </a>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-2 rounded-lg">
                            <i class="fas fa-boxes text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Linventory</h3>
                    </div>
                    <p class="text-gray-400">
                        Smart inventory management for modern businesses.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Product</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Features</a></li>
                        <li><a href="#" class="hover:text-white">Pricing</a></li>
                        <li><a href="#" class="hover:text-white">API</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Company</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">About</a></li>
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                        <li><a href="#" class="hover:text-white">Careers</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Help Center</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                        <li><a href="#" class="hover:text-white">Status</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Linventory. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
