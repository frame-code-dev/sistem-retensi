<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
      <div class="flex gap-2 items-center content-center">
         <h4 class="font-bold text-2xl">Dashboard</h4><p class="text-gray-500 text-sm">Monitoring  your current data</p>
      </div>
      <hr>
      <div class="grid grid-cols-3 gap-4 my-4">
         <div class="card p-5 w-full border border-red-100 bg-red-50 h-[127px] relative">
            <div class="flex gap-5">
               <div>
                  <button class="w-20 h-20 p-5 rounded-full bg-red-200 flex align-middle items-center content-center mx-auto">
                        <svg class="text-3xl mt-1 text-red-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                        </svg>

                  </button>
               </div>
               <div class="mt-3">
                     <h2 class="text-theme-text text-3xl font-bold tracking-tighter">
                        <?=$count_belum_retensi?>
                     </h2>
                     <p class="text-gray-500 text-sm tracking-tighter">
                        RM Belum Diretensi
                     </p>
               </div>
            </div>
         </div>
         <div class="card p-5 w-full border border-blue-100 bg-blue-50 h-[127px] relative">
            <div class="flex gap-5">
               <div>
                  <button class="w-20 h-20 p-5 rounded-full bg-blue-200 flex align-middle items-center content-center mx-auto">
                        <svg class="text-3xl mt-1 text-blue-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z"/>
                        </svg>
                  </button>
               </div>
               <div class="mt-3">
                     <h2 class="text-theme-text text-3xl font-bold tracking-tighter">
                        <?=$count_sudah_retensi?>
                     </h2>
                     <p class="text-gray-500 text-sm tracking-tighter">
                        RM sudah diretensi
                     </p>
               </div>
            </div>
         </div>
         <div class="card p-5 w-full border border-green-100 bg-green-50 h-[127px] relative">
            <div class="flex gap-5">
               <div>
                  <button class="w-20 h-20 p-5 rounded-full bg-green-200 flex align-middle items-center content-center mx-auto">
                     <svg class="text-3xl mt-1 text-green-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z"/>
                     </svg>
                  </button>
               </div>
               <div class="mt-3">
                     <h2 class="text-theme-text text-3xl font-bold tracking-tighter">
                        <?=$count_siap_dimusnahkan?>
                     </h2>
                     <p class="text-gray-500 text-sm tracking-tighter">
                     RM sudah siap dimusnahkan
                     </p>
               </div>
            </div>
         </div>
      </div>
      <div class="card p-5 w-full border border-gray-100 bg-gray-50 h-[127px] relative">
         <div class="head flex lg:flex-row flex-col justify-between gap-5 mb-2">
               <div class="title">
                  <h2 class="font-semibold tracking-tighter text-lg text-theme-text">
                        Monitoring Presentase Data Retensi
                  </h2>
               </div>
         </div>
         <hr>
         <div class="lg:mt-0 pt-10 mx-auto">
				<div id="pendaftaran"></div>
			</div>
      </div>
      <div class="grid grid-cols-2 gap-4 mb-4">
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
      </div>
      <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
         <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
         </p>
      </div>
      <div class="grid grid-cols-2 gap-4">
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var chartData = <?= json_encode($chartData); ?>;

   var pelestarianDates = chartData.pelestarian.map(data => data.date);
   var pelestarianCounts = chartData.pelestarian.map(data => data.count);
   var pemusnahanDates = chartData.pemusnahan.map(data => data.date);
   var pemusnahanCounts = chartData.pemusnahan.map(data => data.count);
   // pendaftaran
	var pendaftaran = {
        series: [{
            name: 'Retensi Pelestarian',
            data: pelestarianCounts
        }, {
            name: 'Retensi Pemusnahan',
            data: pemusnahanCounts
        }],
        chart: {
            height: 350,
            type: 'area'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'datetime',
            categories: pelestarianDates.length > pemusnahanDates.length ? pelestarianDates : pemusnahanDates
        },
        tooltip: {
            x: {
                format: 'y-MMM-dd'
            },
        },
    };

	var chart_pendaftaran = new ApexCharts(document.querySelector("#pendaftaran"), pendaftaran);
	chart_pendaftaran.render();
</script>

<?=$this->endSection()?>