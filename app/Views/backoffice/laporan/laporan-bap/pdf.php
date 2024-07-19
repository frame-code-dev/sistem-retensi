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
        <div class="page-1 mb-5">
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
                    <a href="<?=base_url('dashboard/laporan-bap') ?>" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 no-print">Kembali</a> 
                </div>
                <div class="p-4 text-center">
                    <h1 class="font-bold text-lg">BERITA ACARA PEMUSNAHAN ARSIP</h1>
                    <p>Nomor : <?=$nomor.'/'.$tahun?></p>
                </div>
                <div class="mb-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody class="w-full">
                            <tr class="px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <td width="20%" class="">Hari dan tanggal </td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$hari.'/'.$tanggal?></td>
                            </tr>
                            <tr class="px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <td width="20%" class="">Tempat </td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$lokasi?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mb-4">
                    <h5 class="font-bold">PIHAK KESATU</h5>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody class=" w-full">
                            <tr class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <td width="20%" class="">Nama  </td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$nama_lengkap_kesatu?></td>
                            </tr>
                            <tr class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <td width="20%" class="">NIP </td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$nip_kesatu?></td>
                            </tr>
                            <tr class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <td width="20%" class="">Pangkat / Golongan </td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$pangkat_kesatu?></td>
                            </tr>
                            <tr class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <td width="20%" class="">Jabatan </td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$jabatan_kesatu?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mb-4">
                    <h5 class="font-bold">PIHAK KEDUA</h5>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody class=" w-full">
                            <tr class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <td width="20%" class="">Nama  </td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$nama_lengkap_kedua?></td>
                            </tr>
                            <tr class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <td width="20%" class="">Jabatan </td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$jabatan_kedua?></td>
                            </tr>
                            <tr class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <td width="20%" class="">Alamat </td>
                                <td width="1%">:</td>
                                <td class="font-bold"><?=$alamat_kedua?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="my-5">
                    <p class="text-sm indent-2" style="text-indent:2rem">
                        Pihak Kesatu sebagai Ketua Tim Pemusnahan berkas rekam medis RSUD Waluyo Jati yang tercantum dalam daftar terlampir dengan cara : Peleburan dan Penghancuran. 
                        Bertindak atas dasar :
                    </p>
                    <p>
                        <ol class="ps-5 mt-2 space-y-1 list-decimal list-inside text-sm">
                            <li>
                                Peraturan Bupati Probolinggo Nomor : 39 Tahun 2012 Tentang Jadwal Retensi Arsip Keuangan di Kabupaten Probolinggo
    
                            </li>
                            <li>
                                Surat Edaran Dirjen Pelayanan Medik NO.HK.00.1.5.01160 tanggal 21 Maret 1995 tentang petunjuk teknis pengadaan formulir Rekam Medis Dasar dan Pemusnahan Arsip Rekam Medis di Rumah Sakit.
    
                            </li>
                            <li>
                            SK Dirjen Yanmed No. 78/Yanmed/RS.Umdik/YMU/I/91 tentang Penyelenggaraan Rekam Medis di Rumah Sakit 
    
                            </li>
                        </ol>
    
                    </p>
                </div>
                <div class="flex justify-between py-5 my-5">
                    <div>
                        <h1>Yang Menerima</h1>
                        <h1>Pihak Ke Dua</h1>
                        <div class="my-5 py-5"></div>
                        <div>
                            <h1 class="font-bold underline underline-offset-1"><?=$nama_lengkap_kedua?></h1>
                            <h1 class="font-bold">Pemilik</h1>
                        </div>
                    </div>
                    <div>
                        <h1>Probolinggo, <?= date('d F Y') ?></h1>
                        <h1>Yang Menyerahkan</h1>
                        <h1>Pihak Ke Satu</h1>
                        <div class="my-5 py-5"></div>
                        <div>
                            <h1 class="font-bold underline underline-offset-1"><?=$nama_lengkap_kesatu?></h1>
                            <h1 class="font-bold">NIP. <?=$nip_kesatu?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-1 mb-5">
            <div class="p-8">
                <p class="mb-4">Atas dasar tersebut diatas, Tim Pemusnahan Berkas Rekam Medis RSUD Waluyo Jati melakukan pemusnahan berkas rekam medis in aktif tahun <b><?=$tahun?></b> sebanyak <b><?=$data?></b> berkas.</p>
                
                <h2 class="font-bold mb-2">1. PELAKSANAAN</h2>
                <div class="mb-4">
                    <div>Hari: <span class="text-gray-900"><?=$hari?></span></div>
                    <div>Tanggal: <span class="text-gray-900"><?=$tanggal?></span></div>
                    <div>Waktu: <span class="text-gray-900"><?=$waktu?></span></div>
                    <div>Lokasi: <span class="text-gray-900"><?=$lokasi?></span></div>
                    <div>Ketua Tim: <span class="text-gray-900"><?=$ketua_tim?></span></div>
                    <div>Pelaksana:</div>
                    <ol class="list-decimal ml-6 ">
                        <?php $no = 1;
                            foreach ($nama_pelaksana as $row) : ?>
                            <li><?=$row?></li>
                        <?php endforeach; ?>
                    </ol>
                </div>

                <h3 class="font-bold mb-2">Saksi Tim Pemusnahan Berkas Rekam Medis</h3>
                <div class="grid grid-cols-2 gap-4 mb-4 text-gray-500">
                    <div>1. ....................................................</div>
                    <div>1. ....................................................</div>
                    <div>2. ....................................................</div>
                    <div>2. ....................................................</div>
                    <div>3. ....................................................</div>
                    <div>3. ....................................................</div>
                    <div>4. ....................................................</div>
                    <div>4. ....................................................</div>
                    <div>5. ....................................................</div>
                    <div>5. ....................................................</div>
                    <div>6. ....................................................</div>
                    <div>6. ....................................................</div>
                    <div>7. ....................................................</div>
                    <div>7. ....................................................</div>
                </div>

                <h2 class="font-bold mb-2">2. PROSEDUR</h2>
                <ol class="list-decimal ml-6 mb-4">
                    <li class="mb-2">Memilih berkas rekam medis inaktif ... - ... yang sudah memasuki masa simpan aktif 2 tahun.</li>
                    <li class="mb-2">Menilai rekam medis yang masih bernilai guna dan yang tidak bernilai guna.</li>
                    <li class="mb-2">Melakukan pemindaian (scanning) semua rekam medis yang mempunyai nilai guna.</li>
                    <li class="mb-2">Menyimpan lembaran penting dari berkas rekam medis yang tidak dimusnahkan di ruang penyimpanan rekam medis.</li>
                    <li class="mb-2">Berkas rekam medis dikirim ke pihak kedua dengan menggunakan mobil box tertutup.</li>
                    <li class="mb-2">Berkas rekam medis yang tidak bernilai guna dimusnahkan.</li>
                    <li class="mb-2">Tim pemusnah berkas rekam medis mengawasi pembakaran sampai selesai.</li>
                    <li class="mb-2">Baftr bekas medis yang dimusnahkan terlambir.</li>
                </ol>
            </div>
        </div>
    </div>
</body>
<script>
    print();
</script>
</html>