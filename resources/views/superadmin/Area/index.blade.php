<x-app-layout>
    <div class="p-4 sm:p-8 bg-white block sm:flex items-center justify-between rounded-xl lg:mt-1.5 dark:bg-gray-800">
        <div class="w-full mb-1">
            <div class="items-center justify-between block sm:flex mb-6">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white mb-3">Area</h1>
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="products-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
