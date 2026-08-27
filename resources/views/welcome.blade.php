<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jannati Akter — Senior Full-Stack Engineer & Architect</title>
        <meta name="description" content="Portfolio of Jannati Akter, a Senior Full-Stack Engineer specializing in Laravel, Livewire, Tailwind CSS, Vue/React, and Cloud Architectures.">

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        @fonts

        <!-- Theme Initialization Script -->
        <script>
            (function() {
                const savedTheme = localStorage.getItem('theme');
                if (savedTheme === 'light') {
                    document.documentElement.classList.remove('dark');
                } else if (savedTheme === 'dark' || window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            })();

            function toggleTheme() {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            }
        </script>

        <!-- Compiled Vite Assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance
        @livewireStyles
    </head>
    <body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-sans antialiased min-h-screen selection:bg-orange-500 selection:text-white relative overflow-x-hidden transition-colors duration-300">

        <!-- Ambient Ambient Background Glow Effects -->
        <div class="ambient-glow bg-orange-400 dark:bg-orange-600 w-96 h-96 -top-20 -left-20 opacity-20 dark:opacity-25"></div>
        <div class="ambient-glow bg-amber-400 dark:bg-amber-500 w-[30rem] h-[30rem] top-1/3 -right-32 opacity-20 dark:opacity-25"></div>
        <div class="ambient-glow bg-indigo-400 dark:bg-indigo-600 w-96 h-96 top-2/3 -left-32 opacity-20 dark:opacity-25"></div>

        <!-- Sticky Glassmorphic Header Navigation -->
        <header class="fixed top-0 inset-x-0 z-50 glass-nav bg-white/80 dark:bg-zinc-950/70 border-b border-zinc-200/80 dark:border-zinc-800/60 transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                
                <!-- Logo -->
                <a href="#hero" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-orange-500 to-amber-400 p-0.5 shadow-lg shadow-orange-500/20 group-hover:scale-105 transition-transform">
                        <div class="w-full h-full bg-white dark:bg-zinc-950 rounded-[10px] flex items-center justify-center font-bold text-transparent bg-clip-text bg-gradient-to-tr from-orange-500 to-amber-400 text-lg">
                            JA
                        </div>
                    </div>
                    <div>
                        <span class="font-bold text-zinc-900 dark:text-zinc-100 tracking-tight text-base block group-hover:text-orange-500 transition-colors">Jannati Akter</span>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400 block font-medium">Software Architect</span>
                    </div>
                </a>

                <!-- Nav Links -->
                <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-zinc-600 dark:text-zinc-300">
                    <a href="#about" class="hover:text-orange-500 dark:hover:text-orange-400 transition-colors">About</a>
                    <a href="#skills" class="hover:text-orange-500 dark:hover:text-orange-400 transition-colors">Skills</a>
                    <a href="#projects" class="hover:text-orange-500 dark:hover:text-orange-400 transition-colors">Projects</a>
                    <a href="#experience" class="hover:text-orange-500 dark:hover:text-orange-400 transition-colors">Experience</a>
                    <a href="#contact" class="hover:text-orange-500 dark:hover:text-orange-400 transition-colors">Contact</a>
                </nav>

                <!-- Right Action Bar: Theme Switcher & Auth -->
                <div class="flex items-center space-x-3">
                    
                    <!-- Dark / Light Mode Toggle Button -->
                    <button 
                        onclick="toggleTheme()" 
                        type="button"
                        aria-label="Toggle Dark / Light Mode"
                        class="p-2.5 rounded-xl border border-zinc-200 dark:border-zinc-800 bg-zinc-100 dark:bg-zinc-900 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-200 dark:hover:bg-zinc-800 transition-all focus:outline-none focus:ring-2 focus:ring-orange-500"
                    >
                        <!-- Sun Icon (shown in Dark Mode to switch to Light) -->
                        <svg class="w-5 h-5 hidden dark:block text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <!-- Moon Icon (shown in Light Mode to switch to Dark) -->
                        <svg class="w-5 h-5 block dark:hidden text-zinc-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                    </button>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="px-4 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-xs sm:text-sm font-semibold shadow-lg shadow-orange-500/25 transition-all">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-3.5 py-2.5 rounded-xl text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-200/60 dark:hover:bg-zinc-800/60 text-xs sm:text-sm font-medium transition-all">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-xs sm:text-sm font-semibold shadow-lg shadow-orange-500/20 transition-all">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <!-- Main Content Wrapper -->
        <main class="pt-28 pb-20 space-y-32">

            <!-- Hero Section -->
            <section id="hero" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 sm:pt-16">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left Hero Content -->
                    <div class="lg:col-span-7 space-y-8">
                        
                        <!-- Status Badge -->
                        <div class="inline-flex items-center space-x-2.5 px-4 py-2 rounded-full bg-white dark:bg-zinc-900/80 border border-zinc-200 dark:border-zinc-800 backdrop-blur-md shadow-sm">
                            <span class="relative flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                            </span>
                            <span class="text-xs font-semibold text-zinc-700 dark:text-zinc-300 uppercase tracking-wider">Available for new opportunities</span>
                        </div>

                        <!-- Main Headline -->
                        <div class="space-y-4">
                            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-zinc-900 dark:text-white leading-[1.1]">
                                Crafting High-Impact <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-amber-600 dark:from-orange-400 dark:via-amber-300 dark:to-amber-500">
                                    Web Developer
                                </span>
                            </h1>
                            <p class="text-lg sm:text-xl text-zinc-600 dark:text-zinc-400 max-w-2xl font-normal leading-relaxed">
                                I am a Senior Full-Stack Engineer with 6+ years of expertise architecting scalable Laravel applications, real-time Livewire interfaces, dynamic APIs, and modern frontend ecosystems.
                            </p>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="flex flex-wrap items-center gap-4 pt-2">
                            <a href="#contact" class="px-7 py-3.5 rounded-2xl bg-orange-500 hover:bg-orange-600 text-white font-semibold text-sm shadow-xl shadow-orange-500/25 hover:shadow-orange-500/40 hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                                <span>Get In Touch</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                            <a href="#projects" class="px-7 py-3.5 rounded-2xl bg-white dark:bg-zinc-900 hover:bg-zinc-100 dark:hover:bg-zinc-800 text-zinc-800 dark:text-zinc-200 border border-zinc-200 dark:border-zinc-800 font-semibold text-sm hover:-translate-y-0.5 transition-all duration-200 shadow-sm">
                                View Projects
                            </a>
                        </div>

                        <!-- Social Icons -->
                        <div class="pt-4 flex items-center space-x-6 text-zinc-500 dark:text-zinc-400">
                            <span class="text-xs font-semibold uppercase tracking-widest text-zinc-400 dark:text-zinc-500">Connect:</span>
                            <a href="https://github.com" target="_blank" class="hover:text-zinc-900 dark:hover:text-white transition-colors" title="GitHub">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
                                </svg>
                            </a>
                            <a href="https://linkedin.com" target="_blank" class="hover:text-zinc-900 dark:hover:text-white transition-colors" title="LinkedIn">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                            <a href="mailto:jannati.akter@example.com" class="hover:text-zinc-900 dark:hover:text-white transition-colors" title="Email">
                                <svg class="w-5 h-5 fill-none stroke-current" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Right Profile Image Card -->
                    <div class="lg:col-span-5 flex justify-center">
                        <div class="relative group w-full max-w-md">
                            <!-- Glowing gradient ring -->
                            <div class="absolute -inset-1 rounded-3xl bg-gradient-to-r from-orange-500 to-amber-500 opacity-30 group-hover:opacity-60 blur-xl transition-all duration-500"></div>
                            
                            <div class="relative rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-4 shadow-xl overflow-hidden">
                                <img 
                                    src="/images/avatar.jpg" 
                                    alt="Jannati Akter Portrait" 
                                    class="w-full h-[400px] object-cover rounded-2xl group-hover:scale-105 transition-transform duration-500"
                                >
                                <div class="absolute bottom-6 inset-x-8 p-4 rounded-xl glass-nav bg-white/90 dark:bg-zinc-950/80 border border-zinc-200 dark:border-zinc-800/80 backdrop-blur-md shadow-lg">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-xs font-semibold text-orange-600 dark:text-orange-400">Based in San Francisco, CA</p>
                                            <p class="text-sm font-semibold text-zinc-900 dark:text-white">Full-Stack Architect</p>
                                        </div>
                                        <div class="px-2.5 py-1 rounded-lg bg-orange-500/10 text-orange-600 dark:text-orange-400 text-xs font-bold border border-orange-500/20">
                                            Laravel 13
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Metrics Bar -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-8 rounded-3xl bg-white/80 dark:bg-zinc-900/60 border border-zinc-200/80 dark:border-zinc-800/80 backdrop-blur-md shadow-sm">
                    <div class="space-y-1 text-center sm:text-left">
                        <p class="text-3xl sm:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-500 dark:from-orange-400 dark:to-amber-300">6+ Years</p>
                        <p class="text-xs sm:text-sm font-medium text-zinc-600 dark:text-zinc-400">Professional Experience</p>
                    </div>
                    <div class="space-y-1 text-center sm:text-left">
                        <p class="text-3xl sm:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-500 dark:from-orange-400 dark:to-amber-300">30+ Apps</p>
                        <p class="text-xs sm:text-sm font-medium text-zinc-600 dark:text-zinc-400">Shipped to Production</p>
                    </div>
                    <div class="space-y-1 text-center sm:text-left">
                        <p class="text-3xl sm:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-500 dark:from-orange-400 dark:to-amber-300">99.9%</p>
                        <p class="text-xs sm:text-sm font-medium text-zinc-600 dark:text-zinc-400">System Uptime Record</p>
                    </div>
                    <div class="space-y-1 text-center sm:text-left">
                        <p class="text-3xl sm:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-500 dark:from-orange-400 dark:to-amber-300">15+ OSS</p>
                        <p class="text-xs sm:text-sm font-medium text-zinc-600 dark:text-zinc-400">Packages Contributed</p>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section id="about" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <div class="text-center max-w-3xl mx-auto space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-orange-600 dark:text-orange-400">About Me</h2>
                    <p class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white tracking-tight">Passionate about clean code, high performance & intuitive UI</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800/80 hover:border-zinc-300 dark:hover:border-zinc-700 transition-all shadow-sm space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-orange-500/10 border border-orange-500/20 flex items-center justify-center text-orange-600 dark:text-orange-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-zinc-900 dark:text-white">Full-Stack Architecture</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Building resilient backend systems with PHP/Laravel, PostgreSQL/MySQL, Redis caching, and real-time reactive frontends using Livewire & Inertia.
                        </p>
                    </div>

                    <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800/80 hover:border-zinc-300 dark:hover:border-zinc-700 transition-all shadow-sm space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-600 dark:text-amber-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-zinc-900 dark:text-white">Design Systems & UI</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Crafting pixel-perfect dark modes, responsive layouts with Tailwind CSS, Flux UI components, and accessible micro-animations.
                        </p>
                    </div>

                    <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800/80 hover:border-zinc-300 dark:hover:border-zinc-700 transition-all shadow-sm space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-600 dark:text-indigo-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-zinc-900 dark:text-white">Cloud & DevOps</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Deploying robust applications using Docker, Laravel Forge, Vapor, AWS, CI/CD pipelines, and automated zero-downtime releases.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Skills Matrix Section -->
            <section id="skills" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <div class="text-center max-w-3xl mx-auto space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-orange-600 dark:text-orange-400">Skills & Technical Stack</h2>
                    <p class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white tracking-tight">Technologies I work with daily</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <!-- Backend -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/40 border border-zinc-200 dark:border-zinc-800/80 shadow-sm space-y-4">
                        <h3 class="text-base font-bold text-zinc-900 dark:text-white flex items-center space-x-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>
                            <span>Backend Tech</span>
                        </h3>
                        <div class="flex flex-wrap gap-2 pt-2">
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">PHP 8.3+</span>
                            <span class="px-3 py-1.5 rounded-xl bg-orange-500/10 text-orange-600 dark:text-orange-400 border border-orange-500/20 text-xs font-semibold">Laravel 13</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Livewire 4</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">REST & GraphQL</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Node.js</span>
                        </div>
                    </div>

                    <!-- Frontend -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/40 border border-zinc-200 dark:border-zinc-800/80 shadow-sm space-y-4">
                        <h3 class="text-base font-bold text-zinc-900 dark:text-white flex items-center space-x-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                            <span>Frontend Tech</span>
                        </h3>
                        <div class="flex flex-wrap gap-2 pt-2">
                            <span class="px-3 py-1.5 rounded-xl bg-amber-500/10 text-amber-600 dark:text-amber-300 border border-amber-500/20 text-xs font-semibold">Tailwind CSS v4</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Vite 8</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Alpine.js</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Vue 3 / React</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">TypeScript</span>
                        </div>
                    </div>

                    <!-- Databases -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/40 border border-zinc-200 dark:border-zinc-800/80 shadow-sm space-y-4">
                        <h3 class="text-base font-bold text-zinc-900 dark:text-white flex items-center space-x-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                            <span>Databases & Storage</span>
                        </h3>
                        <div class="flex flex-wrap gap-2 pt-2">
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">PostgreSQL</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">MySQL</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">SQLite</span>
                            <span class="px-3 py-1.5 rounded-xl bg-blue-500/10 text-blue-600 dark:text-blue-400 border border-blue-500/20 text-xs font-semibold">Redis</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Meilisearch</span>
                        </div>
                    </div>

                    <!-- Tools & DevOps -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/40 border border-zinc-200 dark:border-zinc-800/80 shadow-sm space-y-4">
                        <h3 class="text-base font-bold text-zinc-900 dark:text-white flex items-center space-x-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            <span>DevOps & Tools</span>
                        </h3>
                        <div class="flex flex-wrap gap-2 pt-2">
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Docker</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Git / GitHub Actions</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Laravel Forge</span>
                            <span class="px-3 py-1.5 rounded-xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 text-xs font-semibold">AWS / S3</span>
                            <span class="px-3 py-1.5 rounded-xl bg-zinc-100 dark:bg-zinc-800/80 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Pest / PHPUnit</span>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Projects Showcase Section -->
            <section id="projects" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                    <div class="space-y-4 max-w-2xl">
                        <h2 class="text-xs font-bold uppercase tracking-widest text-orange-600 dark:text-orange-400">Featured Work</h2>
                        <p class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white tracking-tight">Recent projects & applications</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <!-- Project 1 Card -->
                    <div class="group rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 overflow-hidden hover:border-zinc-300 dark:hover:border-zinc-700 transition-all duration-300 shadow-lg flex flex-col">
                        <div class="overflow-hidden relative h-64 bg-zinc-100 dark:bg-zinc-950">
                            <img 
                                src="/images/project1.jpg" 
                                alt="Analytics SaaS App" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            >
                            <div class="absolute top-4 right-4 px-3 py-1 rounded-full bg-white/90 dark:bg-zinc-950/80 border border-zinc-200 dark:border-zinc-800 backdrop-blur-md text-xs font-semibold text-orange-600 dark:text-orange-400 shadow-sm">
                                SaaS Platform
                            </div>
                        </div>
                        <div class="p-8 space-y-4 flex-1 flex flex-col justify-between">
                            <div class="space-y-2">
                                <h3 class="text-2xl font-bold text-zinc-900 dark:text-white group-hover:text-orange-500 dark:group-hover:text-orange-400 transition-colors">
                                    AppAnalytics Dashboard
                                </h3>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                                    A real-time data analytics dashboard offering live user activity monitoring, revenue metrics, conversion funnel charts, and custom report exports.
                                </p>
                            </div>

                            <div class="space-y-6 pt-4">
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-3 py-1 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 text-xs font-medium">Laravel 13</span>
                                    <span class="px-3 py-1 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 text-xs font-medium">Livewire 4</span>
                                    <span class="px-3 py-1 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 text-xs font-medium">Tailwind CSS</span>
                                    <span class="px-3 py-1 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 text-xs font-medium">Chart.js</span>
                                </div>

                                <div class="flex items-center space-x-4 pt-2 border-t border-zinc-200 dark:border-zinc-800">
                                    <a href="#" class="inline-flex items-center space-x-2 text-sm font-semibold text-orange-600 dark:text-orange-400 hover:text-orange-500 transition-colors">
                                        <span>Live Demo</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="inline-flex items-center space-x-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">
                                        <span>Source Code</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project 2 Card -->
                    <div class="group rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 overflow-hidden hover:border-zinc-300 dark:hover:border-zinc-700 transition-all duration-300 shadow-lg flex flex-col">
                        <div class="overflow-hidden relative h-64 bg-zinc-100 dark:bg-zinc-950">
                            <img 
                                src="/images/project2.jpg" 
                                alt="Apex Cart E-Commerce" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            >
                            <div class="absolute top-4 right-4 px-3 py-1 rounded-full bg-white/90 dark:bg-zinc-950/80 border border-zinc-200 dark:border-zinc-800 backdrop-blur-md text-xs font-semibold text-amber-600 dark:text-amber-400 shadow-sm">
                                E-Commerce Store
                            </div>
                        </div>
                        <div class="p-8 space-y-4 flex-1 flex flex-col justify-between">
                            <div class="space-y-2">
                                <h3 class="text-2xl font-bold text-zinc-900 dark:text-white group-hover:text-amber-500 dark:group-hover:text-amber-400 transition-colors">
                                    Apex Cart Storefront
                                </h3>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                                    Full-featured e-commerce checkout solution featuring dynamic cart sidebars, stripe payment gateway integration, order tracking, and inventory management.
                                </p>
                            </div>

                            <div class="space-y-6 pt-4">
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-3 py-1 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 text-xs font-medium">Laravel Fortify</span>
                                    <span class="px-3 py-1 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 text-xs font-medium">Alpine.js</span>
                                    <span class="px-3 py-1 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 text-xs font-medium">Stripe API</span>
                                    <span class="px-3 py-1 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 text-xs font-medium">PostgreSQL</span>
                                </div>

                                <div class="flex items-center space-x-4 pt-2 border-t border-zinc-200 dark:border-zinc-800">
                                    <a href="#" class="inline-flex items-center space-x-2 text-sm font-semibold text-amber-600 dark:text-amber-400 hover:text-amber-500 transition-colors">
                                        <span>Live Demo</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="inline-flex items-center space-x-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">
                                        <span>Source Code</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Experience Timeline Section -->
            <section id="experience" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <div class="text-center max-w-3xl mx-auto space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-orange-600 dark:text-orange-400">Career & Milestones</h2>
                    <p class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white tracking-tight">Work Experience</p>
                </div>

                <div class="max-w-4xl mx-auto space-y-8 relative before:absolute before:inset-0 before:left-8 sm:before:left-1/2 before:w-0.5 before:bg-zinc-200 dark:before:bg-zinc-800">
                    
                    <!-- Timeline Item 1 -->
                    <div class="relative flex flex-col sm:flex-row items-start sm:items-center group">
                        <div class="flex items-center justify-start sm:justify-end w-full sm:w-1/2 pr-0 sm:pr-12 pl-16 sm:pl-0 mb-2 sm:mb-0">
                            <div class="text-left sm:text-right space-y-1">
                                <span class="px-3 py-1 rounded-full bg-orange-500/10 text-orange-600 dark:text-orange-400 border border-orange-500/20 text-xs font-bold">2023 — Present</span>
                                <h3 class="text-lg font-bold text-zinc-900 dark:text-white">Lead Full-Stack Architect</h3>
                                <p class="text-xs text-zinc-500 dark:text-zinc-400 font-medium">TechScale Solutions Inc.</p>
                            </div>
                        </div>
                        <div class="absolute left-6 sm:left-1/2 -translate-x-1/2 w-5 h-5 rounded-full bg-white dark:bg-zinc-950 border-4 border-orange-500 z-10"></div>
                        <div class="w-full sm:w-1/2 pl-16 sm:pl-12">
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed bg-white dark:bg-zinc-900/60 p-6 rounded-2xl border border-zinc-200 dark:border-zinc-800 shadow-sm">
                                Leading a team of 8 engineers building high-traffic enterprise Laravel web applications, reducing server query latency by 45% using Redis caching and optimized Eloquent queries.
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="relative flex flex-col sm:flex-row items-start sm:items-center group">
                        <div class="w-full sm:w-1/2 pr-0 sm:pr-12 pl-16 sm:pl-0 mb-2 sm:mb-0 sm:order-2">
                            <div class="text-left space-y-1 sm:pl-12">
                                <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20 text-xs font-bold">2021 — 2023</span>
                                <h3 class="text-lg font-bold text-zinc-900 dark:text-white">Senior Laravel & Vue Developer</h3>
                                <p class="text-xs text-zinc-500 dark:text-zinc-400 font-medium">CloudPulse Systems</p>
                            </div>
                        </div>
                        <div class="absolute left-6 sm:left-1/2 -translate-x-1/2 w-5 h-5 rounded-full bg-white dark:bg-zinc-950 border-4 border-amber-500 z-10"></div>
                        <div class="w-full sm:w-1/2 pl-16 sm:pl-0 sm:pr-12 sm:order-1">
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed bg-white dark:bg-zinc-900/60 p-6 rounded-2xl border border-zinc-200 dark:border-zinc-800 shadow-sm">
                                Designed real-time web socket dashboards and RESTful API integrations for over 200,000 active monthly SaaS subscribers.
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="relative flex flex-col sm:flex-row items-start sm:items-center group">
                        <div class="flex items-center justify-start sm:justify-end w-full sm:w-1/2 pr-0 sm:pr-12 pl-16 sm:pl-0 mb-2 sm:mb-0">
                            <div class="text-left sm:text-right space-y-1">
                                <span class="px-3 py-1 rounded-full bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-500/20 text-xs font-bold">2019 — 2021</span>
                                <h3 class="text-lg font-bold text-zinc-900 dark:text-white">Full-Stack Web Developer</h3>
                                <p class="text-xs text-zinc-500 dark:text-zinc-400 font-medium">Digital Craft Studio</p>
                            </div>
                        </div>
                        <div class="absolute left-6 sm:left-1/2 -translate-x-1/2 w-5 h-5 rounded-full bg-white dark:bg-zinc-950 border-4 border-indigo-500 z-10"></div>
                        <div class="w-full sm:w-1/2 pl-16 sm:pl-12">
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed bg-white dark:bg-zinc-900/60 p-6 rounded-2xl border border-zinc-200 dark:border-zinc-800 shadow-sm">
                                Developed custom web applications, e-commerce stores, and CMS solutions for clients across healthcare, finance, and tech startup industries.
                            </p>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Interactive Contact Section -->
            <section id="contact" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 p-8 sm:p-12 rounded-3xl bg-white dark:bg-zinc-900/70 border border-zinc-200 dark:border-zinc-800/80 backdrop-blur-xl shadow-xl">
                    
                    <div class="lg:col-span-5 space-y-6">
                        <div class="space-y-3">
                            <h2 class="text-xs font-bold uppercase tracking-widest text-orange-600 dark:text-orange-400">Get In Touch</h2>
                            <h3 class="text-3xl font-extrabold text-zinc-900 dark:text-white tracking-tight">Let's build something remarkable together</h3>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                                Have a new project idea, contract opportunity, or technical inquiry? Send a message and I'll respond within 24 hours.
                            </p>
                        </div>

                        <div class="space-y-4 pt-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-orange-600 dark:text-orange-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-zinc-500">Email Me</p>
                                    <a href="mailto:jannati.akter@example.com" class="text-sm font-semibold text-zinc-800 dark:text-zinc-200 hover:text-orange-500 transition-colors">jannati.akter@example.com</a>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-amber-600 dark:text-amber-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-zinc-500">Location</p>
                                    <p class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">San Francisco, California, US</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Livewire Contact Component -->
                    <div class="lg:col-span-7 bg-zinc-50 dark:bg-zinc-950/60 p-6 sm:p-8 rounded-2xl border border-zinc-200 dark:border-zinc-800/80 shadow-inner">
                        @livewire('contact-form')
                    </div>

                </div>
            </section>

        </main>

        <!-- Footer -->
        <footer class="border-t border-zinc-200 dark:border-zinc-800/60 bg-white dark:bg-zinc-950 py-12 transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-600 dark:text-orange-400 flex items-center justify-center font-bold text-xs">
                        JA
                    </div>
                    <p class="text-xs text-zinc-500 font-medium">
                        © {{ date('Y') }} Jannati Akter. Built with Laravel 13, Livewire 4 & Tailwind CSS.
                    </p>
                </div>

                <div class="flex items-center space-x-6 text-xs text-zinc-500 dark:text-zinc-400">
                    <a href="#hero" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Back to Top ↑</a>
                </div>
            </div>
        </footer>

        @livewireScripts
        @fluxScripts
    </body>
</html>
