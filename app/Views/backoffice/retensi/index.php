<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<?=$this->include('backoffice/retensi/modal/update')?>
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
           
        </div>

        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th scope="col" class="px-4 py-3">No. RM</th>
                        <th scope="col" class="px-4 py-3">Nama Lengkap</th>
                        <th scope="col" class="px-4 py-3">Kunjungan Terakhir </th>
                        <th scope="col" class="px-4 py-3">Tanggal Retensi </th>
                        <th scope="col" class="px-4 py-3">Tanggal Pemusnahan </th>
                        <th scope="col" class="px-4 py-3">Status</th>
                        <th scope="col" class="px-4 py-3">Keterangan</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                        foreach ($data as $row) : ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-3"><?= $no++ ?></td>
                                <td class="px-4 py-3"><?= $row['no_rm'] ?></td>
                                <td class="px-4 py-3"><?= $row['nama_pasien'] ?></td>
                                <td class="px-4 py-3"><?= $row['tanggal_kunjungan_terakhir'] ?></td>
                                <td class="px-4 py-3"><?= $row['tanggal_retensi'] ?></td>
                                <td class="px-4 py-3"><?= $row['tanggal_pemusnahan'] ?></td>
                                <td class="px-4 py-3">
                                    <?php if ($row['status'] == 'inactive') : ?>
                                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Inactive</span>
                                    <?php else : ?>
                                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Active</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3">
                                    <?php
                                        $end_date = date('Y-m-d',strtotime($row['tanggal_pemusnahan']));
                                    ?>
                                    <?php if ($row['status'] == 'inactive') : ?>
                                        <?php if ($end_date <= date('Y-m-d')) : ?>
                                            <span class="text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Siap Dinilai Guna</span>
                                        <?php else : ?>
                                            <span class="text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">Belum Siap Dinilai Guna</span>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <span class="text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Disimpan</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <?php if ($row['status'] == 'inactive') : ?>
                                        <?php if ($row['deleted_at'] != null) : ?>
                                                <span>Silahkan akses dari menu <span class="text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Alih Media</span></span>
                                        <?php else : ?>
                                                <?php if ($end_date <= date('Y-m-d')) : ?>
                                                    <a href="#" data-modal-target="update-modal" data-modal-toggle="update-modal" data-user="<?= $row['id'] ?>"   class="update-modal text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                        Upload Berkas Nilai Guna
                                                        <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>

                                                    </a>
                                                <?php else : ?>
                                                    -
                                                <?php endif; ?>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>

                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$this->endSection()?>