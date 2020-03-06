@extends('layouts.app')

@section('content')
<div class="login min-h-screen">
    <x-main >
        <div class=" flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-full">
            <div class="max-w-sm w-full">
                <div class="mb-12">
                    <img class="mx-auto h-12 w-auto" src="{{ asset('img/logo.png') }}" alt="Workflow" />
                </div>
                <form class="mt-8" method="POST" action="{{ route('login') }}" autoFill="off">
                    @csrf
                <input type="hidden" name="remember" value="true" />
                <div class="rounded-md shadow-sm">
                    <div>
                        <input aria-label="Email address" name="email" type="email" required name="email" value="{{ old('email') }}" class="@error('email') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-7" placeholder="Email address" />
                    </div>
                    <div class="-mt-px relative">
                        <input aria-label="Password" name="password" type="password" required  value="{{ old('password') }}" class="@error('email') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-7" placeholder="Password" />
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot absolute text-xs font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none underline transition ease-in-out duration-150">
                                {{ __('Forgot?') }}
                            </a>
                        @endif
                    </div>
                     @error('email')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                    @error('password')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6 flex items-center justify-between ">
                    <div class="flex items-center">
                    <input id="remember" {{ old('remember') ? 'checked' : '' }} name="remember" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                    <label for="remember" class="ml-2 block text-sm leading-5 text-indigo-100">
                        Remember me
                    </label>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-dark hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y pl-3">
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ __('Login') }}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </x-main>
</div>
@endsection
