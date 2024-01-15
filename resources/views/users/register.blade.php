<x-layout>
<div class="bg-gray-100">

    <div class="container mx-auto mt-5">
        <h1 class="text-center text-4xl font-bold mb-8">Register</h1>

        <div class="flex justify-center">
            <div class="w-full md:w-1/3 bg-white shadow-md rounded px-8 py-6">
                <form action="{{ route('user.store')}}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                        <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" id="password" name="password">
                        @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
                        <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" name="password_confirmation">
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                        <select id="role" name="role_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  onchange="toggleFields()">
                            @foreach ($roles as $role)
                                @if ($role->id != 1)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('role_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4" id = "departementField">
                        <label for="departement" class="block text-gray-700 text-sm font-bold mb-2">Departement:</label>
                        <select id="departement" name="departement_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="{{null}}"></option>
                            @foreach ($departements as $departement)
                                <option value="{{$departement->id}}">{{$departement->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        
                    <div class="mb-4" id ="filiereField">
                        <label for="Filiere" class="block text-gray-700 text-sm font-bold mb-2">Filiere:</label>
                        <select id="Filiere" name="filiere_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="{{null}}"></option>
                            @foreach ($filieres as $filiere)
                                <option value="{{$filiere->id}}">{{$filiere->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        @error('error')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline w-full md:w-auto">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleFields() {
            var role = document.getElementById('role').value;
            var departementField = document.getElementById('departementField');
            var filiereField = document.getElementById('filiereField');

            // Hide both fields initially
            departementField.style.display = 'none';
            filiereField.style.display = 'none';

            if (role === "3") {
                // Show filiere field for students
                filiereField.style.display = 'block';
            } else if (role === "2") {
                // Show departement field for professors
                departementField.style.display = 'block';
            }
        }
        toggleFields();
    </script>
</div>
</x-layout>
