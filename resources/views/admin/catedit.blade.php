<x-dash-layout>
    <div class="bg-white mt-10 border w-6/12 border-blue-100 rounded-xl p-10 max-w-2xl mx-auto shadow-md">
        <div class="w-full  bg-white rounded-2xl shadow-md p-8 ">
    <form action="{{route('cat.update',$cat)}}" method="POST">
        @csrf
        @method('PATCH')
            <!-- الاسم بالإنجليزية -->
            <div>
                <label for="name_en" class="block text-sm font-semibold text-gray-700 mb-2">
                    {{ __('messages.eng') }}
                </label>
                <input type="text" value="{{ $cat->name_en }}" id="name_en" name="name_en"
                    placeholder="e.g. Science"
                    class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
            </div>

            <!-- الاسم بالعربية -->
            <div>
                <label for="name_ar" class="block text-sm font-semibold text-gray-700 mb-2">
                    {{ __('messages.arab') }}
                </label>
                <input type="text" id="name_ar" value="{{ $cat->name_ar }}" name="name_ar"
                    placeholder="مثال: علوم"
                    class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
            </div>
            <div class="flex justify-center mt-3">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md">
                    {{ __('messages.edit') }}
                </button>
        </form>
        </div>
    </div>
</x-dash-layout>