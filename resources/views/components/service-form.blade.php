
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger -->
    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Short description</label>
        <input name="title" value="{{old('title')}}" class="w-full @error('title') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text">
        @error('title')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>        
        @enderror
    </div>

    <div class="mb-6">
        <label for="amount" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Pricing in KES</label>
        <input name="amount" value="{{old('amount')}}" class="w-full @error('amount') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text">
        @error('amount')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>        
        @enderror
    </div>
