<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<div class="p-4 sm:ml-64 h-full">
    <div class="p-4 mt-14">
        <div class="head lg:flex grid grid-cols-1 justify-between w-full">
            <div class="heading flex-auto">
                <p class="text-blue-950 font-sm text-xs">
                    Laporan
                </p>
                <h2 class="font-bold tracking-tighter text-2xl text-theme-text">
                    <?=esc($title)?>
                </h2>
            </div>
           
        </div>
    </div>
    <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
        <form action="<?=base_url('dashboard/laporan-bap/store')?>" method="POST">
            <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3">
                        <div class="border border-gray-200 bg-gray-200 rounded-lg p-4 space-y-4">
                            <label class="block mb-2 text-sm font-semibold text-gray-900">Tanggal Laporan</label>
                            <div date-rangepicker class="flex items-center w-full">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input name="start" value="<?=set_value('start')?>" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input name="end" value="<?=set_value('end')?>" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                                </div>
                            </div>
                            <label class="block mb-2 text-sm font-semibold text-gray-900">Jenis Cetak BA</label>
                            <select id="jenis_cetak" name="jenis_cetak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="bap-kerja-sama" <?= set_value("jenis_cetak") == 'bap-kerja-sama' ? "selected" : "" ?> > BAP Kerja Sama</option>
                                    <option value="bap-tanpa-kerja-sama" <?= set_value("jenis_cetak") == 'bap-tanpa-kerja-sama' ? "selected" : "" ?> > BAP Tanpa Kerja Sama</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nomor<span class="me-2 text-red-500">*</span></label>
                                <input type="text" placeholder="Masukkan Nomor" name="nomor" value="<?= set_value("nomor") ?>" id="nomor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div>
                                <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Tahun<span class="me-2 text-red-500">*</span></label>
                                <input type="text" placeholder="Masukkan Tahun" name="tahun" value="<?= set_value("tahun") ?>" id="tahun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-3">
                        <div class="grid grid-cols-2 gap-4" id="bap_kerja_sama">
                            <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
                                <h4 class="font-bold">PIHAK KESATU</h4>
                                <hr>
                                <div class="grid grid-cols-2 gap-4 mt-5">
                                    <div>
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama Lengkap<span class="me-2 text-red-500">*</span></label>
                                        <input type="text" placeholder="Masukkan Nama Lengkap" name="nama_lengkap_kesatu" value="<?= set_value("nama_lengkap_kesatu") ?>" id="nama_lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div>
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">NIP<span class="me-2 text-red-500">*</span></label>
                                        <input type="text" placeholder="Masukkan NIP" name="nip_kesatu" value="<?= set_value("nip_kesatu") ?>" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div>
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Pangkat/Golongan<span class="me-2 text-red-500">*</span></label>
                                        <input type="text" placeholder="Masukkan Pangkat/Golongan" name="pangkat_kesatu" value="<?= set_value("pangkat_kesatu") ?>" id="pangkat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div>
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Jabatan<span class="me-2 text-red-500">*</span></label>
                                        <input type="text" placeholder="Masukkan Jabatan" name="jabatan_kesatu" value="<?= set_value("jabatan_kesatu") ?>" id="jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
                                <h4 class="font-bold">PIHAK KEDUA</h4>
                                <hr>
                                <div class="grid grid-cols-2 gap-4 mt-5">
                                    <div>
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama Lengkap<span class="me-2 text-red-500">*</span></label>
                                        <input type="text" placeholder="Masukkan Nama Lengkap" name="nama_lengkap_kedua" value="<?= set_value("nama_lengkap_kedua") ?>" id="nama_lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                
                                    <div>
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Jabatan<span class="me-2 text-red-500">*</span></label>
                                        <input type="text" placeholder="Masukkan Jabatan" name="jabatan_kedua" value="<?= set_value("jabatan_kedua") ?>" id="jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Alamat<span class="me-2 text-red-500">*</span></label>
                                        <input type="text" placeholder="Masukkan Alamat" name="alamat_kedua" value="<?= set_value("alamat_kedua") ?>" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 hidden" id="bap_tanpa_kerja_sama">
                                <div>
                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Sekretaris<span class="me-2 text-red-500">*</span></label>
                                    <input type="text" placeholder="Masukkan Nama Lengkap" name="sekretaris" value="<?= set_value("sekretaris") ?>" id="sekretaris" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <input type="text" placeholder="Masukkan NIP" name="nip_sekretaris" value="<?= set_value("nip_sekretaris") ?>" id="sekretaris" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div>
                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Ketua<span class="me-2 text-red-500">*</span></label>
                                    <input type="text" placeholder="Masukkan Nama Lengkap" name="ketua" value="<?= set_value("ketua") ?>" id="ketua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <input type="text" placeholder="Masukkan NIP" name="nip_ketua" value="<?= set_value("nip_ketua") ?>" id="sekretaris" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                
                                </div>
                                <div>
                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Mengetahui<span class="me-2 text-red-500">*</span></label>
                                    <input type="text" placeholder="Masukkan Nama Lengkap" name="mengetahui" value="<?= set_value("mengetahui") ?>" id="mengetahui" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <input type="text" placeholder="Masukkan NIP" name="nip_mengetahui" value="<?= set_value("nip_mengetahui") ?>" id="sekretaris" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                        </div>

                    </div>
                    <div class="col-span-3">
                        <div class="grid grid-cols-1 gap-4">
                            <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
                                <h4 class="font-bold">PELAKSANAAN</h4>
                                <hr>
                                <div class="grid grid-cols-2 gap-4 mt-5">
                                    <div>
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Hari<span class="me-2 text-red-500">*</span></label>
                                        <input type="text" placeholder="Masukkan Hari" name="hari" value="<?= set_value("hari") ?>" id="hari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div class="">
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal <span class="me-2 text-red-500">*</span></label>
                                        <input type="text" datepicker datepicker-format="mm-dd-yyyy" name="tanggal" value="<?= set_value("tanggal") ?>" id="tgl" placeholder="Masukkan Tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div>
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Waktu<span class="me-2 text-red-500">*</span></label>
                                        <input type="time" placeholder="Masukkan Waktu" name="waktu" value="<?= set_value("waktu") ?>" id="waktu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div>
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Lokasi<span class="me-2 text-red-500">*</span></label>
                                        <input type="text" placeholder="Masukkan Lokasi" name="lokasi" value="<?= set_value("lokasi") ?>" id="lokasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Ketua TIM<span class="me-2 text-red-500">*</span></label>
                                        <input type="text" placeholder="Masukkan Ketua TIM" name="ketua_tim" value="<?= set_value("ketua_tim") ?>" id="ketua_tim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div class="col-span-2">
                                        <div class="flex justify-between w-full bg-gray-100 p-3 rounded-md mb-5">
                                            <div>
                                                <h4 class="font-bold text-sm">PELAKSANA</h4>
                                                <hr>
                                            </div>
                                            <div>
                                                <button type="button" 
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                                                        id="addBtn">
                                                    <svg class="w-3.5 h-3.5 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                                    </svg>
                                                    Tambah
                                                
                                                </button>
                                            </div>
                                        </div>
                                        <div id="formContainer">
                                            <div class="row form-row my-3 grid grid-cols-2 content-center gap-3">
                                                <div class="form-group col-md-3">
                                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama Pelaksana<span class="me-2 text-red-500">*</span></label>
                                                    <input type="text" placeholder="Masukkan Data" name="nama_pelaksana[]" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="form-group col-md-2 flex align-bottom content-end items-end">
                                                    <button type="button" class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 remove-btn">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="flex justify-end align-middle content-center bg-gray-100 p-3 rounded-md">
                <div>
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Print</button>
                </div>
                <div>
                    <button class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" type="reset">Batal</button>
                </div>
            </div>
        </form>

    </div>
</div>
<?=$this->endSection()?>
<?=$this->section('js')?>
<script>
        $('#jenis_cetak').on('change', function() {
            let value = $(this).val();
            console.log(value);
            if (value == 'bap-tanpa-kerja-sama') {
                $('#bap_tanpa_kerja_sama').removeClass('hidden');
                $('#bap_kerja_sama').addClass('hidden');
            }else{
                $('#bap_tanpa_kerja_sama').addClass('hidden');
                $('#bap_kerja_sama').removeClass('hidden');
            }
        })
        $('#addBtn').click(function() {
            var formRow = `
                <div class="row form-row my-3 grid grid-cols-2 content-center gap-3">
                    <div class="form-group col-md-3">
                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama Pelaksana<span class="me-2 text-red-500">*</span></label>
                        <input type="text" placeholder="Masukkan Data" name="nama_pelaksana[]" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="form-group col-md-2 flex align-bottom content-end items-end">
                        <button type="button" class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 remove-btn">Hapus</button>
                    </div>
                </div>
            `;
            $('#formContainer').append(formRow);

            // Menghapus form ketika tombol "Remove" ditekan
            $(document).on('click', '.remove-btn', function() {
                $(this).closest('.form-row').remove();
            });
        });
</script>

<?=$this->endSection()?>