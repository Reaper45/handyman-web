<!-- Very little is needed to make a happy life. - Marcus Antoninus -->
<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <img
                    class="h-10 w-10 rounded border-gray-400 focus:border-blue-500"
                    src="{{ asset('img/logo.png') }}" />
            </div>
            <div class="ml-4">
                <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                    <b class="ml-1">{{ $job->service->title }}</b>
                    <span class="ml-1 text-gray-500">
                        for {{ $job->creator->name }}
                    </span>
                </div>
                <div class="flex text-sm leading-5 text-gray-500">
                    @if ($job->category)
                        <span class="flex items-center text-sm leading-5">
                            <svg
                                class="flex-shrink-0 mr-3 h-5 w-5 text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                    clip-rule="evenodd"
                                />
                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                            </svg>
                            {{ $job->category->name }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </td>

    <td class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200">
        <div class=" ml-3 text-sm leading-5 font-medium text-gray-700 truncate">
            <div class="flex items-center text-sm leading-5 text-gray-700">
                <svg
                    class="flex-shrink-0 mr-2 h-5 w-5 text-gray-500"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    widht="20px"
                    height="20px"
                >
                    <path
                        fill-rule="evenodd"
                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
                {{$job->location}}
            </div>
            <span class="flex items-center text-sm leading-5">
                <small class="ml-3 hidden xs:inline-flex md:inline-flex text-gray-400">{{$job->extra}}</small>
            </span>
        </div>
    </td>

    <td class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200">
       <div class="flex">
           @if ($job->handyman)
            <div class="mr-2">
                <img
                    class="h-10 w-10 rounded-full"
                    src="{{ Gravatar::get($job->handyman->email) }}"
                    alt=""
                />
            </div>
            <div class="text-sm leading-5 font-medium text-gray-700 truncate">
                <b class="ml-1">{{ $job->handyman->name }}</b>
                <div class="flex items-center text-sm leading-5 text-gray-500">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span class="ml-2">{{ $job->handyman->phone_number }}</span>
                </div>
            </div>    
            @else
                <div class="mr-2">Unassigned</div>
            @endif
       </div>
    </td>

    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium border-b border-gray-200">
        <span class="inline-flex ml-3 px-2 text-xs leading-5 font-semibold rounded-full bg-{{ $job->status === "COMPLETE" ? "green" : ($job->status === "ONGOING" ? "blue" : "orange")  }}-200 text-{{ $job->status === "COMPLETE" ? "green" : ($job->status === "ONGOING" ? "blue" : "orange")  }}-800">
            {{$job->status}}
        </span>
    </td>
</tr>