<div
    x-data="{ 
        show: false, 
        message: '', 
        type: 'success' 
    }"
    x-init="
        @if (session()->has('success'))
            show = true; message = '{{ session('success') }}'; type = 'success';
            setTimeout(() => show = false, 5000);
        @elseif (session()->has('error'))
            show = true; message = '{{ session('error') }}'; type = 'error';
            setTimeout(() => show = false, 5000);
        @endif
    "
    x-show="show"
    x-transition:enter="transform ease-out duration-300 transition"
    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-5 right-5 z-[100] w-full max-w-sm"
    style="display: none;"
>
    <div :class="{
            'bg-emerald-500 shadow-emerald-200 dark:shadow-none': type === 'success',
            'bg-red-500 shadow-red-200 dark:shadow-none': type === 'error'
         }" 
         class="rounded-2xl shadow-2xl p-4 text-white flex items-start gap-4 border border-white/20 backdrop-blur-lg">
        
        <template x-if="type === 'success'">
            <div class="bg-white/20 p-2 rounded-xl">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </div>
        </template>

        <template x-if="type === 'error'">
            <div class="bg-white/20 p-2 rounded-xl">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
        </template>

        <div class="flex-1">
            <p class="font-black text-sm uppercase tracking-wider" x-text="type === 'success' ? 'Berhasil' : 'Kesalahan'"></p>
            <p class="text-sm opacity-90 font-medium" x-text="message"></p>
        </div>

        <button @click="show = false" class="text-white/50 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
</div>