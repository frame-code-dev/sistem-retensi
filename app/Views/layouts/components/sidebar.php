
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
            <h5 class="text-gray-500 font-bold uppercase dark:text-gray-400 px-3">MENU</h5>
            <li>
                <a href="<?= base_url('/') ?>" class="flex items-center p-3 text-gray-900 dark:text-white hover:bg-green-900 dark:hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-green-900 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Zm16 14a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2ZM4 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6Zm16-2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6Z"/>
                </svg>
                <span class="ms-3 text-gray-500 group-hover:text-white">Dashboard</span>
                </a>
            </li>
            <hr>
            <li>
                <button type="button" class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 group hover:bg-green-900 dark:text-white dark:hover:bg-gray-700" aria-controls="data-master" data-collapse-toggle="data-master">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 8H4m0-2v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z"/>
                    </svg>
                    
                    <span class="flex-1 ms-3 text-gray-500 group-hover:text-white text-left rtl:text-right whitespace-nowrap">Data Master</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="data-master" class="hidden py-2 space-y-2">
                    <li>
                        <a href="<?=base_url('dashboard/petugas')?>" class="flex items-center w-full p-2 text-gray-500  transition duration-75 pl-11 group hover:bg-green-900 dark:text-white dark:hover:bg-gray-700">
                            <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4"/>
                            </svg>
                            <span class="group-hover:text-white">
                                Data Petugas 
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('dashboard/rekam-medis')?>" class="flex items-center w-full p-2 text-gray-500 transition duration-75 pl-11 group hover:bg-green-900 dark:text-white dark:hover:bg-gray-700">
                            <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4"/>
                            </svg>
                            <span class="group-hover:text-white">
                                Data Rekam Medis 
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <hr>
            <li>
                <a href="#" class="flex items-center p-3 text-gray-900 dark:text-white hover:border-2 hover:bg-green-900 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11H4m15.5 5a.5.5 0 0 0 .5-.5V8a1 1 0 0 0-1-1h-3.75a1 1 0 0 1-.829-.44l-1.436-2.12a1 1 0 0 0-.828-.44H8a1 1 0 0 0-1 1M4 9v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-3.75a1 1 0 0 1-.829-.44L9.985 8.44A1 1 0 0 0 9.157 8H5a1 1 0 0 0-1 1Z"/>
                    </svg>                
                    <span class="ms-3 text-gray-500 group-hover:text-white">List Retensi</span>
                </a>
            </li>
            <hr>
            <li>
                <button type="button" class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 group hover:bg-green-900 dark:text-white dark:hover:bg-gray-700" aria-controls="alih-media" data-collapse-toggle="alih-media">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                    </svg>

                    <span class="flex-1 ms-3 text-gray-500 group-hover:text-white text-left rtl:text-right whitespace-nowrap">Alih Media</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="alih-media" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-500 transition duration-75 pl-11 group hover:bg-green-900 dark:text-white dark:hover:bg-gray-700">
                            <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4"/>
                            </svg>
                            <span class="group-hover:text-white">
                                Pelestarian

                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-500 transition duration-75 pl-11 group hover:bg-green-900 dark:text-white dark:hover:bg-gray-700">
                            <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4"/>
                            </svg>
                            <span class="group-hover:text-white">
                                Pemusnahan 

                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <hr>
            <li>
                <button type="button" class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 group hover:bg-green-900 dark:text-white dark:hover:bg-gray-700" aria-controls="laporan" data-collapse-toggle="laporan">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z"/>
                    </svg>

                    <span class="flex-1 ms-3 text-gray-500 group-hover:text-white text-left rtl:text-right whitespace-nowrap">Laporan</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="laporan" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-500 transition duration-75 pl-11 group hover:bg-green-900 dark:text-white dark:hover:bg-gray-700">
                            <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4"/>
                            </svg>
                            <span class="group-hover:text-white">
                                Laporan Retensi
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-500 transition duration-75 pl-11 group hover:bg-green-900 dark:text-white dark:hover:bg-gray-700">
                            <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4"/>
                            </svg>
                            <span class="group-hover:text-white">
                                Laporan Pelestarian 
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-500 transition duration-75 pl-11 group hover:bg-green-900 dark:text-white dark:hover:bg-gray-700">
                            <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4"/>
                            </svg>
                            <span class="group-hover:text-white">
                                Laporan Pemusnahan 
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <hr>
            <li>
                <a href="<?=base_url('dashboard/log-activity')?>" class="flex items-center p-3 text-gray-900 dark:text-white hover:border-2 hover:bg-green-900 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h6M9 3v4a1 1 0 0 1-1 1H4m11 13a11.426 11.426 0 0 1-3.637-3.99A11.139 11.139 0 0 1 10 11.833L15 10l5 1.833a11.137 11.137 0 0 1-1.363 5.176A11.425 11.425 0 0 1 15.001 21Z"/>
                    </svg>
                                
                    <span class="ms-3 text-gray-500 group-hover:text-white">Log Activity</span>
                </a>
            </li>
      </ul>
   </div>
</aside>