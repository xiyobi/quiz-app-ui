<?php require '../resources/views/componets/header.php'; ?>
<body class="bg-gray-50">
<!-- Navigation -->
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-indigo-600">Quiz App</h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#features" class="text-gray-600 hover:text-gray-900">Features</a>
                    <a href="#how-it-works" class="text-gray-600 hover:text-gray-900">How It Works</a>
                    <a href="/-login" class="text-gray-600 hover:text-gray-900">Login</a>
                    <a href="/add-quiz"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Register
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <i class="fas fa-bars text-gray-500 text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden mobile-menu md:hidden pl-3">
        <a href="#features" class="block my-2 text-xl text-gray-600 hover:text-gray-900">Features</a>
        <a href="#how-it-works" class="block my-2 text-xl text-gray-600 hover:text-gray-900">How It Works</a>
        <a href="login.html" class="block my-2 text-xl text-gray-600 hover:text-gray-900">Login</a>
        <a href="add-quiz.php"
           class="block my-2 text-xl inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            Register
        </a>
    </div>
</nav>

<!-- Hero Section -->
<div class="bg-indigo-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <a href="QuizApp"><h1 class="text-4xl md:text-5xl font-bold mb-4">About QuizApp</h1></a>
        <p class="text-xl md:text-2xl">Empowering Learning Through Interactive Quizzes</p>
    </div>
</div>

<!-- Mission and Vision -->
<section class="py-16 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Our Mission & Vision</h2>
                <p class="text-gray-600 mb-6">Our mission is to make learning engaging, accessible, and effective
                    through interactive quizzes. We believe in the power of active learning and aim to create an
                    environment where knowledge acquisition becomes an exciting journey.</p>
                <p class="text-gray-600">We envision a world where quality education is accessible to everyone,
                    everywhere, through innovative digital solutions that adapt to individual learning styles.</p>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c" alt="Team collaboration"
                     class="rounded-lg shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="bg-gray-100 py-16 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold mb-12 text-center text-gray-800">Meet Our Team</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" alt="Team member"
                     class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="text-xl font-semibold mb-2">John Doe</h3>
                <p class="text-gray-600">Founder & CEO</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80" alt="Team member"
                     class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="text-xl font-semibold mb-2">Jane Smith</h3>
                <p class="text-gray-600">Head of Education</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e" alt="Team member"
                     class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="text-xl font-semibold mb-2">Mike Johnson</h3>
                <p class="text-gray-600">Lead Developer</p>
            </div>
        </div>
    </div>
</section>

<!-- Features and Benefits -->
<section class="py-16 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold mb-12 text-center text-gray-800">Features & Benefits</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="p-6 border rounded-lg">
                <i class="fas fa-laptop-code text-3xl text-indigo-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-3">Interactive Learning</h3>
                <p class="text-gray-600">Engage with dynamic quiz content that adapts to your learning style and
                    pace.</p>
            </div>
            <div class="p-6 border rounded-lg">
                <i class="fas fa-chart-line text-3xl text-indigo-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-3">Progress Tracking</h3>
                <p class="text-gray-600">Monitor your improvement with detailed analytics and performance insights.</p>
            </div>
            <div class="p-6 border rounded-lg">
                <i class="fas fa-users text-3xl text-indigo-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-3">Collaborative Learning</h3>
                <p class="text-gray-600">Share quizzes and compete with friends to make learning more engaging.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="bg-gray-100 py-16 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold mb-12 text-center text-gray-800">Frequently Asked Questions</h2>
        <div class="space-y-6 max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-3">How do I create a quiz?</h3>
                <p class="text-gray-600">Simply sign up for an account, navigate to the dashboard, and click on "Create
                    Quiz". Follow the intuitive interface to add questions and customize your quiz.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-3">Is QuizApp free to use?</h3>
                <p class="text-gray-600">Yes, QuizApp offers a free tier with essential features. Premium features are
                    available through our subscription plans.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-3">Can I share my quizzes with others?</h3>
                <p class="text-gray-600">Yes, you can easily share your quizzes via a unique link or invite participants
                    directly through email.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="mb-8 md:mb-0">
            <h3 class="text-2xl font-bold mb-4">QuizApp</h3>
            <p class="text-gray-400">Making learning fun and effective through interactive quizzes.</p>
        </div>
        <div>
            <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
            <ul class="space-y-2">
                <li><a href="/" class="text-gray-400 hover:text-white">Home</a></li>
                <li><a href="/about.html" class="text-gray-400 hover:text-white">About</a></li>
                <li><a href="/login.html" class="text-gray-400 hover:text-white">Login</a></li>
                <li><a href="/register.html" class="text-gray-400 hover:text-white">Register</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-lg font-semibold mb-4">Support</h4>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-400 hover:text-white">Help Center</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Contact Us</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Terms of Service</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>

<script>
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
<?php require '../resources/views/componets/footer.php'; ?>