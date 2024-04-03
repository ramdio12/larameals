<x-authscreen>

    <div class="flex items-center justify-center basis-1/2 bg-gray-300 h-screen">
        <form action="/user/register" method="POST" class="w-4/6 md:w-92 py-4 px-8">
            <a href="/" class="text-4xl font-bold flex">
                <span class="text-red-700">Lara</span><span class="text-blue-700">Meal</span>
                <img class="w-10" src="/img/restaurant.png" alt="logo">
            </a>
            <div class="py-4">
                <h1 class="text-2xl font-bold">Register</h1>
            </div>
            @csrf
            <div class="mb-6 flex flex-col">
                <label for="username">Username</label>
                <input type="text" name="name" class="py-2 rounded" value="{{ old('name') }}" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 flex flex-col">
                <label for="email">Email</label>
                <input type="email" name="email" class="py-2 rounded" value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 flex flex-col">
                <label for="password">Password</label>
                <input type="password" name="password" class="py-2 rounded" value="{{ old('password') }}" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 flex flex-col">
                <label for="confirm_password">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="py-2 rounded"
                    value="{{ old('password_confirmation') }}" />

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <input type="submit" value="Register"
                class="bg-green-700 hover:bg-green-500 py-2 w-full font-bold text-white rounded cursor-pointer" />

            <p class="mt-4">Have an account? please login<a href="/login" class="underline text-blue-500">
                    Here</a>
            </p>

        </form>
    </div>

</x-authscreen>
