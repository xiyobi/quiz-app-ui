document.addEventListener('DOMContentLoaded', function() {
    let questionCounter = 0;

    // Form validation
    document.getElementById('quizForm').addEventListener('submit', function(e) {
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
    document.getElementById('addQuestionBtn').addEventListener('click', function() {
        questionCounter++;
        const questionsContainer = document.getElementById('questionsContainer');
        const newQuestion = createQuestionElement(questionCounter);
        questionsContainer.appendChild(newQuestion);
    });

    // Event delegation for dynamically added elements
    document.addEventListener('click', function(e) {
        if (e.target.matches('.removeQuestionBtn')) {
            handleRemoveQuestion(e);
        } else if (e.target.matches('.addOptionBtn')) {
            handleAddOption(e);
        } else if (e.target.matches('.removeOptionBtn')) {
            handleRemoveOption(e);
        }
    });

    function createQuestionElement(questionNum) {
        const div = document.createElement('div');
        div.className = 'p-4 border border-gray-200 rounded-lg';
        div.dataset.questionId = questionNum;

        div.innerHTML = `
            <div>
                <h3>${questionNum}</h3>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Question Text</label>
                <input type="text" name="questions[${questionCounter}][quiz]" required
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
                    <input type="radio" name="questions[${questionCounter}][correct]" value="0" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                    <input type="text" name="questions[${questionCounter}][options][]" placeholder="Option 1" required
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
        console.log(optionsContainer);
        console.log(optionsContainer.querySelectorAll('.flex.items-center'));

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
});