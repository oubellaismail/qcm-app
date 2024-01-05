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
                <form method="GET" action="{{ route('user.create') }}">
                    @csrf
                    <button type="submit" class="bg-white text-blue-500 px-4 py-2 rounded-md shadow-md hover:bg-blue-100 transition duration-300">Add</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">User List</h1>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-100">Name</th>
                    <th class="px-6 py-3 bg-gray-100">Email</th>
                    <th class="px-6 py-3 bg-gray-100">Role</th>
                    <th class="px-6 py-3 bg-gray-100">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100 transition-colors">
                        <td class="px-6 py-4 text-center">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-center">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $user->role->name }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="text-blue-500 hover:underline">
                                <i class='fas fa-edit'></i>
                                Update
                            </a>
                            <form method="POST" action="{{ route('user.destroy', $user->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2 hover:underline">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
