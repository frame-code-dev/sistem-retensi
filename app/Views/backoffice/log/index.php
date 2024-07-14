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
            
        </div>
        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th scope="col" class="px-4 py-3">User</th>
                        <th scope="col" class="px-4 py-3">Action</th>
                        <th scope="col" class="px-4 py-3">Address</th>
                        <th scope="col" class="px-4 py-3">Tanggal</th>
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
                            <td class="px-4 py-3"><?= $row['nama'] != null ? $row['nama'] : $row['username'] ?></td>
                            <td class="px-4 py-3"><?= $row['action'] ?></td>
                            <td class="px-4 py-3"><?= $row['ip_address'] ?></td>
                            <td class="px-4 py-3"><?= $row['created_at'] ?></td>
                            <td>
                            <a href="<?=base_url('dashboard/log-activity/show/'.$row['user_id'])?>" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$this->endSection()?>
