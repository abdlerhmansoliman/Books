<x-app-layout>  

  <div class="bg-white mt-4 border border-blue-200 rounded-md p-6 max-w-4xl mx-auto ">
      <h2 class="text-blue-900 text-xl font-semibold text-center mb-8">أضف كتابك على مكتبة كتبي</h2>

      <form action="{{ route('addbook') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
          <!-- الحقول الرئيسية -->
        @csrf          <!-- الحقول الرئيسية -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- اسم الكتاب -->
              <div class="form-group">
                  <label class="block text-sm font-medium text-blue-900 mb-1">{{ __('messages.book name') }}</label>
                  <input type="text" name="title" class="w-full border border-gray-300 rounded py-2 px-3 text-gray-500 bg-gray-50" placeholder="{{ __('messages.book name') }}" />
              </div>

              <!-- اسم المؤلف -->
              <div class="form-group">
                  <label class="block text-sm font-medium text-blue-900 mb-1">{{ __('messages.author name') }} *</label>
                  <input type="text" name="auth_name" class="w-full border border-gray-300 rounded py-2 px-3 text-gray-500 bg-gray-50" placeholder="{{ __('messages.author name') }}" />
              </div>

              <!-- التصنيف -->
              <div class="form-group">
                <label class=" text-sm font-medium text-blue-900 mb-1">
                    {{ __('messages.book category') }} *
                </label>
                <select name="category_id" required class="w-full border border-gray-300 rounded py-2 px-3 text-gray-500 bg-gray-50">
                    <option value="" disabled selected>-- اختر تصنيف --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="block text-sm font-medium text-blue-900 mb-1">{{ __('messages.pages') }} *</label>
                <input type="text" name="pages" class="w-full border border-gray-300 rounded py-2 px-3 text-gray-500 bg-gray-50" placeholder="{{ __('messages.pages') }}" />
            </div>

              <!-- الوصف -->
              <div class="form-group md:col-span-2">
                  <label class="block text-sm font-medium text-blue-900 mb-1">{{ __('messages.book description') }} *</label>
                  <textarea rows="5" name="description" class="w-full border border-gray-300 rounded py-2 px-3 text-gray-500 bg-gray-50" placeholder="{{ __('messages.book description') }}"></textarea>
              </div>

              <div class=" form-group">
                <label class="block text-sm font-medium text-blue-900 mb-1">{{ __('messages.publish date') }} *</label>
                <input type="number" name="publication_year" class="w-full border border-gray-300 rounded py-2 px-3 text-gray-500 bg-gray-50" placeholder="{{ __('messages.publication_year') }}" />
            </div>
              <!-- رفع الملف -->
              <div class="form-group">
                  <label class="block text-sm font-medium text-blue-900 mb-1">{{ __('messages.book upload') }} *</label>
                  <div class="relative">
                      <input name="pdf" type="file" id="book_file" class="hidden" />
                      <label for="book_file" class="w-full flex items-center justify-between border border-gray-300 rounded-full bg-gray-50 py-2 px-4 text-gray-500 text-sm cursor-pointer">
                          <span class="truncate">{{ __('messages.book file') }}</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                          </svg>
                      </label>
                  </div>
              </div>
              <!-- رفع الغلاف -->
              <div class="form-group">
                  <label class="block text-sm font-medium text-blue-900 mb-1">{{ __('messages.book cover') }} *</label>
                  <div class="relative">
                      <input type="file" name="image_cover" id="cover_file" class="hidden" />
                      <label for="cover_file" class="w-full flex items-center justify-between border border-gray-300 rounded-full bg-gray-50 py-2 px-4 text-gray-500 text-sm cursor-pointer">
                          <span class="truncate">{{ __('messages.cover') }}</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                          </svg>
                      </label>
                  </div>
              </div>
          </div> <!-- نهاية Grid -->
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
          <!-- شروط الخدمة وزر الإرسال -->
          <div class="flex justify-end mt-12">
            <div class="bg-gray-50 p-6 rounded-md w-full max-w-md text-center">
                <h3 class="text-sm font-medium text-blue-900 mb-4">{{ __('messages.terms of Service') }}:</h3>
                <ul class="text-sm text-gray-700 space-y-3 ">
                    <li class="flex items-start"><span>{{ __('messages.terms 1') }}</span><span class="ml-2">•</span></li>
                    <li class="flex items-start"><span>{{ __('messages.terms 2') }}</span><span class="ml-2">•</span></li>
                    <li class="flex items-start"><span>{{ __('messages.terms 3') }}</span><span class="ml-2">•</span></li>
                    <li class="flex items-start"><span>{{ __('messages.terms 4') }}</span><span class="ml-2">•</span></li>
                </ul>
        
                <!-- زر النشر -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded-md font-medium">
                        {{ __('messages.publish') }}
                    </button>
                </div>
            </div>
        </div>
        
      </form>
  </div>

</x-app-layout>
