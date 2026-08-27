<div class="w-full">
    @if ($submitted)
        <div class="p-6 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-center flex flex-col items-center justify-center space-y-3 transition-all duration-300">
            <div class="w-12 h-12 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h4 class="text-xl font-semibold">Thank you for reaching out!</h4>
            <p class="text-sm opacity-90">Your message has been received. I will get back to you as soon as possible.</p>
            <button 
                wire:click="$set('submitted', false)"
                class="mt-2 text-xs font-medium underline underline-offset-4 opacity-80 hover:opacity-100 transition-opacity"
            >
                Send another message
            </button>
        </div>
    @else
        <form wire:submit.prevent="submit" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-xs font-semibold text-zinc-600 dark:text-zinc-400 uppercase tracking-wider mb-1.5">
                        Your Name
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        wire:model="name"
                        placeholder="John Doe" 
                        class="w-full px-4 py-3 rounded-xl bg-zinc-100 dark:bg-zinc-800/60 border border-zinc-200 dark:border-zinc-700/60 text-zinc-900 dark:text-zinc-100 placeholder-zinc-400 dark:placeholder-zinc-500 text-sm focus:outline-none focus:ring-2 focus:ring-accent transition-all"
                    >
                    @error('name') 
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold text-zinc-600 dark:text-zinc-400 uppercase tracking-wider mb-1.5">
                        Email Address
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        wire:model="email"
                        placeholder="john@example.com" 
                        class="w-full px-4 py-3 rounded-xl bg-zinc-100 dark:bg-zinc-800/60 border border-zinc-200 dark:border-zinc-700/60 text-zinc-900 dark:text-zinc-100 placeholder-zinc-400 dark:placeholder-zinc-500 text-sm focus:outline-none focus:ring-2 focus:ring-accent transition-all"
                    >
                    @error('email') 
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <div>
                <label for="subject" class="block text-xs font-semibold text-zinc-600 dark:text-zinc-400 uppercase tracking-wider mb-1.5">
                    Subject
                </label>
                <input 
                    type="text" 
                    id="subject" 
                    wire:model="subject"
                    placeholder="Project Inquiry / Collaboration" 
                    class="w-full px-4 py-3 rounded-xl bg-zinc-100 dark:bg-zinc-800/60 border border-zinc-200 dark:border-zinc-700/60 text-zinc-900 dark:text-zinc-100 placeholder-zinc-400 dark:placeholder-zinc-500 text-sm focus:outline-none focus:ring-2 focus:ring-accent transition-all"
                >
                @error('subject') 
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                @enderror
            </div>

            <div>
                <label for="message" class="block text-xs font-semibold text-zinc-600 dark:text-zinc-400 uppercase tracking-wider mb-1.5">
                    Message
                </label>
                <textarea 
                    id="message" 
                    rows="4" 
                    wire:model="message"
                    placeholder="Tell me about your project, timeline, or idea..." 
                    class="w-full px-4 py-3 rounded-xl bg-zinc-100 dark:bg-zinc-800/60 border border-zinc-200 dark:border-zinc-700/60 text-zinc-900 dark:text-zinc-100 placeholder-zinc-400 dark:placeholder-zinc-500 text-sm focus:outline-none focus:ring-2 focus:ring-accent transition-all resize-none"
                ></textarea>
                @error('message') 
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                @enderror
            </div>

            <button 
                type="submit"
                wire:loading.attr="disabled"
                class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-zinc-900 hover:bg-zinc-800 dark:bg-zinc-100 dark:hover:bg-white text-zinc-100 dark:text-zinc-900 font-semibold text-sm shadow-lg shadow-zinc-900/10 dark:shadow-zinc-100/10 hover:shadow-xl transition-all duration-200 flex items-center justify-center space-x-2 disabled:opacity-50"
            >
                <span wire:loading.remove>Send Message</span>
                <span wire:loading class="flex items-center space-x-2">
                    <svg class="animate-spin h-4 w-4 text-current" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Sending...</span>
                </span>
                <svg wire:loading.remove class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>
        </form>
    @endif
</div>
