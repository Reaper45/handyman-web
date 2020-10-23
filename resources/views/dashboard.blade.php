@extends('layouts.app')

@section('content')
<x-header >
    <x-slot name="title">
        Dashboard
    </x-slot>
</x-header>
<x-main>
     @if (session('status'))
        <div class="flex mb-3 items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ session('status') }}</p>
        </div>
    @endif
    <div class="flex justify-between px-4 sm:px-0 lg:px-0"">
        <div><b class="font-sm tracking-wider text-gray-900">Overview</b></div>
    </div>
    <section class="py-5 px-4 sm:px-0 lg:px-0">
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
            <x-stat-component
                title="Active handymen"
                icon="icon-user-check.svg"
                to="/handymen"
                :value="$stats['handymen']"
            />
            <x-stat-component
                title="Total clients"
                icon="icon-group.svg"
                to="/clients"
                :value="$stats['clients']"
            />
            <x-stat-component
                title="Jobs complete"
                icon="icon-thumb-up.svg"
                to="/jobs"
                :value="$stats['complete']"
            />
            <x-stat-component
                title="Ongoing jobs"
                icon="icon-briefcase.svg"
                to="/jobs"
                :value="$stats['ongoing']"
            />
        </div>
    </section>
    <section class="py-5 px-4 sm:px-0 lg:px-0">
        <div class="flex justify-between mb-3">
            <div><b class="font-sm tracking-wider text-gray-900">Recent activities</b></div>
        </div>
        <div>
            <div class="flex flex-col">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="align-middle inline-block min-w-full  overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Job Details
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Handyman
                                </th>
                                {{-- <th class="px-6 py-3 border-b border-gray-200 "></th> --}}
                                <th class="px-6 py-3 border-b border-gray-200 "></th>
                            </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($jobs as $job)
                                    <x-activity-component :job="$job"/>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>
@endsection
