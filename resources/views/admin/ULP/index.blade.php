<x-app-layout>
    <div class="p-4 sm:p-8 bg-white block sm:flex items-center justify-between rounded-xl lg:mt-1.5 dark:bg-gray-800">
        <div class="w-full mb-1">
            <div class="items-center justify-between block sm:flex mb-6">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white mb-3 uppercase">Ulp</h1>
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="products-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search...">
                    </div>
                </form>
            </div>
            {{-- Ulp --}}
            <div
                class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flow-root">
                    <div class="flex justify-between">
                        <h3 class="text-xl font-semibold dark:text-white uppercase">Ulp Area
                            {{ $user->area->name }}
                        </h3>
                        <button id="createProductButton"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                            type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                            Add ULP
                        </button>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">


                        @if (count($ulps) === 0)
                            <tr>
                                <x-empty-states data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                                    :href="'#'">
                                    Tambah Ulp
                                </x-empty-states>
                            </tr>
                        @else
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="example">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Area
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jumlah Pegawai
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span>Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ulps as $item)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $item->name }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Jumlah Pegawai
                                            </th>
                                            <td class="px-6 py-4 text-left flex justify-start gap-3">
                                                @include('admin.ULP.partials.edit-modal')
                                                <button data-modal-target="defaultModal{{ $item->slug }}"
                                                    data-modal-toggle="defaultModal{{ $item->slug }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                                |
                                                <form action="{{ route('area.destroy', $item->slug) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.ULP.partials.modal')
</x-app-layout>
