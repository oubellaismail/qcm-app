<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
    <!-- Include any necessary CSS styles or CDN links here -->
</head>
<body>
    <div class="container">
        <h2>Add Question</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{ url('/quiz/store') }}">
            @csrf

            <div class="form-group">
                <label for="question_text">Question:</label>
                <textarea class="form-control" name="question_text" required></textarea>
            </div>

            <div class="form-group">
                <label for="options">Options:</label>
                @for($i = 0; $i < 4; $i++)
                    <input type="text" class="form-control" name="options[]" placeholder="Option {{ $i + 1 }}" required>
                @endfor
            </div>

            <div class="form-group">
                <label for="correct_option">Correct Option:</label>
                <select class="form-control" name="correct_option" required>
                    @for($i = 0; $i < 4; $i++)
                        <option value="{{ $i }}">Option {{ $i + 1 }}</option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Question</button>
        </form>
    </div>
    <!-- Include any necessary JavaScript scripts or CDN links here -->
</body>
</html>
