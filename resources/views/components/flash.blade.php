@if (session()->has('success'))
    <div x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="fixed right-3 text-sm bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif