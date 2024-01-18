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

@php
    $role_id = auth()->user()->role_id
@endphp

<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <a class="text-white text-lg font-bold" href="{{$role_id == 1 ? route('user.index') : ($role_id == 2 ? route('quiz.index'): route('student.index'))}}">Home</a>
            </div>
            <div class="flex items-center">
                @if ($role_id == 1)
                    <a href="{{route('user.index')}}" class="text-white">Users</a>
                    <a href="{{route('departement.index')}}" class="text-white ml-4">Departments</a>
                    <a href="{{route('filiere.index')}}" class="text-white ml-4">Filieres</a>
                @else
                    @if ($role_id == 2)
                        <a href="{{route('filiere.profIndex')}}" class="text-white mr-4">Filieres  </a>
                        <a href="{{route('grade.index')}}" class="text-white mr-4">Grades  </a>
                    @endif
                @endif
            </div>
            <div class="flex items-center">
                <div class="text-white mr-4">Hello,{{$role_id == 1 ? 'Admin' : ($role_id == 2 ? 'Professor': 'Student')}} {{ auth()->user()->name }}</div>
                <form action="{{route('user.logout')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="container mx-auto py-8">
        {{$slot}}
    </main>
</body>
</html>
