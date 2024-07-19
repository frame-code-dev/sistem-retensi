<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<div class="p-4 sm:ml-64 h-screen">
    <div class="p-4 mt-14">
        <div class="head lg:flex grid grid-cols-1 justify-between w-full">
            <div class="heading flex-auto">
                <p class="text-blue-950 font-sm text-xs">
                    Alih Media
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
                        <a href="<?=base_url('dashboard/pemusnahan')?>" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">List Pemusnahan</a>
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
        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody class="border p-4 w-full">
                            <tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
                                <td width="20%" class="p-4">No. Rekam Medis</td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=ucwords($data['no_rm'])?></td>
                            </tr>
                            <tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
                                <td width="20%" class="p-4">Nama Pasien</td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=ucwords($data['nama_pasien'])?></td>
                            </tr>
                            <tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <td width="20%" class="p-4">NIK</td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=ucwords($data['nik_pasien'])?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody class="border p-4 w-full">
                            <tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
                                <td width="20%" class="p-4">Tanggal Lahir</td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$data['tanggal_lahir']?></td>
                            </tr>
                            <tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
                                <td width="20%" class="p-4">Jenis Kelamin</td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$data['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'?></td>
                            </tr>
                            <tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
                                <td width="20%" class="p-4">Alamat Lengkap</td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=ucwords($data['alamat_lengkap'])?></td>
                            </tr>
                            <tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
                                <td width="20%" class="p-4">Diagnosa</td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=ucwords($data['diagnosa'])?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-5">
                <div class="overflow-x-auto my-5 border p-4">
                    <div class="bg-gray-200 p-3">
                        <h4 class="font-bold">Jenis Formulir</h4>
                    </div>
                    <?php
                        $resume_medis = new \App\Models\DetailUploadBerkas;
                    ?>
                    <div class="grid grid-cols-2 gap-4 py-4">
                        <div>
                            <ul class="w-full space-y-1 text-gray-500 list-inside dark:text-gray-400 border p-3">
                                <li class="flex items-center">
                                    <div class="flex items-center mb-4">
                                        <input id="ringkasan_masuk_dan_keluar" <?=$resume_medis->checkData($id_berkas, 'ringkasan_masuk_dan_keluar_value') ? 'checked' : ''?> checked name="ringkasan_masuk_dan_keluar" data-id="Ringkasan Masuk Dan Keluar" type="checkbox" value="ringkasan_masuk_value" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="ringkasan_masuk_dan_keluar" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 font-bold">Ringkasan masuk dan keluar</label>
                                    </div>
                                </li>
                                <hr>
                                <li class="flex items-center">
                                    <div class="flex items-center mb-4">
                                       
                                        <input id="resume_medis" <?=$resume_medis->checkData($id_berkas, 'resume_medis_value') ? 'checked' : ''?> name="resume_medis" data-id="Resume medis" type="checkbox" value="resume_medis_value" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="resume_medis" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 font-bold">Resume medis</label>
                                    </div>
                                </li>
                                <hr>
                                <li class="flex items-center">
                                    <div class="flex items-center mb-4">
                                        <input id="lembar_operasi" <?=$resume_medis->checkData($id_berkas, 'lembar_operasi_value') ? 'checked' : ''?> name="lembar_operasi" data-id="Lembar operasi (termasuk laporan persalinan)" type="checkbox" value="lembar_operasi_value" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="lembar_operasi" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 font-bold">Lembar operasi (termasuk laporan persalinan)</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="w-full space-y-1 text-gray-500 list-inside dark:text-gray-400 border p-3">
                                <li class="flex items-center">
                                    <div class="flex items-center mb-4">
                                        <input id="identifikasi_bayi" <?=$resume_medis->checkData($id_berkas, 'identifikasi_bayi_lahir_value') ? 'checked' : ''?> name="identifikasi_bayi" data-id="Identifikasi bayi lahir" type="checkbox" value="identifikasi_bayi_lahir_value" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="identifikasi_bayi" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 font-bold">Identifikasi bayi lahir</label>
                                    </div>
                                </li>
                                <hr>
                                <li class="flex items-center">
                                    <div class="flex items-center mb-4">
                                        <input id="lember_persetujuan" <?=$resume_medis->checkData($id_berkas, 'lembar_persetujuan_value') ? 'checked' : ''?> name="lember_persetujuan" data-id="Lembar persetujuan tindakan medis (informed consent)" type="checkbox" value="lembar_persetujuan_value" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="lember_persetujuan" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 font-bold">Lembar persetujuan tindakan medis (informed consent)</label>
                                    </div>
                                </li>
                                <hr>
                                <li class="flex items-center">
                                    <div class="flex items-center mb-4">
                                        <input id="lembar_kematian" <?=$resume_medis->checkData($id_berkas, 'lembar_kematian_value') ? 'checked' : ''?> name="lembar_kematian" data-id="Lembar kematian" type="checkbox" value="lembar_kematian_value" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="lembar_kematian" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 font-bold">Lembar kematian</label>
                                    </div>
                                </li>
                                <hr>
                                <li class="flex items-center">
                                    <div class="flex items-center mb-4">
                                        <input id="dokumen_rekam_medis" <?=$resume_medis->checkData($id_berkas, 'dokumen_rekam_medis_sesuai_value') ? 'checked' : ''?> name="dokumen_rekam_medis" data-id="Dokumen Rekam Medis, sesuai dengan kepentingan pelayanan" type="checkbox" value="dokumen_rekam_medis_sesuai_value" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="dokumen_rekam_medis" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 font-bold">Dokumen Rekam Medis, sesuai dengan kepentingan pelayanan</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('dashboard/pemusnahan/edit/update/'.$data['id']) ?>" method="POST" class="w-full mx-auto space-y-4" enctype="multipart/form-data">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border" id="formTable">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama Formulir</th>
                                <th class="px-4 py-3">Upload Berkas</th>
                                <th class="px-4 py-3">Preview</th>
                            </tr>
                            <tbody>

                            </tbody>
                        </thead>
                    </table>
                    <div class="flex justify-end align-middle content-center bg-gray-100 p-3 rounded-md mt-5">
                        <div>
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Simpan</button>
                        </div>
                        <div>
                            <button class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" type="reset">Batal</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
 
 <!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    PDF PREVIEW
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="mt-2 px-7 py-3">
                    <embed id="pdfPreview" src="" type="application/pdf" width="100%" height="500px" />
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection()?>
<?=$this->section('js')?>
<script>
    $(document).ready(function() {
        // Function to populate the table
        function populateTable() {
            var formTypes = $('input[type="checkbox"]:checked');
            var tbody = $('#formTable tbody');
            tbody.empty();

            var count = 1;
            formTypes.each(function() {
                var formName = $(this).val();
                var name = $(this).data('id');
                var row = $('<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"></tr>');
                row.append('<td class="px-4 py-3 border">' + count + '</td>');
                row.append('<td class="px-4 py-3 border">' + name + '</td>');
                row.append('<td class="px-4 py-3 border"><input type="file" accept="application/pdf" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="'+ formName +'"></td>');
                row.append('<td class="px-4 py-3 border"><button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" class="preview-btn py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-formname="' + formName + '">Preview</button></td>');
                tbody.append(row);
                count++;
            });
        }

        // Initial population
        populateTable();
          // Handle preview button click
          $(document).on('click', '.preview-btn', function() {
            var formName = $(this).data('formname');
            var fileInput = $('input[name="' + formName + '"]')[0];
            var file = fileInput.files[0];

            if (file && file.type === 'application/pdf') {
                var fileURL = URL.createObjectURL(file);
                $('#pdfPreview').attr('src', fileURL);
            } else {
                alert('Please upload a valid PDF file.');
            }
        });
        // Update table on checkbox change
        $('input[type="checkbox"]').change(function() {
            populateTable();
        });
    });
</script>
<?=$this->endSection()?>
