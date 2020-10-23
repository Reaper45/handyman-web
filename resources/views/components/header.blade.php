<header class="bg-white shadow mb-4">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-32">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h1 class="text-2xl font-bold leading-tight text-gray-900">
                    {{ $title }}
                </h1>
            </div>
            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <span class="hidden sm:block shadow-sm rounded-md">
                    {{ $slot }}
                </span>
            </div>
        </div>
    </div>
</header>