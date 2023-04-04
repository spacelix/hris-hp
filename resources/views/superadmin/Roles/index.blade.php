<x-app-layout>
    <div
        class="p-4 bg-white border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800 border-2 dark:border-none">
        <div class="w-full mb-1">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white mb-3">Roles & Permissions</h1>
            <div class="items-center justify-between block sm:flex mb-6">
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="products-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search...">
                    </div>
                </form>
            </div>

            <div
                class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flow-root">
                    <div class="flex justify-between">
                        <h3 class="text-xl font-semibold dark:text-white">Roles</h3>
                        <button id="createProductButton"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                            type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                            Add New Roles
                        </button>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span>Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$roles)
                                    No Data Role Found
                                @else
                                    @foreach ($roles as $item)
                                        @include('/superadmin/Roles/partials/edit-modal')
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $item->name }}
                                            </th>

                                            <td class="px-6 py-4 text-left flex justify-start gap-3">
                                                <button data-modal-target="defaultModal{{ $item->id }}"
                                                    data-modal-toggle="defaultModal{{ $item->id }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                                |
                                                <form action="{{ route('roles.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white mb-3">User Have Role</h1>
            <div
                class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">

                <div class="flow-root">
                    <div class="flex justify-between">
                        <h3 class="text-xl font-semibold dark:text-white">Users</h3>
                        <a href="{{ route('users.create') }}" id="createProductButton"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                            type="button" data-drawer-target="drawer-create-product-default"
                            data-drawer-show="drawer-create-product-default"
                            aria-controls="drawer-create-product-default" data-drawer-placement="right">
                            Add New User
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Area
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span>Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$users)
                                    No Data Role Found
                                @else
                                    @foreach ($users as $item)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                @if (!$item->image)
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ $item->name }}"
                                                        alt="Jese image">
                                                @else
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ asset('storage/' . $item->image) }}" alt="Jese image">
                                                @endif
                                                <div class="pl-3">
                                                    <div class="text-base font-semibold">{{ $item->name }}</div>
                                                    <div class="font-normal text-gray-500">{{ $item->email }}</div>
                                                </div>
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @if (!$item->area_id)
                                                    -
                                                @else
                                                    {{ $item->area->name }}
                                                @endif
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @foreach ($item->getRoleNames() as $name)
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $name }}</span>
                                                @endforeach
                                            </th>

                                            <td class="px-6 py-4 text-left flex justify-start gap-3">
                                                <a href="{{ route('users.edit', $item->id) }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                |
                                                <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
    @include('/superadmin/Roles/partials/modal')
</x-app-layout>
