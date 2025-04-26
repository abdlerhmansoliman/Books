@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400']) }}>
