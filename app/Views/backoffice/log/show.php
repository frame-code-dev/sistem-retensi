<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<div class="p-4 sm:ml-64 h-screen">
    <div class="p-4 mt-14">
        <div class="head lg:flex grid grid-cols-1 justify-between w-full">
            <div class="heading flex-auto">
                <p class="text-blue-950 font-sm text-xs">
                    Log Activity
                </p>
                <h2 class="font-bold tracking-tighter text-2xl text-theme-text">
                    <?=esc($title)?>
                </h2>
            </div>
            <div class="layout lg:flex grid grid-cols-1 lg:mt-0 mt-5 justify-end gap-5">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="<?=base_url('/')?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="<?=base_url('dashboard/log-activity')?>" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">List Log Activity</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?=$title?></span>
                        </div>
                    </li>
                    </ol>
                </nav>
            </div>
            
        </div>

        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
            <div class="p-5">
                <ol class="relative border-s border-gray-200 dark:border-gray-700">   
                    <?php $no = 1;
                    foreach ($data as $row) : ?>          
                        <li class="mb-10 ms-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <img class="rounded-full shadow-lg" src="https://ui-avatars.com/api/?name=<?=$row['username']?>&background=0D8ABC&color=fff" alt="Thomas Lean image"/>
                            </span>
                            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                                <div class="items-center justify-between mb-3 sm:flex">
                                    <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0"><?=CodeIgniter\I18n\Time::parse($row['created_at'])->humanize()?></time>
                                    <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300"><b><?=$row['username']?></b><small> (<?=$row['ip_address']?>)</small></div>
                                </div>
                                <div class="p-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                    <?=esc($row['action'])?>.
                                </div>
                            </div>
                        </li>
                    
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>