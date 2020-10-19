<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded border-gray-400 focus:border-blue-500" src="{{ route('insurers.avatar', ["id" => $insurer->id]) }}" alt="{{ $insurer->name }}" />
            </div>
            <div class="ml-4">
                <div class="text-sm leading-5 font-medium text-gray-900">{{ $insurer->name }}</div>
                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                    <div class="mt-2 flex items-center text-sm sm:mr-6 text-sm leading-5 text-gray-500">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        Since: {{ Carbon\Carbon::parse($insurer->created_at)->isoFormat('MMMM Do, YYYY') }}
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
        <div class="text-sm leading-5 text-gray-900">Contact</div>
        <div class="flex text-sm leading-5 text-gray-500">
            <div class="mt-2 flex items-center text-sm sm:mr-6 text-sm leading-5 text-gray-500">
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                </svg>
                {{ $insurer->email }}
            </div>
            <div class="mt-2 flex items-center text-sm sm:mr-6 text-sm leading-5 text-gray-500">
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                {{ $insurer->telephone }}
            </div>
        </div>
        
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        @if ($insurer->is_active)
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                Active
            </span>
        @else
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                Deactivated
            </span>
           
        @endif
    </td>
     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <form action="{{ route("insurers.delete", ["id" => $insurer->id, "_method" => "DELETE"]) }}" method="post">
            @csrf
            <button type="submit" class="inline-flex items-center px-4 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                Delete
            </button>
        </form>
     </td>
</tr>