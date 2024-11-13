<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 text-white bg-indigo-700 border border-transparent rounded-md font-semibold text-xs  uppercase tracking-widest hover:bg-indigo-900  focus:bg-indigo-600  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
