<x-dash-layout>
    <div class="bg-white mt-10 border w-6/12 border-blue-100 rounded-xl p-10 max-w-2xl mx-auto shadow-md">
        <h2 class="text-3xl font-bold text-blue-900 mb-8 text-center">
            {{ isset($cat) ? __('messages.edit category') : __('messages.addcat') }}
        </h2>

        <form action="{{  route('cat.store') }}" method="POST" class="space-y-6">
            @csrf
            @if(isset($cat))
                @method('PATCH')
            @endif

            <!-- الاسم بالإنجليزية -->
            <div>
                <label for="name_en" class="block text-sm font-semibold text-gray-700 mb-2">
                    {{ __('messages.eng') }}
                </label>
                <input type="text" id="name_en" name="name_en"
                    placeholder="e.g. Science"
                    class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
            </div>

            <!-- الاسم بالعربية -->
            <div>
                <label for="name_ar" class="block text-sm font-semibold text-gray-700 mb-2">
                    {{ __('messages.arab') }}
                </label>
                <input type="text" id="name_ar" name="name_ar"
                    placeholder="مثال: علوم"
                    class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
            </div>

            <!-- زر الإرسال -->
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md">
                    {{ __('messages.add') }}
                </button>
            </div>
        </form>
        @if(session('success'))
    <div class="mb-6">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">✔️</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
@endif
    </div>
</x-dash-layout>
