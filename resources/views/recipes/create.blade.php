<x-layout>
    <div class="flex flex-col items-center justify-center min-h-screen py-4">

        <form method="POST" action="/recipes" enctype="multipart/form-data"
            class="w-full flex items-center justify-center flex-col">

            @csrf
            <div class="bg-gray-300 w-5/6 rounded-t-lg text-center py-4">
                <h1 class="text-4xl font-bold">Add Recipe</h1>
                <p>Share your recipe to us!!</p>
            </div>
            <div class="md:flex gap-8 bg-gray-200 w-5/6 p-8 rounded-b-lg addform overflow-hidden">

                <div class="basis-1/2">

                    <div class="mb-6 flex flex-col items-center">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="py-2 rounded w-72" />

                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6 flex flex-col">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" value="{{ old('description') }}"
                            class="py-2 rounded"></textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <div class="mb-4">
                            <h1 class="font-bold">Separate each ingredients by numbers</h1>
                            <p>Example:</p>
                            <p>
                                1. ingredient 1 <br>
                                2. ingredient 2
                            </p>
                        </div>
                        <div>
                            <h1 class="font-bold">Separate each instructions by numbers</h1>
                            <p>Example:</p>
                            <p>
                                1. instruction 1 <br>
                                2. instruction 2 <br>
                                3. instruction 3 <br>
                                - instruction 3.1 <br>
                                4. tip <br>
                                - subtip <br>
                            </p>
                        </div>

                    </div>

                </div>



                <div class="basis-1/2">

                    <div class="flex justify-between p-2">

                        <div class="mb-6 flex flex-col items-center">
                            <label for="serving">Serving</label>
                            <input type="text" name="serving" class="py-2 rounded text-center"
                                value="{{ old('serving') }}" />
                            @error('serving')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6 flex flex-col items-center">
                            <label for="category">Meal Category</label>
                            <select name="category" id="category" class="py-2 rounded text-center md:w-60">
                                <option value="breakfast">Breakfast</option>
                                <option value="lunch">Lunch</option>
                                <option value="dinner">Dinner</option>
                                <option value="snacks">Snacks</option>
                                <option value="dessert">Dessert</option>
                            </select>
                            @error('category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>


                    <div class="mb-6 flex flex-col">
                        <label for="ingredients">Ingredients </label>
                        <textarea name="ingredients" id="ingredients" cols="30" rows="10" value="{{ old('ingredients') }}"
                            class="py-2 rounded px-2"></textarea>
                        @error('ingredients')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6 flex flex-col">
                        <label for="instructions">Instructions</label>
                        <textarea name="instructions" id="instructions" cols="30" rows="10" value="{{ old('instructions') }}"
                            class="py-2 rounded px-2"></textarea>
                        @error('instructions')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6 flex flex-col">
                        <label for="photo">Recipe Photo</label>
                        <input type="file" name="photo" id="photo" />
                        @error('photo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-green-700 py-2 px-6 font-bold text-white rounded cursor-pointer hover:bg-green-900 ease-in-out duration-500">Add
                        Recipe</button>
                </div>


            </div>



            {{-- <input type="submit" value="Add Recipe"
                class="bg-green-700 py-2 px-6 font-bold text-white rounded cursor-pointer hover:bg-green-900 ease-in-out duration-500" /> --}}


        </form>
    </div>
</x-layout>
