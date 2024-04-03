<x-layout>

    <div class="flex items-center justify-center w-100 flex-col">


        <div class="flex items-center justify-center">
            <form action="/user/update" method="POST" class="bg-gray-200 w-100 md:w-92 p-8 my-10 rounded"
                enctype="multipart/form-data">
                <div class="py-4 mx-auto text-center">
                    <h1 class="text-2xl font-bold">Update</h1>
                    <p class="text-xl font-semibold">Update your credentials</p>
                </div>
                @csrf
                @method('PUT')
                <div class="mb-6 flex flex-col">
                    <label for="username">Username</label>
                    <input type="text" name="name" class="py-2 rounded" value="{{ $user->name }}" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6 flex flex-col">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="py-2 rounded" value="{{ $user->email }}" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <div class="mb-6 flex flex-col">
                    <label for="introduction">Introduction</label>
                    <input type="introduction" name="introduction" class="py-2 rounded"
                        value="{{ $user->introduction ? $user->introduction : "I'm a potential expert cook" }}" />
                    @error('introduction')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- <div class="mb-6 flex flex-col">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" class="py-2 rounded" />

                    @error('current_password')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6 flex flex-col">
                    <label for="password">New password</label>
                    <input type="password" name="password" class="py-2 rounded" />

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6 flex flex-col">
                    <label for="confirm_password">New Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="py-2 rounded" />

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div> --}}


                <div class="mb-6 flex flex-col">
                    <label for="photo">Profile Photo</label>
                    <input type="file" name="photo" id="photo" />
                    <img class="w-48 mr-6 my-6"
                        src={{ $user->photo ? asset('storage/' . $user->photo) : asset('/img/default.png') }}
                        alt="" />

                    @error('photo')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input type="submit" value="Update"
                    class="bg-blue-500 hover:bg-blue-700 py-1 px-4 font-bold text-white rounded cursor-pointer" />
                <a href="/user/profile"
                    class="bg-red-500 hover:bg-red-700 py-1 px-4 font-bold text-white rounded cursor-pointer">Back</a>
                </p>

            </form>
        </div>
    </div>


</x-layout>
