<x-authscreen>

    <div class="flex items-center justify-center basis-1/2 bg-gray-300 h-screen">
        <form method="POST" action="/user/authenticate" class=" w-4/6 md:w-92 py-4 px-8 mt-12">
            <a href="/" class="text-4xl font-bold flex">
                <span class="text-red-700">Lara</span><span class="text-blue-700">Meal</span>
                <img class="w-10" src="/img/restaurant.png" alt="logo">
            </a>
            <div class="py-4">
                <h1 class="text-2xl font-bold">Login</h1>
            </div>

            @csrf
            <div class="mb-6 flex flex-col">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="py-3 rounded" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 flex flex-col">
                <label for="password">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="py-3 rounded" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <input type="submit" value="Login"
                class="bg-red-500 hover:bg-red-700 duration-500 ease-in-out py-2 w-full font-bold text-white rounded cursor-pointer" />

            <p class="mt-8">No account? please register <a href="/register" class="  underline text-blue-500">Here</a>
            </p>

        </form>
    </div>

</x-authscreen>
