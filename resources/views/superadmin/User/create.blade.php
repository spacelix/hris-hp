<x-app-layout>
    <div
        class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full mb-1">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white mb-3">Tambah User</h1>
            <form class="w-full mt-6" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-at"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                                </svg>
                            </span>
                            <input type="email" id="email" name="email"
                                class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="jhondoe@gmail.com" value="{{ old('email') }}">

                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Lengkap</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="tabler-icon tabler-icon-signature">
                                    <path
                                        d="M3 17c3.333 -3.333 5 -6 5 -8c0 -3 -1 -3 -2 -3s-2.032 1.085 -2 3c.034 2.048 1.658 4.877 2.5 6c1.5 2 2.5 2.5 3.5 1l2 -3c.333 2.667 1.333 4 3 4c.53 0 2.639 -2 3 -2c.517 0 1.517 .667 3 2">
                                    </path>
                                </svg>
                            </span>
                            <input type="text" id="name" name="name"
                                class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="JhonDoe" value="{{ old('name') }}">
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-password"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 10v4"></path>
                                    <path d="M10 13l4 -2"></path>
                                    <path d="M10 11l4 2"></path>
                                    <path d="M5 10v4"></path>
                                    <path d="M3 13l4 -2"></path>
                                    <path d="M3 11l4 2"></path>
                                    <path d="M19 10v4"></path>
                                    <path d="M17 13l4 -2"></path>
                                    <path d="M17 11l4 2"></path>
                                </svg>
                            </span>
                            <input type="password" id="password" name="password"
                                class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="**********">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                            Confirmation</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-password"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 10v4"></path>
                                    <path d="M10 13l4 -2"></path>
                                    <path d="M10 11l4 2"></path>
                                    <path d="M5 10v4"></path>
                                    <path d="M3 13l4 -2"></path>
                                    <path d="M3 11l4 2"></path>
                                    <path d="M19 10v4"></path>
                                    <path d="M17 13l4 -2"></path>
                                    <path d="M17 11l4 2"></path>
                                </svg>
                            </span>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="**********">
                        </div>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">
                            Profile Picture
                        </label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" name="image" type="file" onchange="previewFile(this);">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        <div class="relative mt-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                for="image">Peview Profile Picture</label>

                            <img class="img-preview w-24 h-24 rounded-full"
                                src="https://fakeimg.pl/24x24/?text=ava&font=noto" alt="Avatar">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="role"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Role</label>
                        <select id="role" name="role"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            <option selected>Pilih Role</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="area_id">
                            Area
                        </label>
                        <select id="area_id" name="area_id"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            <option selected>Pilih Area</option>
                            @forelse ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @empty
                                <option>Belum Ada Data Area</option>
                            @endforelse
                        </select>
                        <x-input-error :messages="$errors->get('area_id')" class="mt-2" />
                    </div>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            function previewFile(input) {
                var file = $("input[type=file]").get(0).files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function() {
                        $(".img-preview").attr("src", reader.result);
                    }

                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endpush
</x-app-layout>
