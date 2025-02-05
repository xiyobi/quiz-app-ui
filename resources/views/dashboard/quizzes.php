<?php components('dashboard/header'); ?>
    <script src="<?php echo assets('/js/dashboard/getUserInfo.js')?>"></script>
    <div class="bg-gray-100">
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <?php components('dashboard/sidebar'); ?>
            <!-- Main Content -->
            <div class="flex-1">
                <!-- Top Navigation -->
                <header class="bg-white shadow-sm">
                    <div class="h-16 flex items-center justify-between px-4">
                        <button class="md:hidden text-gray-600"
                                onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <div class="flex items-center space-x-4">

                            <div class="flex items-center space-x-2">
                                <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
                                <span class="text-gray-700 font-medium" id="userName"></span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Content -->
                <main class="p-6">
                    <!-- Header Section -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">My Quizzes</h2>
                        <div class="flex space-x-4">
                            <a href="/dashboard/create-quiz" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                                Create New Quiz
                            </a>
                            <div class="flex border rounded-lg">
                                <button class="px-3 py-2 bg-white border-r">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 4h10v2H5V4zm0 5h10v2H5V9zm0 5h10v2H5v-2z"></path>
                                    </svg>
                                </button>
                                <button class="px-3 py-2 bg-gray-100">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 5h2v2H5V5zm0 4h2v2H5V9zm0 4h2v2H5v-2zm4-8h6v2H9V5zm0 4h6v2H9V9zm0 4h6v2H9v-2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Search and Filter Section -->
                    <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
                        <div class="flex flex-wrap gap-4">
                            <div class="flex-1">
                                <input type="text" placeholder="Search quizzes..."
                                       class="w-full px-4 py-2 border rounded-lg">
                            </div>
                            <select class="px-4 py-2 border rounded-lg">
                                <option>Sort by</option>
                                <option>Date Created</option>
                                <option>Completion Rate</option>
                                <option>Title</option>
                            </select>
                        </div>
                    </div>

                    <!-- Quiz Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="quizList">

                    </div>
                </main>
            </div>
        </div>
    </div>
    <script>
        async function quizzes() {
            const { default: apiFetch } = await import('<?php echo assets('/js/utils/apiFetch.js')?>'),
                quizList = document.getElementById('quizList');
            await apiFetch('/quizzes',{method:'GET'})
                .then((data) => {
                    console.log(data.quizzes);
                    data.quizzes.forEach((quiz) => {
                        quizList.innerHTML += `
                            <div class="bg-white rounded-lg shadow-sm p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-lg font-semibold">${quiz.title}</h3>
                                        <p class="text-gray-500 text-sm">Mathematics</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="p-2 hover:bg-gray-100 rounded-full">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-4">${quiz.description}</p>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-sm text-gray-500">10 Questions</span>
                                    <span class="text-sm text-gray-500">${quiz.time_limit} minutes</span>
                                </div>
                                <div class="mb-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-500 h-2 rounded-full" style="width: 75%"></div>
                                    </div>
                                    <span class="text-sm text-gray-500">75% Completion Rate</span>
                                </div>
                                <div class="flex justify-between">
                                    <a href="/dashboard/quizzes/${quiz.id}/update" class="text-indigo-600 hover:text-indigo-800">Edit</a>
                                    <button class="text-green-600 hover:text-green-800" onclick="copyContent('${quiz.unique_value}')">Share</button>
                                    <button class="text-red-600 hover:text-red-800" onclick="deleteQuiz(${quiz.id})">Delete</button>
                                </div>
                            </div>
                        `
                    });
                })
                .catch((error) => {
                    alert("Internetingga qarasangang bo'lmaydimi? :)");
                });
        }
        quizzes();
        async function deleteQuiz(id) {
            if (confirm("Are you sure?")){
                const { default: apiFetch } = await import('<?php echo assets('/js/utils/apiFetch.js')?>');
                await apiFetch(`/quizzes/${id}`,{method:'DELETE'})
                    .then((data) => {
                        window.location.reload();
                    })
                    .catch((error) => {
                        alert("Internetingga qarasangang bo'lmaydimi? :)");
                    });
            }
        }
        const copyContent = async (uniqueValue) => {
            try {
                uniqueValue = '<?php echo $_ENV['APP_URL']?>' + '/take-quiz/' + uniqueValue;
                await navigator.clipboard.writeText(uniqueValue);
                alert('Content copied to clipboard');
            } catch (err) {
                console.error('Failed to copy: ', err);
            }
        }
    </script>
<?php components('dashboard/footer'); ?>