<?php require '../resources/views/components/header.php'; ?>
<script src=" /js/dashboard/getUserInfo.js"></script>


<div class="bg-gray-100">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <?php include '../resources/views/components/sidebar.php'; ?>

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
                        <span class="text-gray-700 font-medium" id="username">John Doe</span>
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
                    <form class="space-y-4" id="quizForm" onsubmit="updateQuiz()">
                        <!-- Quiz Details Section -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Quiz Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Quiz
                                        Title</label>
                                    <input type="text" id="title" name="title" placeholder="Quiz Title" value=""
                                           required
                                           class="w-full px-4 py-2 border rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" rows="3"
                                              placeholder="Description" required
                                              class="w-full px-4 py-2 border rounded-lg mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                </div>
                                <div>
                                    <label for="timeLimit" class="block text-sm font-medium text-gray-700">Time
                                        Limit (minutes)</label>
                                    <input type="number" id="timeLimit" name="timeLimit"
                                           placeholder="Time Limit" min="1" required
                                           class="px-4 py-2 border rounded-lg mt-1 block w-48 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Questions Section -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-xl font-semibold text-gray-800">Questions</h2>
                                <button type="button" id="addQuestionBtn"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Add Question
                                </button>
                            </div>

                            <!-- Question Template -->
                            <div id="questionsContainer" class="space-y-6">

                            </div>
                            <div id="error"></div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="px-6 py-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Update Quiz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
</div>
<script>
    let questionCounter;

    // Form validation
    document.getElementById('quizForm').addEventListener('submit', function (e) {
        const questions = document.querySelectorAll('[data-question-id]');
        let allValid = true;

        questions.forEach(question => {
            const radioButtons = question.querySelectorAll('input[type="radio"]');
            const isAnySelected = Array.from(radioButtons).some(radio => radio.checked);

            if (!isAnySelected) {
                allValid = false;
            }
        });

        if (!allValid) {
            e.preventDefault();
            alert('One correct option is required for each question');
        }
    });

    // Add new question
    document.getElementById('addQuestionBtn').addEventListener('click', function () {
        questionCounter++;
        const questionsContainer = document.getElementById('questionsContainer');
        const newQuestion = createQuestionElement(questionCounter);
        questionsContainer.appendChild(newQuestion);
    });

    // Event delegation for dynamically added elements
    document.addEventListener('click', function (e) {
        if (e.target.matches('.removeQuestionBtn')) {
            handleRemoveQuestion(e);
        } else if (e.target.matches('.addOptionBtn')) {
            handleAddOption(e);
        } else if (e.target.matches('.removeOptionBtn')) {
            handleRemoveOption(e);
        }
    });

    function createQuestionElement(questionNum) {
        console.log(questionNum, "Create ga keldi"); // 2
        const div = document.createElement('div');
        div.className = 'p-4 border border-gray-200 rounded-lg';
        div.dataset.questionId = questionNum;

        div.innerHTML = `
            <div>
                <h3>${questionNum+1}</h3>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Question Text</label>
                <input type="text" name="questions[${questionNum}][quiz]" required
                    class="w-full px-4 py-2 border rounded-lg mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="space-y-3" data-options-container>
                <div class="flex justify-between">
                    <p class="text-sm font-medium text-gray-700">Answer Options</p>
                    <button type="button" class="addOptionBtn px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                        Add Option
                    </button>
                </div>

                <div class="flex items-center gap-4">
                    <input type="radio" name="questions[${questionNum}][correct]" value="0" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                    <input type="text" name="questions[${questionNum}][options][]" placeholder="Option 1" required
                        class="w-full px-4 py-2 border rounded-lg block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <button type="button" class="removeOptionBtn px-2 py-1 text-red-600 hover:text-red-800">×</button>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="button" class="removeQuestionBtn text-red-600 hover:text-red-800 font-medium">
                    Remove Question
                </button>
            </div>
        `;

        return div;
    }

    function createOptionElement(questionNum, optionNum) {
        const div = document.createElement('div');
        div.className = 'flex items-center gap-4';
        div.innerHTML = `
               <input type="radio" name="questions[${questionCounter}][correct]" value="${optionNum - 1}" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
            <input type="text" name="questions[${questionCounter}][options][]" placeholder="Option ${optionNum}" required
                class="w-full px-4 py-2 border rounded-lg block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <button type="button" class="removeOptionBtn px-2 py-1 text-red-600 hover:text-red-800">×</button>
        `;
        return div;
    }

    function handleRemoveQuestion(e) {
        const question = e.target.closest('[data-question-id]');
        question.remove();
        updateQuestionIndexes();
    }

    function handleAddOption(e) {
        const optionsContainer = e.target.closest('[data-options-container]');
        const questionDiv = e.target.closest('[data-question-id]');
        const questionNum = questionDiv.dataset.questionId;
        const optionNum = optionsContainer.querySelectorAll('.flex.items-center').length + 1;

        if (optionNum <= 6) { // Maximum 6 options per question
            optionsContainer.appendChild(createOptionElement(questionNum, optionNum));
        } else {
            alert('Maximum 6 options allowed per question');
        }
    }

    function handleRemoveOption(e) {
        const optionsContainer = e.target.closest('[data-options-container]');
        const optionsCount = optionsContainer.querySelectorAll('.flex.items-center').length;

        if (optionsCount > 1) { // Maintain at least one option
            e.target.closest('.flex.items-center').remove();
        } else {
            alert('At least one option is required');
        }
    }

    function updateQuestionIndexes() {
        const questions = document.querySelectorAll('[data-question-id]');
        questions.forEach((question, index) => {
            const questionNum = index + 1;
            question.dataset.questionId = questionNum;

            const questionInput = question.querySelector('input[type="text"]');
            questionInput.name = `question[${questionNum}]`;

            const radioInputs = question.querySelectorAll('input[type="radio"]');
            radioInputs.forEach(radio => {
                radio.name = `question[${questionNum}][correct]`;
            });

            const optionInputs = question.querySelectorAll('input[name^="option"]');
            optionInputs.forEach(option => {
                option.name = `question[${questionNum}][]`;
            });
        });
    }


    let titleInput = document.getElementById('title'),
        descriptionInput = document.getElementById('description'),
        timeLimitInput = document.getElementById('timeLimit'),
        questionsContainer = document.getElementById('questionsContainer');

    async function setQuiz() {
        const {default: apiFetch} = await import('/js/utils/allFetch.js');
        await apiFetch(`/quizzes/${<?php echo $id; ?>}`, {method: 'GET'})
            .then((data) => {
                titleInput.value = data.title;
                descriptionInput.value = data.description;
                timeLimitInput.value = data.time_limit;
                questionsContainer.innerHTML = '';
                data.questions.forEach((question, index) => {
                    questionCounter = index;
                    questionsContainer.innerHTML += `
                            <div class="p-4 border border-gray-200 rounded-lg" data-question-id="1">
                                            <div>
                                                <h3>${index + 1}</h3>
                                            </div>
                                            <div class="mb-4">
                                                <label class="block text-sm font-medium text-gray-700">Question
                                                    Text</label>
                                                <input name="questions[${index}][quiz]" type="text" required value="${question.question_text}"
                                                       class="w-full px-4 py-2 border rounded-lg mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            </div>

                                            <div class="space-y-3" data-options-container>
                                                <div class="flex justify-between">
                                                    <p class="text-sm font-medium text-gray-700">Answer Options</p>
                                                    <button type="button"
                                                            class="addOptionBtn px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                                                        Add Option
                                                    </button>
                                                </div>
                                                   ${question.options.map((option, oIndex) => {
                        return `<div class="flex items-center gap-4">

                                                                <input type="radio" name="questions[${index}][correct]" value="${oIndex}" ${option.is_correct ? 'checked' : ''}
                                                                   class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                                            <input type="text" name="questions[${index}][options][]"
                                                                   placeholder="Option 1" value="${option.option_text}" required
                                                                   class="w-full px-4 py-2 border rounded-lg block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                            <button type="button"
                                                                    class="removeOptionBtn px-2 py-1 text-red-600 hover:text-red-800">
                                                                ×
                                                            </button>
                                                    </div>`;
                    })}

                                                </div>

                                            <div class="mt-4 flex justify-end">
                                                <button type="button"
                                                        class="removeQuestionBtn text-red-600 hover:text-red-800 font-medium">
                                                    Remove Question
                                                </button>
                                            </div>
                                        </div>
                        `
                })
            })
            .catch((error) => {
                // document.getElementById('error').innerHTML = '';
                // Object.keys(error.data.errors).forEach(err => {
                //     document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
                // })
            });
    }

    setQuiz();
</script>
<script>
    async function updateQuiz() {
        event.preventDefault()
        let form = document.getElementById("quizForm"),
            formData = new FormData(form);
        // Convert FormData to structured object
        const structuredData = {
            title: '',
            description: '',
            timeLimit: '',
            questions: []
        };

        // Temporary storage for options arrays
        const optionsMap = new Map();

        for (const [key, value] of formData.entries()) {
            if (key.includes('questions')) {
                // Handle nested question data
                const matches = key.match(/(?:\[(\d+)\])?(\w+)(?:\[(\w+)\])?/);
                if (matches) {
                    const [, questionIndex, field, isArray] = matches;

                    // Initialize question object if it doesn't exist
                    if (!structuredData.questions[questionIndex]) {
                        structuredData.questions[questionIndex] = {
                            quiz: '',
                            options: [],
                            correct: null
                        };
                    }

                    if (isArray) {
                        // Handle options array
                        structuredData.questions[questionIndex].options.push(value);
                    } else {
                        // Handle other question fields
                        structuredData.questions[questionIndex][field] = value;
                    }
                }
            } else {
                // Handle top-level fields
                structuredData[key] = value;
            }
        }

        console.log(structuredData)

        const {default: apiFetch} = await import('/js/utils/allFetch.js');
        await apiFetch(`/quizzes/${<?php echo $id; ?>}`, {
                method: 'PUT',
                body: JSON.stringify(structuredData),
                headers: {
                    'Content-Type': 'application/json'
                }
            }
        )
            .then((data) => {
                window.location.href = '/dashboard/quizzes';
            })
            .catch((error) => {
                document.getElementById('error').innerHTML = '';
                Object.keys(error.data.errors).forEach(err => {
                    document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
                })
            });
    }
</script>
<?php require '../resources/views/components/footer.php'; ?>
