@extends('layouts.app')

@section('content')
<div class="login min-h-screen">
    <x-main >
        <div class=" flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-full">
            <div class="max-w-sm w-full">
                <div class="mb-12">
                    <img class="mx-auto h-12 w-auto" src="{{ asset('img/logo.png') }}" alt="Workflow" />
                </div>
                <div>
                    @if (session('status'))
                       <div class="flex mb-3 items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div>
                            <input aria-label="Email address" name="email" type="email" required name="email" value="{{ old('email') }}" class="@error('email') border-red-500 @enderror appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-7" placeholder="Email address" />
                            @error('email')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="mt-10">
                            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-dark hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                {{ __('Get Link') }}

                            </button>
                        </div>
                    </form>
                </div>
        </div>
    </x-main>
</div>
@endsection
