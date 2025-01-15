<?php require '../resources/views/componets/header.php'; ?>
<script src=" js/dashboard/getUserInfo.js"></script>

<body class="bg-gray-100">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <?php require '../resources/views/componets/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1">
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

        <!-- Content -->
        <main class="p-6">
            <div class="min-h-screen bg-gray-100">
                <div class="container">
                    <!-- Header -->
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold text-gray-800">My Quizzes</h2>
                        <p class="mt-2 text-gray-600">Fill in the details below to create a new quiz</p>
                    </div>

                    <!-- Main Form -->
                    <form class="space-y-4" id="quizForm">
                        <!-- Quiz Details Section -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Quiz Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Quiz Title</label>
                                    <input type="text" id="title" name="title" placeholder="Quiz Title" required
                                           class="w-full px-4 py-2 border rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" rows="3" placeholder="Description" required
                                              class="w-full px-4 py-2 border rounded-lg mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                </div>
                                <div>
                                    <label for="timeLimit" class="block text-sm font-medium text-gray-700">Time Limit (minutes)</label>
                                    <input type="number" id="timeLimit" name="timeLimit" placeholder="Time Limit" min="1" required
                                           class="px-4 py-2 border rounded-lg mt-1 block w-48 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Questions Section -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-xl font-semibold text-gray-800">Questions</h2>
                                <button type="button" id="addQuestionBtn" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Add Question
                                </button>
                            </div>

                            <!-- Question Template -->
                            <div id="questionsContainer" class="space-y-6">
                                <div class="p-4 border border-gray-200 rounded-lg" data-question-id="1">
                                    <div>
                                        <h3>1</h3>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Question Text</label>
                                        <label>
                                            <input name="questions[0][quiz]" type="text" required
                                                   class="w-full px-4 py-2 border rounded-lg mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </label>
                                    </div>

                                    <div class="space-y-3" data-options-container>
                                        <div class="flex justify-between">
                                            <p class="text-sm font-medium text-gray-700">Answer Options</p>
                                            <button type="button" class="addOptionBtn px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                                                Add Option
                                            </button>
                                        </div>
                                        <!-- Option 1 -->
                                        <div class="flex items-center gap-4">
                                            <label>
                                                <input type="radio" name="questions[0][correct]" value="0" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                            </label>
                                            <label>
                                                <input type="text" name="questions[0][options][]" placeholder="Option 1" required
                                                       class="w-full px-4 py-2 border rounded-lg block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            </label>
                                            <button type="button" class="removeOptionBtn px-2 py-1 text-red-600 hover:text-red-800">×</button>
                                        </div>
                                        <!-- Option 2 -->
                                    </div>

                                    <div class="mt-4 flex justify-end">
                                        <button type="button" class="removeQuestionBtn text-red-600 hover:text-red-800 font-medium">
                                            Remove Question
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="px-6 py-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Create Quiz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
<?php require '../resources/views/componets/footer.php'; ?>
