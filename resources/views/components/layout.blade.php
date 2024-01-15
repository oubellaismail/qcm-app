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
                <a href="" class="text-white">Users</a>
                <a href="{{route('departement.index')}}" class="text-white ml-4">Departments</a>
                <a href="{{route('filiere.index')}}" class="text-white ml-4">Filieres</a>
            </div>
        </div>
    </nav>
    <main class="container mx-auto py-8">
        {{-- <div class="flex justify-end mb-4">
            <form method="GET" action="{{route('user.create')}}">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-300">Add</button>
            </form>
        </div> --}}
        {{$slot}}
    </main>
</body>
</html>
