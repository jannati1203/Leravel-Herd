<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resume & Professional Services — Jannati Akter</title>
        <meta name="description" content="Detailed executive CV, technical certifications, and software architecture services offered by Jannati Akter.">

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

        <!-- Ambient Background Glow Effects -->
        <div class="ambient-glow bg-orange-400 dark:bg-orange-600 w-96 h-96 -top-20 -left-20 opacity-20 dark:opacity-25"></div>
        <div class="ambient-glow bg-amber-400 dark:bg-amber-500 w-[30rem] h-[30rem] top-1/3 -right-32 opacity-20 dark:opacity-25"></div>
        <div class="ambient-glow bg-indigo-400 dark:bg-indigo-600 w-96 h-96 top-2/3 -left-32 opacity-20 dark:opacity-25"></div>

        <!-- Sticky Glassmorphic Header Navigation -->
        <header class="fixed top-0 inset-x-0 z-50 glass-nav bg-white/80 dark:bg-zinc-950/70 border-b border-zinc-200/80 dark:border-zinc-800/60 transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
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
                    <a href="{{ route('home') }}" class="hover:text-orange-500 dark:hover:text-orange-400 transition-colors">Home</a>
                    <a href="{{ route('home') }}#about" class="hover:text-orange-500 dark:hover:text-orange-400 transition-colors">About</a>
                    <a href="{{ route('home') }}#skills" class="hover:text-orange-500 dark:hover:text-orange-400 transition-colors">Skills</a>
                    <a href="{{ route('home') }}#projects" class="hover:text-orange-500 dark:hover:text-orange-400 transition-colors">Projects</a>
                    <a href="{{ route('services') }}" class="px-3.5 py-1.5 rounded-xl bg-orange-500 text-white font-semibold shadow-md shadow-orange-500/20 transition-all">Resume & Services</a>
                    <a href="{{ route('home') }}#contact" class="hover:text-orange-500 dark:hover:text-orange-400 transition-colors">Contact</a>
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
                        <!-- Sun Icon -->
                        <svg class="w-5 h-5 hidden dark:block text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <!-- Moon Icon -->
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
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="pt-28 pb-20 space-y-28">

            <!-- Hero Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-12">
                <div class="text-center max-w-4xl mx-auto space-y-6">
                    <div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full bg-orange-500/10 border border-orange-500/20 text-orange-600 dark:text-orange-400 text-xs font-bold uppercase tracking-wider">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Executive CV & Architectural Services</span>
                    </div>

                    <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-zinc-900 dark:text-white leading-[1.15]">
                        High-Performance Engineering <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-amber-600 dark:from-orange-400 dark:via-amber-300 dark:to-amber-500">
                            & Consulting Services
                        </span>
                    </h1>

                    <p class="text-lg sm:text-xl text-zinc-600 dark:text-zinc-400 max-w-3xl mx-auto leading-relaxed font-normal">
                        Providing specialized software architecture, enterprise Laravel development, code audits, and cloud infrastructure consulting for ambitious technology teams and enterprises.
                    </p>

                    <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                        <a href="{{ route('home') }}#contact" class="px-7 py-3.5 rounded-2xl bg-orange-500 hover:bg-orange-600 text-white font-semibold text-sm shadow-xl shadow-orange-500/25 hover:shadow-orange-500/40 hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                            <span>Book Consultation</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                        <a href="mailto:jannati.akter@example.com" class="px-7 py-3.5 rounded-2xl bg-white dark:bg-zinc-900 hover:bg-zinc-100 dark:hover:bg-zinc-800 text-zinc-800 dark:text-zinc-200 border border-zinc-200 dark:border-zinc-800 font-semibold text-sm hover:-translate-y-0.5 transition-all duration-200 shadow-sm flex items-center space-x-2">
                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            <span>Download Full CV (PDF)</span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Professional Services Grid -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <div class="text-center max-w-3xl mx-auto space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-orange-600 dark:text-orange-400">Core Offerings</h2>
                    <p class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white tracking-tight">Services I Provide</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Service 1 -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900/60 border border-zinc-200 dark:border-zinc-800 hover:border-orange-500/40 transition-all shadow-md space-y-5 relative overflow-hidden group">
                        <div class="w-14 h-14 rounded-2xl bg-orange-500/10 border border-orange-500/20 flex items-center justify-center text-orange-600 dark:text-orange-400 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-zinc-900 dark:text-white">Full-Stack Application Development</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Custom web platforms built from the ground up using Laravel 13, Livewire 4, and Tailwind CSS. Tailored for high scalability, real-time interactivity, security, and seamless user experiences.
                        </p>
                        <ul class="space-y-2 pt-2 text-xs font-medium text-zinc-700 dark:text-zinc-300">
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>SaaS Multitenancy Platforms</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Real-time Livewire & WebSockets Interfaces</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>E-Commerce & Payment Gateway Systems</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Service 2 -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900/60 border border-zinc-200 dark:border-zinc-800 hover:border-amber-500/40 transition-all shadow-md space-y-5 relative overflow-hidden group">
                        <div class="w-14 h-14 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-600 dark:text-amber-400 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-zinc-900 dark:text-white">Codebase Audits & Performance Tuning</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Comprehensive code review and database query optimization. Identifying N+1 queries, memory bottlenecks, security vulnerabilities, and refactoring monolithic legacy PHP applications.
                        </p>
                        <ul class="space-y-2 pt-2 text-xs font-medium text-zinc-700 dark:text-zinc-300">
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Database Query & Index Optimization</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Redis Caching & Queue Worker Setup</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Security Vulnerability Analysis</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Service 3 -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900/60 border border-zinc-200 dark:border-zinc-800 hover:border-indigo-500/40 transition-all shadow-md space-y-5 relative overflow-hidden group">
                        <div class="w-14 h-14 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-600 dark:text-indigo-400 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-zinc-900 dark:text-white">API & Microservices Architecture</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Architecting resilient RESTful & GraphQL APIs with OAuth2/Sanctum authentication, rate limiting, OpenAPI specifications, and clean domain-driven architecture.
                        </p>
                        <ul class="space-y-2 pt-2 text-xs font-medium text-zinc-700 dark:text-zinc-300">
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>RESTful & GraphQL API Endpoints</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Stripe, PayPal & Third-Party Webhooks</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Domain-Driven Design (DDD) Refactoring</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Service 4 -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900/60 border border-zinc-200 dark:border-zinc-800 hover:border-emerald-500/40 transition-all shadow-md space-y-5 relative overflow-hidden group">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-600 dark:text-emerald-400 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 001-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-zinc-900 dark:text-white">Cloud Infrastructure & DevOps</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Setting up automated CI/CD pipelines, Docker containerization, AWS serverless deployments via Laravel Vapor, and zero-downtime provisioning via Laravel Forge.
                        </p>
                        <ul class="space-y-2 pt-2 text-xs font-medium text-zinc-700 dark:text-zinc-300">
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>AWS Cloud Deployment (EC2, S3, RDS)</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>GitHub Actions CI/CD Workflows</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>Docker Container Orchestration</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </section>

            <!-- Detailed Executive Resume Timeline -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <div class="text-center max-w-3xl mx-auto space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-orange-600 dark:text-orange-400">Detailed Work History</h2>
                    <p class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white tracking-tight">Executive Experience</p>
                </div>

                <div class="max-w-5xl mx-auto space-y-10">

                    <!-- Role 1 -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900/70 border border-zinc-200 dark:border-zinc-800 shadow-md space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-zinc-200 dark:border-zinc-800 pb-6">
                            <div>
                                <span class="px-3 py-1 rounded-full bg-orange-500/10 text-orange-600 dark:text-orange-400 border border-orange-500/20 text-xs font-bold">2023 — Present</span>
                                <h3 class="text-2xl font-bold text-zinc-900 dark:text-white pt-2">Lead Full-Stack Architect</h3>
                                <p class="text-sm font-semibold text-orange-600 dark:text-orange-400">TechScale Solutions Inc. — San Francisco, CA</p>
                            </div>
                            <div class="flex flex-wrap gap-2 sm:justify-end">
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Laravel 13</span>
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Livewire 4</span>
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Redis</span>
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">PostgreSQL</span>
                            </div>
                        </div>

                        <div class="space-y-4 text-sm text-zinc-600 dark:text-zinc-300 leading-relaxed">
                            <p>
                                Directing an engineering team of 8 developers responsible for building and scaling high-throughput enterprise SaaS applications processing over 5M API transactions daily.
                            </p>
                            <ul class="space-y-2 list-disc list-inside text-zinc-600 dark:text-zinc-400">
                                <li>Optimized Eloquent ORM database operations, reducing average query response time by 45% across core analytical dashboards.</li>
                                <li>Architected multi-tenant database strategy supporting seamless client isolation and dynamic subdomain routing.</li>
                                <li>Implemented automated CI/CD deployment pipelines using GitHub Actions, reducing release cycle deployment times from 40 mins to 4 mins.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Role 2 -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900/70 border border-zinc-200 dark:border-zinc-800 shadow-md space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-zinc-200 dark:border-zinc-800 pb-6">
                            <div>
                                <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20 text-xs font-bold">2021 — 2023</span>
                                <h3 class="text-2xl font-bold text-zinc-900 dark:text-white pt-2">Senior Laravel & Vue Developer</h3>
                                <p class="text-sm font-semibold text-amber-600 dark:text-amber-400">CloudPulse Systems — Austin, TX</p>
                            </div>
                            <div class="flex flex-wrap gap-2 sm:justify-end">
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Laravel</span>
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Vue 3</span>
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Tailwind CSS</span>
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">Docker</span>
                            </div>
                        </div>

                        <div class="space-y-4 text-sm text-zinc-600 dark:text-zinc-300 leading-relaxed">
                            <p>
                                Designed and maintained real-time websocket monitoring dashboards and RESTful API integrations serving over 200,000 active monthly subscribers.
                            </p>
                            <ul class="space-y-2 list-disc list-inside text-zinc-600 dark:text-zinc-400">
                                <li>Built event-driven Laravel Echo & Pusher real-time notification engine with zero latency drop under peak traffic spikes.</li>
                                <li>Refactored legacy monolithic controllers into clean action classes and invokable domain services.</li>
                                <li>Integrated Stripe Billing API with automated subscription tier upgrades, prorated billing, and webhook handlers.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Role 3 -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-zinc-900/70 border border-zinc-200 dark:border-zinc-800 shadow-md space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-zinc-200 dark:border-zinc-800 pb-6">
                            <div>
                                <span class="px-3 py-1 rounded-full bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-500/20 text-xs font-bold">2019 — 2021</span>
                                <h3 class="text-2xl font-bold text-zinc-900 dark:text-white pt-2">Full-Stack Web Developer</h3>
                                <p class="text-sm font-semibold text-indigo-600 dark:text-indigo-400">Digital Craft Studio — Remote</p>
                            </div>
                            <div class="flex flex-wrap gap-2 sm:justify-end">
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">PHP / MySQL</span>
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">JavaScript</span>
                                <span class="px-3 py-1 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200 text-xs font-medium">REST APIs</span>
                            </div>
                        </div>

                        <div class="space-y-4 text-sm text-zinc-600 dark:text-zinc-300 leading-relaxed">
                            <p>
                                Developed tailored web applications, custom e-commerce stores, and high-performance CMS platforms for fintech and healthcare clients.
                            </p>
                            <ul class="space-y-2 list-disc list-inside text-zinc-600 dark:text-zinc-400">
                                <li>Delivered 25+ successful client projects on time and within budget specifications.</li>
                                <li>Established standard frontend coding guidelines and component UI libraries across agency developers.</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Certifications & Qualifications Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <div class="text-center max-w-3xl mx-auto space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-orange-600 dark:text-orange-400">Verified Credentials</h2>
                    <p class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white tracking-tight">Certifications & Expertise</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 text-center space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-orange-500/10 text-orange-600 dark:text-orange-400 flex items-center justify-center mx-auto">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </div>
                        <h4 class="font-bold text-zinc-900 dark:text-white">AWS Solutions Architect</h4>
                        <p class="text-xs text-zinc-500">Amazon Web Services (Certified 2024)</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 text-center space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 dark:text-amber-400 flex items-center justify-center mx-auto">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <h4 class="font-bold text-zinc-900 dark:text-white">Certified Laravel Developer</h4>
                        <p class="text-xs text-zinc-500">Laravel Certification (Official)</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 text-center space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center mx-auto">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <h4 class="font-bold text-zinc-900 dark:text-white">B.Sc. Computer Science</h4>
                        <p class="text-xs text-zinc-500">University Honors Graduate</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 text-center space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mx-auto">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h4 class="font-bold text-zinc-900 dark:text-white">Scrum Master (PSM I)</h4>
                        <p class="text-xs text-zinc-500">Scrum.org Certified</p>
                    </div>

                </div>
            </section>

            <!-- Client Engagement Process Workflow -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <div class="text-center max-w-3xl mx-auto space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-widest text-orange-600 dark:text-orange-400">Consulting Workflow</h2>
                    <p class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white tracking-tight">How We Work Together</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                    <!-- Step 1 -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/40 border border-zinc-200 dark:border-zinc-800 space-y-3 relative">
                        <div class="text-3xl font-extrabold text-orange-500/30">01</div>
                        <h3 class="text-lg font-bold text-zinc-900 dark:text-white">Discovery & Audit</h3>
                        <p class="text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Initial consultation to review your product requirements, current codebase bottlenecks, performance targets, and system architecture.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/40 border border-zinc-200 dark:border-zinc-800 space-y-3 relative">
                        <div class="text-3xl font-extrabold text-amber-500/30">02</div>
                        <h3 class="text-lg font-bold text-zinc-900 dark:text-white">Architecture Blueprint</h3>
                        <p class="text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Detailed technical proposal outlining database schemas, API specs, cloud topology, tech stack recommendations, and milestone timelines.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/40 border border-zinc-200 dark:border-zinc-800 space-y-3 relative">
                        <div class="text-3xl font-extrabold text-indigo-500/30">03</div>
                        <h3 class="text-lg font-bold text-zinc-900 dark:text-white">Agile Execution</h3>
                        <p class="text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Iterative sprint development with continuous integration, automated testing (Pest/PHPUnit), code reviews, and weekly status updates.
                        </p>
                    </div>

                    <!-- Step 4 -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900/40 border border-zinc-200 dark:border-zinc-800 space-y-3 relative">
                        <div class="text-3xl font-extrabold text-emerald-500/30">04</div>
                        <h3 class="text-lg font-bold text-zinc-900 dark:text-white">Deployment & Scale</h3>
                        <p class="text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Zero-downtime deployment setup, monitoring configuration, documentation handover, and ongoing support options.
                        </p>
                    </div>

                </div>
            </section>

            <!-- CTA Banner Section -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="p-10 sm:p-16 rounded-3xl bg-gradient-to-r from-orange-500 to-amber-500 text-white shadow-2xl text-center space-y-6 relative overflow-hidden">
                    <div class="relative z-10 max-w-2xl mx-auto space-y-4">
                        <h2 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Ready to elevate your project?</h2>
                        <p class="text-orange-100 text-base sm:text-lg">
                            Whether you need a new full-stack application, system architecture consulting, or code optimization, let's connect.
                        </p>
                        <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
                            <a href="{{ route('home') }}#contact" class="px-8 py-4 rounded-2xl bg-white text-orange-600 font-bold text-sm shadow-lg hover:bg-orange-50 transition-all">
                                Get In Touch Now
                            </a>
                            <a href="{{ route('home') }}" class="px-8 py-4 rounded-2xl bg-orange-600/60 hover:bg-orange-600 text-white font-semibold text-sm border border-white/20 transition-all">
                                Back to Portfolio Home
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <!-- Simple Footer -->
        <footer class="border-t border-zinc-200 dark:border-zinc-800/80 py-8 bg-white/50 dark:bg-zinc-950/50 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-zinc-500">
                <p>© {{ date('Y') }} Jannati Akter. All rights reserved.</p>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Home</a>
                    <a href="{{ route('services') }}" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Resume & Services</a>
                    <a href="{{ route('home') }}#contact" class="hover:text-zinc-900 dark:hover:text-white transition-colors">Contact</a>
                </div>
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
