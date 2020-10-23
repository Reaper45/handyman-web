@extends('layouts.app')

@section('content')
<x-header >
    <x-slot name="title">
        Categories
    </x-slot>

     <!-- New Category modal -->
    <div  @click.away="open = false" x-data="{ open: false }"  class="relative" >

        <button  @click="open = !open" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
            + Add category
        </button>
        <div  x-show="open" class="fixed z-20 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">

            <!--
                Background overlay, show/hide based on modal state.

                Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
                Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div x-show="open" class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!--
                Modal panel, show/hide based on modal state.

                Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
                Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div  x-show="open" class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
              <!-- FORM -->
              <x-category-form />
            </div>
        </div>
    </div>
</x-header>
<x-main>
     @if (session('status'))
        <div class="flex mb-3 items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ session('status') }}</p>
        </div>
    @endif
    <!-- Content -->
    <div class="flex flex-col">
      @foreach ($categories as $category) 
        <div class="flex mb-4">
            <div class="w-1/3">
                <div class="text-gray-700 text-sm font-medium">
                  {{$category->name}}
                </div>
                <div class="text-gray-500 text-xs">
                    {{$category->description}}
                </div>
                <!-- New service modal -->
                <div  @click.away="open = false" x-data="{ open: false }"  class="relative" >

                    <div class="flex items-center">
                      <button  @click="open = !open" type="button" class="inline-flex items-center px-2 py-1 mt-3 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        + Add service
                      </button>
                      <form action="{{ route("categories.delete", ["id" => $category->id, "_method" => "DELETE"]) }}" method="post">
                          @csrf
                          <button type="submit" class="inline-flex ml-3 mt-3 items-center px-2 py-1 border border-red-300 text-sm leading-5 font-medium rounded-md text-red-700 bg-red hover:text-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-300 active:text-red-800 active:bg-red-50 transition duration-150 ease-in-out">
                              Delete
                          </button>
                      </form>
                    </div>
                    <div  x-show="open" class="fixed z-10 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">

                        <!--
                            Background overlay, show/hide based on modal state.

                            Entering: "ease-out duration-300"
                            From: "opacity-0"
                            To: "opacity-100"
                            Leaving: "ease-in duration-200"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div x-show="open" class="fixed inset-0 transition-opacity">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <!--
                            Modal panel, show/hide based on modal state.

                            Entering: "ease-out duration-300"
                            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            To: "opacity-100 translate-y-0 sm:scale-100"
                            Leaving: "ease-in duration-200"
                            From: "opacity-100 translate-y-0 sm:scale-100"
                            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        -->
                        <div  x-show="open" class="bg-white rounded-lg overflow-auto shadow-xl transform transition-all " role="dialog" aria-modal="true" aria-labelledby="modal-headline" style="max-height: calc(100% - 100px)">
                            <form class="w-full" method="post" action="{{route('services.store')}}">
                                @csrf
                                <input type="hidden" name="category_id" value="{{$category->id}}" />
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" style="width: 400px;">
                                    <!-- Form -->
                                    <x-service-form />
                                </div>
                                <div class="border-t border-gray-300  "></div>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-2/3">
                <div>
                    <table class="min-w-full">
                        <tbody class="bg-white">
                            @foreach ($category->services as $service)       
                              <tr>
                                  <td class="px-6 py-4  pl-0 whitespace-no-wrap">
                                      <div class="flex items-center">
                                          <div class="ml-4">
                                              <div class="text-sm leading-5 font-medium text-gray-900">
                                                {{ $service->title }}
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-no-wrap">
                                      <div class="text-sm leading-5 text-gray-900"><small class="text-gray-500">KES. </small>{{ $service->amount }}</div>
                                  </td>
                                  <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                      Active
                                    </span>
                                  </td>

                                  <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                                    <form action="{{ route("services.delete", ["id" => $service->id, "_method" => "DELETE"]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-2 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                                          Remove
                                        </button>
                                    </form>
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mb-4 border-t border-gray-300"></div>
      @endforeach
  </div>
</x-main>
@endsection