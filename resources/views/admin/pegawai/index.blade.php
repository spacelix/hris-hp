<x-app-layout>



    <div
        class="p-4 sm:p-8 bg-white block sm:flex items-center justify-between rounded-xl lg:mt-1.5 dark:bg-gray-800 border-2 dark:border-none">
        <div class="w-full mb-1">
            <div class="items-center justify-between block sm:flex mb-3">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white uppercase mb-3">Pegawai</h1>
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-full mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="products-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search...">
                    </div>
                </form>
            </div>
            <div class="items-center justify-between block sm:flex mb-3">
                <button id="createProductButton"
                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                    type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                    Tambah Pegawai
                </button>
                <div class="sm:pr-3 mt-3 sm:mt-0">
                    <div class="relative w-full mt-1 sm:w-64 xl:w-96">
                        <x-secondary-button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 text-center w-full flex justify-between"
                            type="button">
                            Berdasarkan ULP
                            <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </x-secondary-button>
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-full dark:bg-gray-700">
                            <form action="{{ route('pegawai.filter') }}" method="GET">
                                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownRadioBgHoverButton">
                                    @forelse ($ulps as $ulp)
                                        <li>
                                            <div
                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input id="{{ $ulp->id }}" type="radio"
                                                    value="{{ $ulp->id }}" name="ulp_id"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="{{ $ulp->id }}"
                                                    class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $ulp->name }}</label>
                                            </div>
                                        </li>
                                    @empty
                                        <li>
                                            <div
                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <label for="ulp_id"
                                                    class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Tidak
                                                    ada ULP</label>
                                            </div>
                                        </li>
                                    @endforelse
                                    <div class="flex items-center justify-between gap-4">
                                        <x-secondary-button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-filter w-5 h-5 mr-3"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="4" y1="9" x2="20" y2="9">
                                                </line>
                                                <line x1="4" y1="15" x2="20" y2="15">
                                                </line>
                                                <path
                                                    d="M9 4h6a3 3 0 0 1 3 3v4a3 3 0 0 1 -3 3h-6a3 3 0 0 1 -3 -3v-4a3 3 0 0 1 3 -3">
                                                </path>
                                            </svg>
                                            Filter
                                        </x-secondary-button>
                                        <a href="{{ route('pegawai.index') }}"
                                            class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-zoom-reset w-4 h-4 mr-3"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M21 21l-6 -6"></path>
                                                <path
                                                    d="M3.268 12.043a7.017 7.017 0 0 0 6.634 4.957a7.012 7.012 0 0 0 7.043 -6.131a7 7 0 0 0 -5.314 -7.672a7.021 7.021 0 0 0 -8.241 4.403">
                                                </path>
                                                <path d="M3 4v4h4"></path>
                                            </svg>
                                            Reset
                                        </a>
                                    </div>
                                </ul>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($pegawais as $item)
                    <li
                        class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow border border-gray-200  dark:bg-gray-900 dark:border-gray-600">
                        <div class="flex w-full items-center justify-between space-x-6 p-6">
                            <div class="flex-1 truncate">
                                <div class="flex items-center space-x-3">
                                    <h3 class="truncate text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $item->nama }}</h3>
                                    <span
                                        class="inline-block flex-shrink-0 rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-800">{{ $item->area->name }}</span>
                                </div>
                                <p class="mt-1 truncate text-sm text-gray-500 dark:text-white/75">
                                    {{ $item->ulp->name }}
                                </p>
                            </div>
                            <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300"
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                alt="{{ $item->nama }}">
                        </div>
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="flex w-0 flex-1">
                                    <a href="mailto:janecooper@example.com"
                                        class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500 dark:text-white/75">
                                        <!-- Heroicon name: mini/envelope -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-eye h-5 w-5 text-gray-400"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                            </path>
                                        </svg>
                                        <span class="ml-3">Detail</span>
                                    </a>
                                </div>
                                <div class="-ml-px flex w-0 flex-1">
                                    <a href="tel:+1-202-555-0170"
                                        class="relative inline-flex w-0 flex-1 items-center justify-center rounded-br-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500 dark:text-white/75">
                                        <!-- Heroicon name: mini/phone -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-edit h-5 w-5 text-gray-400"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                            </path>
                                            <path
                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                            </path>
                                            <path d="M16 5l3 3"></path>
                                        </svg>
                                        <span class="ml-3">Edit</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                @endforelse



                <!-- More people... -->
            </ul>
        </div>
    </div>

    @include('admin.pegawai.partials.modal')
</x-app-layout>
