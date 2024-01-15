<x-std-layout>
    <div class="bg-gray-100">
        <div class="container mx-auto mt-5">
            <h1 class="text-center text-4xl font-bold mb-8">Questions List</h1>
            <div class="flex justify-center">
                <div class="w-full md:w-1/3 bg-white shadow-md rounded px-8 py-6">
                    <form id="quiz-form" method="post" action="{{ route('quiz.submit') }}">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $questions[0]->quiz_id }}">
                        <input type="hidden" id="grade" name="grade" value="0">
                        <p id="question-description"></p>
                        <ul id="question-options">
                        </ul>
                        <div class="text-center">
                            <button type="button" onclick="calculateGrade()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full md:w-auto">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let currentQuestionIndex = 0;
        let grade = 0;
        data = @json($questions);
        console.log(data);

        function displayQuestion() {
            let question = data[currentQuestionIndex];
            let optionsHtml = '';
            question.options.forEach(option => {
                optionsHtml += `
                    <li class="flex items-center mb-2">
                        <input type="checkbox" name="selected_options[]" value="${option.id}" class="form-checkbox rounded text-blue-500">
                        <span class="ml-2">${option.option_text}</span>
                        ${option.is_correct ? '<span class="text-green-500 ml-2">[Correct]</span>' : ''}
                    </li>
                `;
            });

            document.getElementById('question-description').innerText = question.description;
            document.getElementById('question-options').innerHTML = optionsHtml;
        }

        function calculateGrade() {
            let selectedOptions = document.querySelectorAll(`input[name="selected_options[]"]:checked`);
            let question = data[currentQuestionIndex];
            let correctOptions = question.options.filter(option => option.is_correct).map(option => option.id);
                                
            let correct = true;
            selectedOptions.forEach(option => {
                if (!correctOptions.includes(parseInt(option.value))) {
                    correct = false;
                }
            });
        
            if (correct && selectedOptions.length === correctOptions.length) {
                grade++;
            }
        
            currentQuestionIndex++;
            if (currentQuestionIndex < data.length) {
                displayQuestion();
            } else {
                document.getElementById('grade').value = grade;
                document.getElementById('quiz-form').submit();
            }
        }

        displayQuestion();
    </script>
</x-std-layout>
