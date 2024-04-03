<x-layout>

    <div class="flex flex-col items-center justify-center min-h-screen py-4">

        <div class="text-white mx-auto mb-8 text-center">
            <h1 class="text-4xl font-bold">Update {{ $recipe->title }}</h1>

        </div>

        <form method="POST" action="/recipes/{{ $recipe->id }}" enctype="multipart/form-data"
            class="bg-gray-200 w-1/2 p-8 rounded addform">

            @csrf
            @method('PUT')

            <div class="mb-6 flex flex-col items-center">

                <label for="title" class="font-bold">Name</label>
                <input type="text" name="title" class="py-2 rounded w-72" value="{{ $recipe->title }}" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="mb-6 flex flex-col">

                <label for="description" class="font-bold">Description</label>
                <textarea name="description" id="description" cols="30" rows="5" class="py-2 rounded">
            {{ $recipe->description }}
            </textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="mb-6 flex flex-col items-center">

                <label for="serving" class="font-bold">Serving</label>
                <input type="text" name="serving" class="py-2 rounded text-center" value="{{ $recipe->serving }}" />
                @error('serving')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="mb-6 flex flex-col items-center">

                <label for="category" class="font-bold">Category</label>
                <select name="category" id="category">
                    <option value="breakfast" @selected($recipe->category == 'breakfast')>Breakfast</option>
                    <option value="lunch" @selected($recipe->category == 'lunch')>Lunch</option>
                    <option value="dinner" @selected($recipe->category == 'dinner')>Dinner</option>
                    <option value="snacks" @selected($recipe->category == 'snacks')>Snacks</option>
                    <option value="dessert" @selected($recipe->category == 'dessert')>Dessert</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6 flex flex-col">

                <label for="ingredients" class="font-bold">Ingredients</label>
                <textarea name="ingredients" id="ingredients" cols="30" rows="10" class="py-2 rounded">
              {{ $recipe->ingredients }} 
            </textarea>
                @error('ingredients')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6 flex flex-col">

                <label for="instruction" class="font-bold">Instructions</label>
                <textarea name="instructions" id="instruction" cols="30" rows="10" class="py-2 rounded">
              {{ $recipe->instructions }} 
            </textarea>
                @error('instructions')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6 flex flex-col">

                <label for="photo" class="font-bold">Recipe Photo</label>
                <input type="file" name="photo" id="photo" />

                <img class="w-80 mr-6 my-6 border-2 border-black rounded"
                    src={{ $recipe->photo ? asset('storage/' . $recipe->photo) : asset('/img/default.png') }}
                    alt="" />

                @error('photo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <button type="submit"
                class="bg-blue-700 py-2 px-6 font-bold text-white rounded cursor-pointer hover:bg-green-900 ease-in-out duration-500">Update
                Recipe</button>

            <a href="/recipes/manage"
                class="bg-blue-700 py-2 px-6 font-bold text-white rounded cursor-pointer hover:bg-green-900 ease-in-out duration-500">Back</a>
            {{-- <input type="submit" value="Update Recipe"
                class="bg-blue-700 py-2 px-6 font-bold text-white rounded cursor-pointer hover:bg-green-900 ease-in-out duration-500" /> --}}
        </form>
    </div>
</x-layout>
