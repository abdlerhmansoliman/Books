<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 " :status="session('status')" />

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8 ">

            <h2 class="text-2xl font-bold text-[#1B3764] mb-6 text-center">{{__('messages.login')}} </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"  />

            <form method="POST" action="{{ route('register') }}" class="space-y-4" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1" for="name">{{__('messages.name')}}</label>
                    <input type="text" id="name" name="name" placeholder="سارة محمد فتح الله عبدالمقصود"
                        value="{{ old('name') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1" for="email">{{__('messages.email address')}} </label>
                    <input type="email" id="email" name="email" placeholder="sarahmohamed@gmail.com"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-sm text-gray-600 mb-1" for="name">{{__('messages.bio')}}</label>
                    <input type="text" id="name" name="bio" placeholder="add some thing about you"
                        value="{{ old('bio') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <!-- Password -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1" for="password">{{__('messages.password')}}</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1" for="password_confirmation"> {{__('messages.confirm password')}} </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                                {{-- gender --}}
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1" for="password">{{__('messages.gender')}} </label>
                                    <label>
                                        <input type="checkbox" name="gender" value="{{__('messages.male')}}" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                        Male
                                    </label>
                                    
                                    <label>
                                        <input type="checkbox" name="gender" value="{{__('messages.female')}}" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                        Female
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="block text-sm font-medium text-blue-900 mb-1">{{ __('messages.profile image') }} *</label>
                                    <div class="relative">
                                        <!-- تأكد من مطابقة الـ id في الـ input مع الـ for في الـ label -->
                                        <input type="file" name="profile_image" id="cover_file" class="hidden" accept="image/*" />
                                        <label for="cover_file" class="w-full flex items-center justify-between border border-gray-300 rounded-full bg-gray-50 py-2 px-4 text-gray-500 text-sm cursor-pointer">
                                            <span class="truncate">{{ __('messages.profile image') }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                                @if($errors->any())
                                <div class="bg-red-500 text-white p-4 mb-4 rounded">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif                                

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 bg-[#1B3764] text-white font-semibold rounded-full hover:bg-[#152c52] transition">
                    {{__('messages.register')}}
                </button>

                <!-- Already registered -->
                <div class="text-sm text-gray-600 text-center">
                    {{__('messages.already')}}   ؟
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">{{__('messages.login')}} </a>
                </div>

                <!-- OR Divider -->
                <div class="flex items-center justify-center">
                    <div class="w-full border-t border-gray-300"></div>
                    <span class="mx-2 text-gray-400">أو</span>
                    <div class="w-full border-t border-gray-300"></div>
                </div>

                <!-- Google Sign In -->
                <button type="button"
                    class="w-full flex items-center justify-center gap-2 py-3 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100 transition">
                    <img src="https://www.svgrepo.com/show/355037/google.svg" alt="google" class="w-5 h-5">
                      {{__('messages.sign in with gmail')}}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
