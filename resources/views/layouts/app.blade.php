<!DOCTYPE html>
<html lang="sq" class="h-full bg-zinc-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LMS Dashboard') - Scantech Academy</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased text-zinc-900">

    <div class="flex h-screen overflow-hidden flex-col md:flex-row">
        
        <header class="flex md:hidden items-center justify-between h-16 px-4 bg-slate-950 text-white border-b border-slate-800 shrink-0">
            <div class="flex items-center font-bold tracking-wider text-sm">
                <div class="w-6 h-6 rounded bg-blue-600 mr-2 flex items-center justify-center text-xs">ST</div>
                SCANTECH ACADEMY
            </div>
            <button id="mobile-menu-open" class="p-2 rounded-md text-slate-400 hover:text-white hover:bg-slate-800 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </header>

        <div id="mobile-sidebar-wrapper" class="fixed inset-0 z-50 flex md:hidden pointer-events-none" role="dialog" aria-modal="true">
            <div id="mobile-sidebar-backdrop" class="fixed inset-0 bg-slate-900/80 opacity-0 transition-opacity duration-300 ease-linear pointer-events-none"></div>

            <div id="mobile-sidebar-panel" class="relative flex w-full max-w-xs flex-1 flex-col bg-slate-900 pt-5 pb-4 -translate-x-full transition-transform duration-300 ease-in-out pointer-events-auto">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button id="mobile-menu-close" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Mbyll menunë</span>
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex items-center h-16 px-6 bg-slate-950 border-b border-slate-800 text-white font-bold tracking-wider text-sm shrink-0">
                    <div class="w-6 h-6 rounded bg-blue-600 mr-2 flex items-center justify-center text-xs">ST</div>
                    SCANTECH ACADEMY
                </div>

                <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1.5">
                    <a href="/dashboard" class="flex items-center px-4 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg transition-all">Dashboard</a>
                    <a href="/courses" class="flex items-center px-4 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg shadow-md">Kurset (CRUD)</a>
                    <a href="/categories" class="flex items-center px-4 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg">Kategoritë</a>
                    <a href="/students" class="flex items-center px-4 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg">Studentët</a>
                    <a href="/payments" class="flex items-center px-4 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg">Pagesat</a>
                </nav>

                <div class="border-t border-slate-800 bg-slate-950/40 p-4 space-y-2">
                    <a href="/settings" class="flex items-center px-3 py-2 text-xs font-medium text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-md">Konfigurimi i Panelit</a>
                    <div class="flex items-center justify-between bg-slate-900/60 rounded-lg p-2.5 border border-slate-800/60">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold text-xs">ER</div>
                            <div class="ml-2.5"><p class="text-xs font-semibold text-slate-200">Elsa Rizani</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <aside id="main-sidebar" class="hidden md:flex md:flex-shrink-0 w-64 bg-slate-900 flex-col border-r border-slate-800 transition-all duration-300">
            <div class="flex items-center h-16 px-6 bg-slate-950 border-b border-slate-800 text-white font-bold tracking-wider text-sm shrink-0">
                <div class="w-6 h-6 rounded bg-blue-600 mr-2 flex items-center justify-center text-xs">ST</div>
                SCANTECH ACADEMY
            </div>

            <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1.5">
                <a href="/dashboard" class="flex items-center px-4 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg transition-all group">
                    <svg class="mr-3 h-5 w-5 text-slate-400 group-hover:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" /></svg>
                    Dashboard
                </a>
                <a href="/courses" class="flex items-center px-4 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg shadow-md shadow-blue-900/30 transition-all">
                    <svg class="mr-3 h-5 w-5 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    Kurset (CRUD)
                </a>
                <a href="/categories" class="flex items-center px-4 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg transition-all group">
                    <svg class="mr-3 h-5 w-5 text-slate-400 group-hover:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                    Kategoritë
                </a>
                <a href="/students" class="flex items-center px-4 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg transition-all group">
                    <svg class="mr-3 h-5 w-5 text-slate-400 group-hover:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    Studentët
                </a>
                <a href="/payments" class="flex items-center px-4 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg transition-all group">
                    <svg class="mr-3 h-5 w-5 text-slate-400 group-hover:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>
                    Pagesat
                </a>
            </nav>
        
            <div class="border-t border-slate-800 bg-slate-950/40 p-4 space-y-2">
                <a href="/settings" class="flex items-center px-3 py-2 text-xs font-medium text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-md transition-all group">
                    <svg class="mr-2.5 h-4 w-4 text-slate-500 group-hover:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    Konfigurimi i Panelit
                </a>
                <div class="flex items-center justify-between bg-slate-900/60 rounded-lg p-2.5 border border-slate-800/60">
                    <div class="flex items-center min-w-0">
                        <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold text-xs shrink-0">ER</div>
                        <div class="ml-2.5 min-w-0">
                            <p class="text-xs font-semibold text-slate-200 truncate">Elsa Rizani</p>
                            <p class="text-[10px] text-slate-500 font-mono truncate">ID: #1024</p>
                        </div>
                    </div>
                    <a href="/profile" class="p-1.5 rounded-md text-slate-500 hover:text-slate-300 hover:bg-slate-800 transition-colors"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg></a>
                </div>
            </div>
        </aside>

        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <header class="h-16 bg-white border-b border-zinc-200 flex items-center px-6 justify-between shadow-sm shrink-0">
                <div class="text-xs font-semibold text-zinc-400 uppercase tracking-wider">Portal / @yield('breadcrumb', 'Management')</div>
                <div class="flex items-center space-x-4">
                    <a href="/chat" class="p-2 text-zinc-400 hover:text-zinc-600 rounded-full hover:bg-zinc-100 transition-all"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg></a>
                    <button class="p-2 text-zinc-400 hover:text-zinc-600 rounded-full hover:bg-zinc-100 transition-all relative"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg><span class="absolute top-1.5 right-1.5 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span></button>
                    <div class="h-6 w-px bg-zinc-200"></div>
                    <div class="text-sm font-medium text-zinc-700 hidden sm:block">Elsa Rizani <span class="text-xs font-normal text-zinc-400 ml-1">(Admin)</span></div>
                </div>
            </header>

            <main class="flex-1 relative overflow-y-auto focus:outline-none bg-zinc-50/50 p-6 md:p-8">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openBtn = document.getElementById('mobile-menu-open');
            const closeBtn = document.getElementById('mobile-menu-close');
            const wrapper = document.getElementById('mobile-sidebar-wrapper');
            const backdrop = document.getElementById('mobile-sidebar-backdrop');
            const panel = document.getElementById('mobile-sidebar-panel');

            function openMobileMenu() {
                wrapper.classList.remove('pointer-events-none');

                backdrop.classList.remove('opacity-0', 'pointer-events-none');
                backdrop.classList.add('opacity-100');
                
                panel.classList.remove('-translate-x-full');
                panel.classList.add('translate-x-0');
            }

            function closeMobileMenu() {
                wrapper.classList.add('pointer-events-none');
                
                backdrop.classList.remove('opacity-100');
                backdrop.classList.add('opacity-0', 'pointer-events-none');
                
                panel.classList.remove('translate-x-0');
                panel.classList.add('-translate-x-full');
            }

            openBtn.addEventListener('click', openMobileMenu);
            closeBtn.addEventListener('click', closeMobileMenu);
            backdrop.addEventListener('click', closeMobileMenu);
        });
    </script>
</body>
</html>