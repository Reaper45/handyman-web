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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div>
                            <input aria-label="Email address" name="email" type="email" required name="email" value="{{ old('email') }}" class="@error('email') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-7" placeholder="Email address" />
                            @error('email')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="-mt-px">
                            <input aria-label="Password" name="password" type="password" required  value="{{ old('password') }}" class="@error('email') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-7" placeholder="Password" />
                            @error('password')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                        </div>

                        <div class="-mt-px">
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-7 rounded-b-md "/>
                        </div>

                        <div class="mb-6">
                           <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-dark hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                {{ __('Reset password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-main>
</div>
@endsection
