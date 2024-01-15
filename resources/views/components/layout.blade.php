<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <a class="text-white text-lg font-bold" href="{{route('user.index')}}">Home</a>
            </div>
            <div class="flex items-center">
                @guest
                    <a href="{{route('user.login')}}" class="text-white">Login</a>
                @else
                    <div class="text-white mr-4">Hello, {{ (auth()->user()->role->id == 1 ? "admin " : "").auth()->user()->name }}</div>
                    <form action="{{route('user.logout')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white">Logout</button>
                    </form>
                @endguest
            </div>
            <div>
                <form method="GET" action="{{ auth()->user()->role->id == 1 ? route('user.create') : route('quiz.create') }}">
                    @csrf
                    <button type="submit" class="bg-white text-blue-500 px-4 py-2 rounded-md shadow-md hover:bg-blue-100 transition duration-300">Add</button>
                </form>
            </div>
        </div>
    </nav>
    <main>
        {{$slot}}
    </main>
</body>
</html>
