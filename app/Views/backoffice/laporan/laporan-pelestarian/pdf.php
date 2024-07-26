<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font-family: 'Tinos', serif;
            font: 12pt;
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        p, table, ol{
            font-size: 13.5pt;
        }
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;   /* Chrome, Safari, Edge */
                color-adjust: exact !important;                 /*Firefox*/     /*Firefox*/
            }
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .no-print, .no-print *
            {
                display: none !important;
            }
        /* ... the rest of the rules ... */
        }
    </style>
</head>
<body>
    <div class="max-w-8xl mx-auto mt-5">
        <div class="flex justify-between content-center items-center">
            <div>
                <img src="<?=base_url('logo-pdf.svg')?>" class="h-40" alt="">
            </div>
            <div class="mx-4 text-center w-full self-start">
                <h1 class="text-lg">PEMERINTAH KABUPATEN PROBOLINGGO</h1>
                <h1 class="text-lg">DINAS KESEHATAN</h1>
                <h1 class="font-bold text-lg">UOBK RSUD WALUYO JATI</h1>
                <p class="text-xs">Jl. Dr. Soetomo No.1 Telp. (0335) 841118. 841481, Fax (0335) 841160</p>
                <h5 class="font-bold">KRAKSAAN - PROBOLINGGO - 67282</h5>
                <p class="text-xs">Website : www.rsudwaluyojati.Probolinggokab.go.id E-mail : rsudwaluyojati@Probolinggokab.go.id</p>
            </div>
        </div>
        <hr class="border border-gray-900 border-3">
        <div>
            <div class="flex justify-end mt-5">
                <a href="<?=base_url('dashboard/laporan-pelestarian') ?>" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 no-print">Kembali</a> 
            </div>
            <div class="p-4 text-center">
                <h1 class="font-bold text-lg"><?=$title?></h1>
            </div>
            <div class="py-5 my-5">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border" id="datatable">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-3 border">No</th>
                            <th scope="col" class="px-4 py-3 border">No. RM</th>
                            <th scope="col" class="px-4 py-3 border">NIK</th>
                            <th scope="col" class="px-4 py-3 border">Kunjungan Terakhir </th>
                            <th scope="col" class="px-4 py-3 border">Tanggal Pelestarian</th>
                            <th scope="col" class="px-4 py-3 border">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                            foreach ($data as $row) : ?>
                                <?php if ($row['keterangan'] == 'PELESTARIAN' || $row['keterangan'] == null) : ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-4 py-3 border"><?= $no++ ?></td>
                                        <td class="px-4 py-3 border"><?= $row['no_rm'] ?></td>
                                        <td class="px-4 py-3 border"><?= $row['diagnosa'] ?></td>
                                        <td class="px-4 py-3 border"><?= $row['tanggal_kunjungan_terakhir'] ?></td>
                                        <td class="px-4 py-3 border"><?= $row['created_at'] ?></td>
                                        <?php 
                                            $detail = new \App\Models\DetailUploadBerkas;
                                            $result = $detail->getDetailUploadBerkas($row['id']);
                                        ?>
                                        <td class="px-4 py-3 border">
                                         <?php foreach ($result as $key => $value) { 
                                            if ($value['nama_file'] != null) {
                                                echo ''.$value['nama_formulir'].',';
                                            }
                                        }?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end">
                <div>
                    <h1>Probolinggo, <?= date('d F Y') ?></h1>
                    <div class="my-5 py-5"></div>
                    <div>
                        <h1 class="font-bold underline underline-offset-1"><?=$nama?></h1>
                        <h1 class="font-bold">NIP. <?=$nip?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
    <!-- <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script> -->
    <script>
        print();
    </script>
</html>