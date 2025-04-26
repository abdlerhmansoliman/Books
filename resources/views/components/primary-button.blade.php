<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-white px-4 py-2 bg-[#1B3764] border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm  focus:outline-none focus:ring-2 focus:ring-indigo-500  disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>