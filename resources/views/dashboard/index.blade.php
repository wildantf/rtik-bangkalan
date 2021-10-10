@extends('dashboard.layouts.main')
@section('content')
    <!-- cards row -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3 2xl:gap-8">

        <!-- monthly target -->
        <div class="col-span-1 px-4 py-4 bg-white rounded-md lg:px-8 lg:py-6">
            <h2 class="mb-4 text-xl font-bold text-cyan-900 lg:mb-6">Monthly target</h2>
            <div class="flex items-end mb-4 space-x-4 lg:mb-6">
                <div class="flex items-center justify-center w-12 h-12 bg-cyan-100 rounded-md">
                    <svg class="w-6 h-6 text-cyan-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.736 6.979C9.208 6.193 9.696 6 10 6c.304 0 .792.193 1.264.979a1 1 0 001.715-1.029C12.279 4.784 11.232 4 10 4s-2.279.784-2.979 1.95c-.285.475-.507 1-.67 1.55H6a1 1 0 000 2h.013a9.358 9.358 0 000 1H6a1 1 0 100 2h.351c.163.55.385 1.075.67 1.55C7.721 15.216 8.768 16 10 16s2.279-.784 2.979-1.95a1 1 0 10-1.715-1.029c-.472.786-.96.979-1.264.979-.304 0-.792-.193-1.264-.979a4.265 4.265 0 01-.264-.521H10a1 1 0 100-2H8.017a7.36 7.36 0 010-1H10a1 1 0 100-2H8.472c.08-.185.167-.36.264-.521z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="mb-2 text-2xl text-cyan-900">&euro;21.291,09</span>
                <span class="hidden mb-2 text-cyan-900 whitespace-pre opacity-70 xl:inline-block">/
                    &euro;40.000</span>
            </div>
            <div class="overflow-hidden rounded-full bg-green-50 h-7">
                <div style="width:65%;"
                    class="flex items-center justify-center text-center bg-green-400 rounded-full h-7 text-green-50">
                    65%
                </div>
            </div>
        </div>
        <!--/ monthly target -->

        <!-- customers -->
        <div class="col-span-1 px-4 py-4 bg-white rounded-md lg:px-8 lg:py-6">
            <h2 class="mb-4 text-xl font-bold text-cyan-900 lg:mb-6">Customers</h2>
            <div class="flex items-end mb-4 space-x-4 lg:mb-6">
                <div class="flex items-center justify-center w-12 h-12 bg-cyan-100 rounded-md">
                    <svg class="w-6 h-6 text-cyan-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                        </path>
                    </svg>
                </div>
                <span class="mb-2 text-2xl">491</span>
                <span class="px-3 mb-2 text-base text-green-500 bg-green-100 rounded-full border-full">&#8605;
                    32</span>
            </div>
            <p>Customers this month</p>
        </div>
        <!--/ customers -->

        <!-- sales -->
        <div class="col-span-1 px-4 py-4 bg-white rounded-md lg:px-8 lg:py-6">
            <h2 class="mb-4 text-xl font-bold text-cyan-900 lg:mb-6">Sales</h2>
            <div class="flex items-end mb-4 space-x-4 lg:mb-6">
                <div class="flex items-center justify-center w-12 h-12 bg-cyan-100 rounded-md">
                    <svg class="w-6 h-6 text-cyan-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                        </path>
                    </svg>
                </div>
                <span class="mb-2 text-2xl">230</span>
                <span class="px-3 mb-2 text-base text-red-500 bg-red-100 rounded-full border-full">
                    <span class="inline-block transform rotate-180">
                        &#8604;
                    </span>
                    12
                </span>
            </div>
            <p>Sales this month</p>
        </div>
        <!--/ sales -->

    </div>
    <!--/ cards row -->

    <!-- recent orders -->
    <div class="px-4 py-4 mt-8 bg-white rounded-md lg:px-8 lg:py-6">
        <h2 class="mb-4 text-xl font-bold text-cyan-900 lg:mb-6">Recent orders</h2>
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full overflow-hidden align-middle">
                <table class="min-w-full">
                    <thead class="text-left bg-cyan-200">
                        <tr>
                            <th class="px-3 py-2">ID</th>
                            <th class="px-3 py-2">Product</th>
                            <th class="px-3 py-2">Customer</th>
                            <th class="px-3 py-2">Date</th>
                            <th class="px-3 py-2">Status</th>
                            <th class="px-3 py-2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="text-cyan-900 divide-y divide-cyan-100 text-opacity-80 whitespace-nowrap">
                        <tr>
                            <td class="px-3 py-3">#12831</td>
                            <td class="px-3 py-3">Traditional Package</td>
                            <td class="px-3 py-3">Frances Nichols</td>
                            <td class="px-3 py-3">12-01-2021</td>
                            <td class="px-3 py-3">
                                <span
                                    class="inline-block w-16 px-3 py-1 text-xs text-center text-green-500 uppercase bg-green-100 rounded-full">Done</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-3">#12830</td>
                            <td class="px-3 py-3">Pro Package</td>
                            <td class="px-3 py-3">Ronald George</td>
                            <td class="px-3 py-3">12-01-2021</td>
                            <td class="px-3 py-3">
                                <span
                                    class="inline-block w-16 px-3 py-1 text-xs text-center text-green-500 uppercase bg-green-100 rounded-full">Done</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-3">#12829</td>
                            <td class="px-3 py-3">Pro Package</td>
                            <td class="px-3 py-3">Charlene Scott</td>
                            <td class="px-3 py-3">12-01-2021</td>
                            <td class="px-3 py-3">
                                <span
                                    class="inline-block w-16 px-3 py-1 text-xs text-center text-red-500 uppercase bg-red-100 rounded-full">Failed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-3">#12828</td>
                            <td class="px-3 py-3">Starter Package</td>
                            <td class="px-3 py-3">Beverley Owens</td>
                            <td class="px-3 py-3">11-01-2021</td>
                            <td class="px-3 py-3">
                                <span
                                    class="inline-block w-16 px-3 py-1 text-xs text-center text-green-500 uppercase bg-green-100 rounded-full">Done</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-3">#12827</td>
                            <td class="px-3 py-3">Pro Package</td>
                            <td class="px-3 py-3">Julian Hansen</td>
                            <td class="px-3 py-3">11-01-2021</td>
                            <td class="px-3 py-3">
                                <span
                                    class="inline-block w-16 px-3 py-1 text-xs text-center text-yellow-500 uppercase bg-yellow-100 rounded-full">Hold</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-3">#12826</td>
                            <td class="px-3 py-3">Pro Package</td>
                            <td class="px-3 py-3">Nathan Howell</td>
                            <td class="px-3 py-3">11-01-2021</td>
                            <td class="px-3 py-3">
                                <span
                                    class="inline-block w-16 px-3 py-1 text-xs text-center text-green-500 uppercase bg-green-100 rounded-full">Done</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="#" class="inline-block mt-5 font-bold text-cyan-600 hover:underline">View all
            orders</a>
    </div>
    <!--/ recent orders -->

    <!-- post list -->
    <div class="flex mx-auto overflow-hidden bg-white rounded-md mt-8 shadow-md dark:bg-gray-800">
        <div class="w-1/3 bg-cover"
            style="background-image: url('https://images.unsplash.com/photo-1494726161322-5360d4d0eeae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80')">
        </div>

        <div class="w-2/3 p-4 md:p-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Backpack</h1>

            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet
                consectetur adipisicing elit In odit</p>

            <div class="flex mt-2 item-center">
                <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-300" viewBox="0 0 24 24">
                    <path
                        d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>

                <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-300" viewBox="0 0 24 24">
                    <path
                        d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>

                <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-300" viewBox="0 0 24 24">
                    <path
                        d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>

                <svg class="w-5 h-5 text-gray-500 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>

                <svg class="w-5 h-5 text-gray-500 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>
            </div>

            <div class="flex justify-between mt-3 item-center">
                <h1 class="text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl">$220</h1>
                <button
                    class="px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">Add
                    to Cart</button>
            </div>
        </div>
    </div>
    <!--/ post list -->
@endsection
