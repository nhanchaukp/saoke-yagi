<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" class="js-site-favicon" type="image/svg+xml" href="{{asset('favicon.svg') }}">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        @turnstileScripts
    </head>
    <body class="min-h-screen flex flex-col  bg-gray-100 dark:bg-gray-900 font-sans text-gray-900 dark:text-gray-100 antialiased">
        <div class="flex-grow p-4 sm:px-12 sm:py-8">
            {{ $slot }}
        </div>
        <footer class="bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-400 text-center py-4">

            <div class="w-full py-2">
                <p class="text-amber-500 dark:text-amber-600">
                    (*) Dữ liệu được trích xuất từ các bản sao kê từ MTTQ cập nhật công khai. Nếu có sai sót về dữ liệu hoặc vi phạm, vui lòng liên hệ {{ env('MAIL_ADMIN') }}
                </p>
            </div>
            <p>&copy; {{ date('Y') }} <a href="https://fcode.vn">FCODE.vn</a> . All rights reserved.</p>
        </footer>

        @stack('scripts')
        @livewireScripts
    </body>
</html>
