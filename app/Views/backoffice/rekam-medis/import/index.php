<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<div class="p-4 sm:ml-64 h-screen">
    <div class="p-4 mt-14">
        <div class="head lg:flex grid grid-cols-1 justify-between w-full">
            <div class="heading flex-auto">
                <p class="text-blue-950 font-sm text-xs">
                    Master Data
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
                        <a href="<?=base_url('dashboard/rekam-medis')?>" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">List Rekam Medis</a>
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
            <form action="<?= base_url('dashboard/rekam-medis/import/store') ?>" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file excel</label>
                        <input name="file" id="file_input" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                    <div class="flex justify-start content-center align-middle self-end">
                        <div>
                            <button type="button" class="btn-import text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload & Preview</button>
                        </div>
                        <div>
                            <a href="<?=base_url('excel/import-rekam-medis.xlsx')?>" download="Import Data.xlsx" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                              Download Template Excel
                            </a>
                        </div>
                    </div>
                </div>
                <div class="py-5">
                    <hr>
                </div>
                <div class="table-wrapping hidden my-3" id="card-alert">
                    <div class="flex justify-between items-center">
                        <div class="flex" id="grand">

                        </div>

                        <div class="col-md-4 align-self-center mt-4">
                            <div class="d-flex justify-content-start">
                                <div class="hidden" id="pesan-upload">
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">Kesalahan Data Excel!</span> Silahkan Perbaiki dan Upload kembali.
                                    </div>
                                </div>
                                <input type="text" name="data" value="" id="data" hidden>
                                <button type="submit" id="button-simpan" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hidden" id="button-simpan">
                                    <svg class="w-3.5 h-3.5 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                                    </svg>
                                    Simpan Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-wrapping hidden" id="table-data">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border" id="table_item">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th class="px-4 py-3 border">No</th>
                            <th class="px-4 py-3 border">No. RM</th>
                            <th class="px-4 py-3 border">NIK</th>
                            <th class="px-4 py-3 border">Nama Pasien</th>
                            <th class="px-4 py-3 border">Jenis Kelamin</th>
                            <th class="px-4 py-3 border">Tempat/Tgl Lahir</th>
                            <th class="px-4 py-3 border">Diagnosa</th>
                            <th class="px-4 py-3 border">DPJP</th>
                            <th class="px-4 py-3 border">Tanggal Kunjungan Terakhir</th>
                        </thead>
                        <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        </tbody>

                    </table>
                </div>

            </form>
        </div>
    </div>
</div>

<?=$this->endSection()?>
<?=$this->section('js')?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $('.btn-import').on('click',function(element) {
        $('#card-alert').removeClass('hidden');
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;
        var grand_total = 0;
        var file_excel = $("#file_input").val();
        var sheet_data = [];
        if (regex.test($("#file_input").val().toLowerCase())) {
            var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/
            if ($('#file_input').val().toLowerCase().indexOf(".xlsx") > 0) {
                xlsxflag = true;
            }
            if (typeof(FileReader) != 'undefined') {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = e.target.result;
                    // convert the excel data in to object
                    if (xlsxflag) {
                        var workbook = XLSX.read(data, {type: 'binary'});
                    }
                    // all element sheetnames of excel
                    var sheet_name_list = workbook.SheetNames;
                    if (typeof(sheet_name_list) != 'undefined') {
                        sheet_data = XLSX.utils.sheet_to_json(workbook.Sheets[sheet_name_list[0]], {header:2});
                        $('#table-data').removeClass('hidden');
                        populateTable(sheet_data);
                    }
                }
                reader.onerror = function(ex) {
                    console.log(ex);
                };
                if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/
                    reader.readAsArrayBuffer($("#file_input")[0].files[0]);
                }
                else {
                    reader.readAsBinaryString($("#file_input")[0].files[0]);
                }
            } else {
                console.log('tidak support');
            }
        } else {
            alert("Unggah file Excel yang valid!");
            // $('#table_item tbody').empty();
            // $('#table-data').addClass('hidden');
            $('#button-simpan').addClass('hidden');
        }
    })
    function populateTable(data) {
        $('#grand').html(`
             <p id="grand-total" class="font-bold">Total Data : ${data.length}</p>
        `)
      
        var $tableBody = $('#table_item tbody');
        $tableBody.empty(); // Clear existing table data
        var new_body_tr = ``
        var no = 1;
        var kondisi = true;
        // Skip the header row (index 0) and start from the first data row (index 1)
        $.each(data, function(index, row) {
            var nik = row['NIK Pasien'].length;
            if (nik !== 16) {
                kondisi = false;
                new_body_tr += `    
                    <tr class="bg-red-200">
                        <td class="px-4 py-3 border">
                            <span>${no++}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['No. RM']}</span>
                        </td>
                        <td class="px-4 py-3 border flex flex-col">
                        <span class="nik-pasien">${row['NIK Pasien']}</span>
                        <small class="nik-pesan text-xs text-red-500 hidden">Invalid NIK</small>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['Nama Pasien']}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['Jenis Kelamin']}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['Tempat Lahir']}/${row['Tanggal Lahir']}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['Diagnosa']}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['DPJP']}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['Tanggal Kunjungan Terakhir']}</span>
                        </td>
                    </tr>
                `;
            }else{
                new_body_tr += `    
                    <tr class="">
                        <td class="px-4 py-3 border">
                            <span>${no++}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['No. RM']}</span>
                        </td>
                        <td class="px-4 py-3 border flex flex-col">
                        <span class="nik-pasien">${row['NIK Pasien']}</span>
                        <small class="nik-pesan text-xs text-red-500 hidden">Invalid NIK</small>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['Nama Pasien']}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['Jenis Kelamin']}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['Tempat Lahir']}/${row['Tanggal Lahir']}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['Diagnosa']}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['DPJP']}</span>
                        </td>
                        <td class="px-4 py-3 border">
                            <span>${row['Tanggal Kunjungan Terakhir']}</span>
                        </td>
                    </tr>
                `;

            }

        })
        if (kondisi) {
            $('#pesan-upload').addClass('hidden');
            $('#data').val(JSON.stringify(data));
            $('#button-simpan').removeClass('hidden');
        }else{
            $('#pesan-upload').removeClass('hidden');
        }
        $('#table_item tbody').append(new_body_tr);

        $('.nik-pasien').each(function() {
            var nikPasien = $(this).text();
            if (nikPasien.length !== 16) {
                $(this).siblings('.nik-pesan').removeClass('hidden');
            }
        });
    }
</script>

<?=$this->endSection()?>