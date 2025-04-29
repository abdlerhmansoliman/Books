<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 " :status="session('status')" />
{{--  --}}
    <div class="min-h-screen flex items-center justify-center ">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8 ">

            <h2 class="text-2xl font-bold text-[#1B3764] mb-6 text-center"> {{__('messages.login')}}</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm text-gray-600 mb-1" for="email">{{__('messages.email address')}} </label>
                    <input type="email" id="email" name="email" placeholder="sarahmohamed@gmail.com"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1" for="password">{{__('messages.password')}} </label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-full  focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>

                <!-- Forgot Password -->
                <div class="text-sm text-blue-600 cursor-pointer hover:underline">{{__('messages.forget password')}} </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 bg-[#1B3764] text-white font-semibold rounded-full hover:bg-[#152c52] transition">
                    {{__('messages.login')}}                </button>


                <!-- Google Sign In -->
                <button type="button"
                    class="w-full flex items-center justify-center gap-2 py-3 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100 transition">
                    <img src="https://www.svgrepo.com/show/355037/google.svg" alt="google" class="w-5 h-5">
                {{__('messages.sign in with gmail')}}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
