<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-blue-600 border border-transparent rounded-md font-semibold text-dark dark:text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-dark focus:bg-blue-700 dark:focus:bg-dark active:bg-blue-900 dark:active:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
