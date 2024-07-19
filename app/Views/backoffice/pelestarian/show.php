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
                        <a href="<?=base_url('dashboard/pelestarian')?>" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">List Pelestarian</a>
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
            <div class="p-5">
                <div class="flex justify-end p-5 border">
                    <a href="<?=base_url('dashboard/pelestarian/pdf/'.$id_pdf)?>" download class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z"/>
                        </svg>
                        Download Full PDF
                    </a>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody class="border p-4 w-full">
                        <?php $no = 1;
                            foreach ($detail_file as $row) : ?>
                            <tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
                                <td width="20%" class="p-4">
                                    <?php if ($row['nama_formulir'] == 'ringkasan_masuk_value') : ?>
                                        <span class="font-bold">Ringkasan masuk dan keluar</span>
                                    <?php elseif ($row['nama_formulir'] == 'resume_medis_value') : ?>
                                        <span class="font-bold"> Resume medis</span>
                                    <?php elseif ($row['nama_formulir'] == 'lembar_operasi_value') : ?>
                                        <span class="font-bold"> Lembar operasi (termasuk laporan persalinan)</span>
                                    <?php elseif ($row['nama_formulir'] == 'identifikasi_bayi_lahir_value') : ?>
                                        <span class="font-bold"> Identifikasi bayi lahir</span>
                                    <?php elseif ($row['nama_formulir'] == 'lembar_persetujuan_value') : ?>
                                        <span class="font-bold"> Lembar persetujuan tindakan medis (informed consent)</span>
                                    <?php elseif ($row['nama_formulir'] == 'lembar_kematian_value') : ?>
                                        <span class="font-bold"> Lembar kematian</span>
                                    <?php elseif ($row['nama_formulir'] == 'dokumen_rekam_medis_sesuai_value') : ?>
                                        <span class="font-bold"> Dokumen Rekam Medis, sesuai dengan kepentingan pelayanan</span>
                                    <?php endif; ?>
                                </td>
                                <td width="1%">:</td>
                                <td class="font-bold">
                                    <?php if ($row['nama_file'] != null) : ?>
                                        <embed id="pdfPreview" src="<?=base_url('berkas/pelestarian/'.$data['id'].'/'.$row['nama_file'])?>" type="application/pdf" width="100%" height="500px" />
                                    <?php else : ?>
                                        <span>Tidak ada data</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?=$this->endSection()?>