<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<?=$this->include('backoffice/retensi/modal/update')?>
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
           
        </div>

        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th scope="col" class="px-4 py-3">No. RM</th>
                        <th scope="col" class="px-4 py-3">Nama Lengkap</th>
                        <th scope="col" class="px-4 py-3">Kunjungan Terakhir </th>
                        <th scope="col" class="px-4 py-3">Keterangan</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                        foreach ($data as $row) : ?>
                            <?php if ($row['keterangan'] == 'PELESTARIAN' || $row['keterangan'] == null) : ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-4 py-3"><?= $no++ ?></td>
                                    <td class="px-4 py-3"><?= $row['no_rm'] ?></td>
                                    <td class="px-4 py-3"><?= $row['nama_pasien'] ?></td>
                                    <td class="px-4 py-3"><?= $row['tanggal_kunjungan_terakhir'] ?></td>
                                    <td class="px-4 py-3"><?= $row['keterangan'] ?></td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <div class="inline-flex rounded-md shadow-sm">
                                            <a href="<?= base_url('dashboard/pelestarian/show/' . $row['id']) ?>" aria-current="page" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                Preview Berkas
                                            </a>
                                            <?php
                                                $checkData = new \App\Models\DetailUploadBerkas;
                                                $result = $checkData->findFirst($row['id']);
                                            ?>
                                            <?php if ($result) : ?>
                                                <a href="<?= base_url('dashboard/pelestarian/upload/' . $row['id']) ?>" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    Upload Berkas
                                                </a>
                                            <?php endif; ?>
                                            <a href="<?= base_url('dashboard/pelestarian/edit/' . $row['id']) ?>" class="px-4 py-2 text-sm font-medium text-red-500 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                Edit Berkas
                                            </a>
                                        
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$this->endSection()?>