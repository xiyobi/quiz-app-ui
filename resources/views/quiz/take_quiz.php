<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Quiz - Quiz Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
<!-- Navigation -->
<<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <div>
                    <a href="/index" class="flex items-center py-4 px-2">
                        <span class="font-semibold text-gray-500 text-lg">Quiz Platform</span>
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
<main class="flex-grow container mx-auto px-4 py-8">
    <div id="start-card" class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4" id="title">Quiz Title</h2>
            <p class="text-xl text-gray-700 mb-6" id="description">Lorem ipsum dolor sit amet, consectetur
                adipisicing elit.
                Accusamus delectus dolorum eligendi esse excepturi in quam qui veritatis voluptatibus?
                Dolore.</p>

            <div class="flex justify-center space-x-12 mb-8">
                <div class="text-center">
                    <!--                            <p class="text-3xl font-bold text-blue-600" id="final-score">0/10</p>-->
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-blue-600" id="time-taken">5:00</p>
                    <p class="text-gray-600">Time Limit</p>
                </div>
            </div>

            <button id="start-btn"
                    class="inline-block px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Start Quiz
            </button>
        </div>
    </div>
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6 hidden" id="questionContainer">
        <!-- Quiz Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800" id="quizTitle">JavaScript Fundamentals Quiz</h1>
                <p class="text-gray-600 mt-2" id="quizDescription">Test your knowledge of JavaScript basics</p>
            </div>
            <div class="text-right">
                <div class="text-xl font-bold text-blue-600" id="timer">Starting...</div>
                <div class="text-sm text-gray-500">Time Remaining</div>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="mb-6">
            <div class="flex justify-between mb-2">
                        <span class="text-sm text-gray-600">Question <span id="current-question">1</span> of <span
                                    id="total-questions">10</span></span>
                <span class="text-sm text-gray-600">Progress: <span id="progress">10%</span></span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div id="CurrentProgress" class="bg-blue-600 h-2.5 rounded-full" style="width: 10%"></div>
            </div>
        </div>

        <!-- Question Container -->
        <div class="mb-8">
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-800" id="question">Question loading...</h2>
            </div>

            <!-- Options -->
            <div class="space-y-3">
                <form id="options">
                    <h1>Options loading...</h1>
                </form>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between items-center">
            <button id="prev-btn"
                    class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 disabled:opacity-50">
                Previous
            </button>
            <button id="next-btn" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Next
            </button>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 text-center">
            <button id="submit-quiz" class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">
                Submit Quiz
            </button>
        </div>
    </div>
    <div id="results-card" class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6 hidden">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Quiz Complete!</h2>
            <h3 class="text-xl text-gray-700 mb-6">JavaScript Fundamentals Quiz</h3>

            <div class="flex justify-center space-x-12 mb-8">
                <div class="text-center">
                    <p class="text-3xl font-bold text-blue-600" id="final-score">0/10</p>
                    <p class="text-gray-600">Final Score</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-blue-600" id="time-taken">0:00</p>
                    <p class="text-gray-600">Time Taken</p>
                </div>
            </div>

            <a href="/dashboard"
               class="inline-block px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Return to Dashboard
            </a>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-white shadow-lg mt-8">
    <div class="max-w-6xl mx-auto px-4 py-4">
        <div class="text-center text-gray-500 text-sm">
            © 2024 Quiz Platform. All rights reserved.
        </div>
    </div>
</footer>

<!-- Quiz JavaScript -->
<script>
    let questions;
    let quizData;
    async function getQuizItems() {
        const {default: apiFetch} = await import('/js/utils/allFetch.js');
        try {
            const data = await apiFetch(`/quizzes/<?php echo $uniqueValue; ?>/getByUniqueValue`, {
                method: 'GET'
            });
            document.getElementById('title').innerText = data.title;
            document.getElementById('description').innerText = data.description;
            document.getElementById('time-taken').innerText = data.time_limit + ":00";
            quizData = data;
            return data.questions; // Assuming the API returns questions in the data
        } catch (error) {
            document.getElementById('error').innerHTML = '';
            Object.keys(error.data.errors).forEach(err => {
                document.getElementById('error').innerHTML += `<p class="text-red-500">${error.data.errors[err]}</p>`;
            });
            throw error;
        }
    }

    async function quiz() {
        questions = [];
        let currentQuestionIndex = 0;

        // Initialize quiz data
        try {
            questions = await getQuizItems();
            // Initialize first question if available
            if (questions && questions.length > 0) {
                displayQuestion(questions[0]);
            }
        } catch (error) {
            console.error('Failed to load quiz:', error);
            return;
        }

        function displayQuestion(question) {
            if (!question) return;

            const questionElement = document.getElementById('question');
            const options = document.getElementById('options');

            questionElement.textContent = question.question_text;
            document.getElementById('quizTitle').innerText = quizData.title;
            document.getElementById('quizDescription').innerText = quizData.description;
            options.innerHTML = '';

            question.options.forEach((option) => {
                questionElement.innerText = question.question_text;
                options.innerHTML += `
                <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="answer" class="h-4 w-4 text-blue-600" value="${option.id}">
                    <span class="ml-3">${option.option_text}</span>
                </label>`;
            });

            // Update progress
            document.getElementById('current-question').textContent = currentQuestionIndex + 1;
            document.getElementById('total-questions').textContent = questions.length;
            const progress = ((currentQuestionIndex + 1) / questions.length) * 100;
            document.getElementById('progress').textContent = `${Math.round(progress)}%`;
            document.getElementById('CurrentProgress').style.width = `${Math.round(progress)}%`;
        }

        let startBtn = document.getElementById('start-btn');
        startBtn.addEventListener('click', () => {
            // send request to an API
            async function startQuiz() {
                console.log(quizData)
                const {default: apiFetch} = await import('/js/utils/allFetch.js');
                await apiFetch('/results', {method: 'POST', body: JSON.stringify({quiz_id: quizData.id})})
                    .then((data) => {
                        console.log(data)
                    })
                    .catch((error) => {
                        document.getElementById('error').innerHTML = '';
                        Object.keys(error.data.errors).forEach(err => {
                            document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
                        })
                    });
            }
            startQuiz();
            let startQuizContainer = document.getElementById('start-card');
            startQuizContainer.classList.add('hidden');
            document.getElementById('questionContainer').classList.remove('hidden');
            startTimer(quizData.time_limit*60, document.getElementById('timer')); // 20 minutes
        });

        function startTimer(duration, display) {
            let timer = duration;
            return setInterval(() => {
                const minutes = Math.floor(timer / 60);
                const seconds = timer % 60;
                display.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                if (--timer < 0) {
                    timer = 0;
                    // Handle timer completion
                    document.getElementById('submit-quiz').click();
                }
            }, 1000);
        }

        // Add event listeners for navigation buttons
        document.getElementById('next-btn').addEventListener('click', () => {
            if (currentQuestionIndex < questions.length - 1) {
                currentQuestionIndex++;
                displayQuestion(questions[currentQuestionIndex]);
            } else {
                alert('No more questions');
            }
        });

        document.getElementById('prev-btn').addEventListener('click', () => {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                displayQuestion(questions[currentQuestionIndex]);
            } else {
                alert('No previous question');
            }
        });

        document.getElementById('submit-quiz').addEventListener('click', () => {
            let form = document.getElementById('options');
            let formData = new FormData(form);
            if (!formData.get('answer')) {
                alert('Please select an answer');
                return;
            }
            if (currentQuestionIndex >= 2) {
                currentQuestionIndex--;
            }
            questions.splice(currentQuestionIndex, 1);
            let question = questions[currentQuestionIndex],
                questionContainer = document.getElementById('questionContainer');
            if (question) {
                displayQuestion(question);
            } else {
                // display result
                questionContainer.innerHTML = '';
                document.getElementById('results-card').classList.remove('hidden');
            }
        });
    }

    quiz();
</script>
<script>
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>