<?php require '../resources/views/components/header.php'; ?>
<body class="bg-gradient-to-b from-gray-50 to-gray-100">
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/home"> <h1 class="text-2xl font-bold text-indigo-600">Quiz App</h1></a>
            </div>
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#features" class="text-gray-600 hover:text-gray-900">Features</a>
                    <a href="#how-it-works" class="text-gray-600 hover:text-gray-900">How It Works</a>
                    <a href="/login" class="text-gray-600 hover:text-gray-900">Login</a>
                    <a href="/register"
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
        <a href="/login" class="block my-2 text-xl text-gray-600 hover:text-gray-900">Login</a>
        <a href="/register"
           class="block my-2 text-xl inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            Register
        </a>
    </div>
</nav>


<main>
    <!-- Hero Section -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block">Create and Share</span>
                    <span class="block text-indigo-600">Interactive Quizzes</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Create engaging quizzes, share knowledge, and track progress. Perfect for educators, trainers, and
                    curious minds.
                </p>
                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                    <div class="rounded-md shadow">
                        <a href="/register"
                           class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:px-10">
                            Create Your First Quiz
                        </a>
                    </div>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                        <a href="#how-it-works"
                           class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:px-10">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Key Features
                </h2>
                <p class="mt-4 text-lg text-gray-500">
                    Everything you need to create and manage your quizzes
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow">
                        <div class="p-3 rounded-full bg-indigo-100">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Easy Creation</h3>
                        <p class="mt-2 text-base text-gray-500 text-center">
                            Create quizzes quickly with our intuitive interface
                        </p>
                    </div>

                    <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow">
                        <div class="p-3 rounded-full bg-indigo-100">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Flexible Timing</h3>
                        <p class="mt-2 text-base text-gray-500 text-center">
                            Set time limits and deadlines for your quizzes
                        </p>
                    </div>

                    <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow">
                        <div class="p-3 rounded-full bg-indigo-100">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Instant Results</h3>
                        <p class="mt-2 text-base text-gray-500 text-center">
                            Get immediate feedback and scoring
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div id="how-it-works" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    How It Works
                </h2>
                <p class="mt-4 text-lg text-gray-500">
                    Start creating your quiz in three simple steps
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white">
                            1
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Create Your Quiz</p>
                        <p class="mt-2 ml-16 text-base text-gray-500">
                            Add questions, multiple choice options, and set a time limit
                        </p>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white">
                            2
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Share with Others</p>
                        <p class="mt-2 ml-16 text-base text-gray-500">
                            Distribute your quiz link to participants
                        </p>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white">
                            3
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Track Results</p>
                        <p class="mt-2 ml-16 text-base text-gray-500">
                            View scores and analyze performance
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-10 text-center">
                <a href="/register"
                   class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Start Creating Now
                </a>
            </div>
        </div>
    </div>
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">QuizMaster</h3>
                    <p class="text-gray-400">Making learning fun and interactive through engaging quizzes.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="/about" class="text-gray-400 hover:text-white">About</a></li>
                        <li><a href="/login" class="text-gray-400 hover:text-white">Login</a></li>
                        <li><a href="/register" class="text-gray-400 hover:text-white">Register</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 QuizMaster. All rights reserved.</p>
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
</main>
<?php require '../resources/views/components/footer.php'; ?>
