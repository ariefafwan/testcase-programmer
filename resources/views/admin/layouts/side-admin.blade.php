<button
    data-drawer-target="logo-sidebar"
    data-drawer-toggle="logo-sidebar"
    aria-controls="logo-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
>
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path
        clip-rule="evenodd"
        fill-rule="evenodd"
        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
    ></path>
    </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-5 py-6 overflow-y-auto bg-gray-900 dark:bg-gray-900">
    <a href="https://flowbite.com/" class="flex items-center pl-2.5 mb-5">
        <img src="{{ asset("assets/img/1595906992074.png") }}" class="h-6 mr-3 sm:h-7" alt="Flowbite Logo" />
        <span class="ml-1 text-xl font-semibold transition-all duration-200 ease-nav-brand text-blue-50">Dashboard</span>
    </a>
    <ul class="pt-4 mt-2 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
        <li>
        <a href="{{ route('dashboard') }}" class="@if (Route::is('dashboard')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
            <i class="fa fa-home" aria-hidden="true"></i>
            </span>
            <span class="ml-3">Dashboard</span>
        </a>
        </li>
    </ul>
    <div class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase text-blue-50">Menu</h6>
    </div>
    <ul class="pt-4 mt-2 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
        <li>
        <a href="{{ route('kartukeluarga.index') }}" class="@if (Route::is('kartukeluarga.index')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
            <i class="fa fa-table" aria-hidden="true"></i>
            </span>
            <span class="ml-3">Data KK</span>
        </a>
        </li>
        <li>
        <a href="{{ route('datapenduduk.index') }}" class="@if (Route::is('datapenduduk.index')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
            <i class="fa fa-address-book" aria-hidden="true"></i>
            </span>
            <span class="ml-3">Data Penduduk</span>
        </a>
        </li>
    </ul>
    <div class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase text-blue-50">Account pages</h6>
    </div>
    <ul class="pt-4 mt-2 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
        <li>
        <a href="{{ route('profile.edit') }}" class="@if (Route::is('profile.edit')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                <i class="fa fa-cog" aria-hidden="true"></i>
            </span>
            <span class="ml-3">Profile</span>
        </a>
        </li>
    </ul>
    </div>
</aside>