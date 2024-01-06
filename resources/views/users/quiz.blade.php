<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions List</title>
    <!-- Include any necessary CSS styles or CDN links here -->
</head>
<body>
    <div class="container">
        <h2>Questions List</h2>

        @if(count($questions) > 0)
            <form method="post" action="{{ url('/quiz/check-answers') }}">
                @csrf
                <ul>
                    @foreach($questions as $question)
                        <li>
                            <strong>{{ $question->description }}</strong>
                            <ul>
                                @foreach($question->options as $option)
                                    <li>
                                        <label>
                                            <input type="checkbox" name="selected_options[]" value="{{ $option->id }}">
                                            {{ $option->option_text }}
                                            @if($option->is_correct)
                                                [Correct]
                                            @endif
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <button type="submit">Check Answers</button>
            </form>
        @else
            <p>No questions available.</p>
        @endif
    </div>
</body>
</html>
