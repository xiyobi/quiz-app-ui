<?php require '../resources/views/components/header.php'; ?>

<!--<script src="--><?php //echo assets('/js/dashboard/getUserInfo.js')?><!--"></script>-->
<script src="/js/dashboard/getUserInfo.js"></script>

<div class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="#"><h1 class="text-2xl font-bold text-indigo-600">Quiz App</h1></a>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="/dashboard" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                        <!--                            <a href="#how-it-works" class="text-gray-600 hover:text-gray-900">How It Works</a>-->
                        <!--                            <a href="/login" class="text-gray-600 hover:text-gray-900">Login</a>-->
                        <a href="/register"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            Create Quiz
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
            <a href="/dashboard" class="block my-2 text-xl text-gray-600 hover:text-gray-900">Dashboard</a>
            <!--                <a href="#how-it-works" class="block my-2 text-xl text-gray-600 hover:text-gray-900">How It Works</a>-->
            <!--                <a href="login.html" class="block my-2 text-xl text-gray-600 hover:text-gray-900">Login</a>-->
            <!--                <a href="add-quiz.php"-->
            <!--                   class="block my-2 text-xl inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">-->
            <!--                    Register-->
            <!--                </a>-->
        </div>
    </nav>

    <!-- Main Content -->
