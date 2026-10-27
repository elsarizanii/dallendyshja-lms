<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- scrum-212 test --}}
        <h1>this is the dashboard</h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're absolutely logggggggggggggged in!") }}
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        console.log("Remember Me works! You are authenticated.");
        console.log("Check DevTools -> Application -> Cookies to see the 'remember_web_...' cookie.");
    });
</script>
</x-app-layout>
