<x-app-layout>

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8 ">

            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"  />

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-4" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="flex flex-col items-center mb-6 relative">
                    <!-- Hidden File Input -->
                    <input type="file" name="image" id="profileImageInput" class="hidden" />
                
                    <!-- Profile Image -->
                    <img src="{{ $user->profile_image }}" 
                        alt="صورة بروفايل" 
                        class="w-24 h-24 rounded-full object-cover shadow-md">
                
                    <!-- Edit Icon under the image to the right -->
                    
                    <div class="w-24 flex justify-end mt-0 -mb-3 pr-2 ">
                        <label for="profileImageInput" class="bg-white p-1 rounded-full shadow-md cursor-pointer">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.7583 3.36875C15.0833 3.04375 15.0833 2.50208 14.7583 2.19375L12.8083 0.24375C12.5 -0.08125 11.9583 -0.08125 11.6333 0.24375L10.1 1.76875L13.225 4.89375M0 11.8771V15.0021H3.125L12.3417 5.77708L9.21667 2.65208L0 11.8771Z" fill="#1B3764"/>
                            </svg>
                        </label>
                    </div>
                </div>
                    <!-- Name -->
                    <label class="block text-sm text-gray-600 mb-1" for="password">{{__('messages.name')}}</label>
                    <input type="text" id="name" name="name" placeholder="سارة محمد فتح الله عبدالمقصود"
                        value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <!-- Email -->
                    <label class="block text-sm text-gray-600 mb-1" for="password">{{__('messages.email')}}</label>

                    <input type="email" id="email" name="email" placeholder="sarahmohamed@gmail.com"
                        value="{{ old('email', $user->email) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400">
                       
                        <label class="block text-sm text-gray-600 mb-1" for="password">{{__('messages.bio')}}</label>
                        <input type="text" id="bio" name="bio" 
                        value="{{ old('bio', $user->bio) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400">

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
                    {{__('messages.save changes')}}
                </button>





            </form>
        </div>
    </div>
</x-app-layout>
