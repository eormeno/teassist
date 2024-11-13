<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 b rounded-md font-semibold text-xs uppercase tracking-widest border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
