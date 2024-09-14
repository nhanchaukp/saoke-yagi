<div class="container">
    <h1 class="font-extrabold text-4xl">Sao Kê VAR 🕵️‍♂️</h1>
    <div class="py-4 text-lg">
        <p>Dữ liệu cung cấp bởi MTTQ, bao gồm:</p>
        <ul class="list-disc ml-10">
            <li><a class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500" target="_blank" href="https://www.facebook.com/mttqvietnam/posts/pfbid0YSaZTjEw2GBMnT5bNBi49djNxnxi326VjKodHzdxvhpkW3rwTs8u5dCeVGvQmU18l">Số tiền ủng hộ qua số tài khoản Vietcombank 0011001932418 từ ngày 1/9/2024 đến ngày 10/9/2024</a></li>
            <li><a class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500" target="_blank" href="https://www.facebook.com/mttqvietnam/posts/pfbid0cGpdUA8JFuB5TPLFX5E1GmhBSkYs99v9rRLY5sY2mTD1pJ16Cq1BvtkrSXLfnsESl">Số tiền ủng hộ qua số tài khoản Vietinbank CT1111 từ ngày 10/9/2024 đến ngày 12/9/2024</a></li>
        </ul>
    </div>
    <form wire:submit.prevent="searchAction" class="mt-4">
        <div class="relative">
            <x-input
                wire:model="query"
                name="search"
                class="w-full py-4 pl-14 pr-14"
                placeholder="Tên hoặc nội dung tìm kiếm"
            />
            <div class="absolute inset-y-0 left-0 flex items-center pl-6">
                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-6">
                <svg wire:loading class="w-5 h-5 text-gray-400 animate-spin" id="loading-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
        <div
             class="mt-3">
            <x-turnstile wire:ignore
                wire:model="turnstileResponse"
            />
        </div>
        @error('turnstileResponse')
            <div class="flex-1">
                <h3 class="text-lg font-medium text-red-700 dark:text-red-800">{{ $message }}</h3>
            </div>
        @enderror
    </form>


@if($results)
        <div class="container mx-auto mt-9">
            <h2 class="text-2xl font-bold mb-4 dark:text-white">{{__('Search Results')}}</h2>
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
                @if($results->total())
                <table class="min-w-full table-auto border border-gray-300 dark:border-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Thời gian
                        </th>
                        <th class="px-6 py-3 text-left font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Số tiền
                        </th>
                        <th class="px-6 py-3 text-left font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Nội dung
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($results as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">{{$item->transaction_date}}</td>
                            <td class="font-semibold px-6 py-4 whitespace-nowrap text-blue-500 dark:text-blue-400">{{$item->amount}} ₫</td>
                            <td class="px-6 py-4 text-gray-900 dark:text-gray-100">
                                {!! \Illuminate\Support\Str::replace($query, '<span class="px-1 rounded bg-yellow-300 text-black dark:bg-yellow-500 dark:text-white">'.$query.'</span>', $item->content, false) !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <div class="p-6 flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Không có kết quả phù hợp</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Bạn có thể sử dụng từ khóa ngắn hơn để tìm ra nhiều kết quả hơn.
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="mt-9">
                {{ $results->links() }}
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-9">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><path d="M 22.1875 2.28125 L 20.78125 3.71875 L 25.0625 8 L 4 8 L 4 10 L 25.0625 10 L 20.78125 14.28125 L 22.1875 15.71875 L 28.90625 9 Z M 9.8125 16.28125 L 3.09375 23 L 9.8125 29.71875 L 11.21875 28.28125 L 6.9375 24 L 28 24 L 28 22 L 6.9375 22 L 11.21875 17.71875 Z"></path></svg>
                </div>
                <div class="ml-4">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Số lượng giao dịch</h4>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        <span class="text-blue-600 dark:text-blue-400">{{ number_format($transaction_total) }}</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-green-100 text-green-600 p-3 rounded-full">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 19h12"></path>
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                        <path d="M16 16v-12"></path>
                        <path d="M17 5h-4"></path>
                    </svg>
                </div>
                <!-- Statistics -->
                <div class="ml-4">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Tổng số tiền</h4>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        <span class="text-green-600 dark:text-green-400">{{ number_format($total_money) }} ₫ </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
