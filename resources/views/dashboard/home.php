<?php require '../resources/views/componets/header.php'; ?>
<script src=" js/dashboard/getUserInfo.js"></script>
<body class="bg-gray-100">
<div class="min-h-screen flex">
    <!-- Sidebar -->
    <?php require '../resources/views/componets/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm">
            <div class="h-16 flex items-center justify-between px-4">
                <button class="md:hidden text-gray-600" onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex items-center space-x-4">

                    <div class="flex items-center space-x-2">
                        <img src="https://images.newscientist.com/wp-content/uploads/2024/05/07141222/SEI_203029555.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                        <span class="text-gray-700 font-medium" id="username"></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 p-4 md:p-6">
            <!-- Quick Actions -->
            <div class="mb-8">
                <div class="flex flex-wrap gap-4">
                    <a href="/create_quiz" class="flex-1 min-w-[200px] bg-blue-600 text-white p-4 rounded-lg shadow hover:bg-blue-700 transition">
                        <i class="fas fa-plus mb-2 text-2xl"></i>
                        <h3 class="font-semibold">Create New Quiz</h3>
                        <p class="text-sm opacity-90">Start creating a new quiz</p>
                    </a>
                    <a href="/statistic" class="flex-1 min-w-[200px] bg-green-600 text-white p-4 rounded-lg shadow hover:bg-green-700 transition">
                        <i class="fas fa-chart-line mb-2 text-2xl"></i>
                        <h3 class="font-semibold">View Statistics</h3>
                        <p class="text-sm opacity-90">Check your progress</p>
                    </a>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500">Total Quizzes</h3>
                        <i class="fas fa-book text-blue-500"></i>
                    </div>
                    <p class="text-2xl font-bold mt-2">24</p>
                    <p class="text-sm text-green-500 mt-2">+3 this week</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500">Completed</h3>
                        <i class="fas fa-check-circle text-green-500"></i>
                    </div>
                    <p class="text-2xl font-bold mt-2">18</p>
                    <p class="text-sm text-green-500 mt-2">75% completion rate</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500">Average Score</h3>
                        <i class="fas fa-star text-yellow-500"></i>
                    </div>
                    <p class="text-2xl font-bold mt-2">85%</p>
                    <p class="text-sm text-green-500 mt-2">+2% from last month</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500">Time Spent</h3>
                        <i class="fas fa-clock text-purple-500"></i>
                    </div>
                    <p class="text-2xl font-bold mt-2">12h</p>
                    <p class="text-sm text-green-500 mt-2">This week</p>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow p-4 mb-8">
                <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b">
                        <div class="bg-blue-100 p-2 rounded-lg">
                            <i class="fas fa-plus text-blue-500"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium">Created new quiz</h4>
                            <p class="text-sm text-gray-500">Mathematics Quiz - Advanced Level</p>
                        </div>
                        <span class="text-sm text-gray-500">2h ago</span>
                    </div>
                    <div class="flex items-center gap-4 pb-4 border-b">
                        <div class="bg-green-100 p-2 rounded-lg">
                            <i class="fas fa-check text-green-500"></i>
                        </div>
                        <div class="flex-1">
                            w<h4 class="font-medium">Completed quiz</h4>
                            <p class="text-sm text-gray-500">Science Quiz - Score: 92%</p>
                        </div>
                        <span class="text-sm text-gray-500">1d ago</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="bg-purple-100 p-2 rounded-lg">
                            <i class="fas fa-trophy text-purple-500"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium">Achievement unlocked</h4>
                            <p class="text-sm text-gray-500">Perfect Score Streak - 3 quizzes</p>
                        </div>
                        <span class="text-sm text-gray-500">2d ago</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php require '../resources/views/componets/footer.php'; ?>
