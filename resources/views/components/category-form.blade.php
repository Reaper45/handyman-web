<form class="w-full max-w-lg" method="POST" action="{{route('categories.store')}}">
    @csrf
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="mb-3">
            <label for="name" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Name</label>
            <input name="name" value="{{old('name')}}" class="w-full @error('name') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" required>
        </div>
        @error('name')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="description" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Description</label>
            <textarea name="description" value="{{old('description')}}" class="w-full @error('description') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text"></textarea>
        </div>
        @error('description')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
        
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Save
            </button>
        </span>
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button @click="open = false" type="reset" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Cancel
            </button>
        </span>
    </div>
</form>