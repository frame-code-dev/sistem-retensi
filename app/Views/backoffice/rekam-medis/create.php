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
        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
            <form action="<?= base_url('dashboard/rekam-medis/store') ?>" method="POST" class="w-full mx-auto space-y-4" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-3 ">
                    <div class="">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">NO. RM<span class="me-2 text-red-500">*</span></label>
						<input type="text" placeholder="Masukkan No. Rekam Medis" name="no_rm" id="no_rm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= set_value("no_rm") ?>">
						<div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("errors.no_rm")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("errors.no_rm") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
                    <div class="">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">NIK Pasien<span class="me-2 text-red-500">*</span></label>
						<input type="text" placeholder="Masukkan NIK Pasien" name="nik_pasien" id="nik_pasien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= set_value("nik_pasien") ?>">
						<div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("errors.nik_pasien")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("errors.nik_pasien") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
                    <div class="col-span-2">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama Pasien<span class="me-2 text-red-500">*</span></label>
						<input type="text" placeholder="Masukkan Nama Pasien" name="nama_pasien" id="nama_pasien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= set_value("nama_pasien") ?>">
						<div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("errors.nama_pasien")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("errors.nama_pasien") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
                    <div class="">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Tempat Lahir<span class="me-2 text-red-500">*</span></label>
						<input type="text" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" id="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= set_value("tempat_lahir") ?>">
						<div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("errors.tempat_lahir")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("errors.tempat_lahir") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
                    <div class="">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal Lahir<span class="me-2 text-red-500">*</span></label>
						<input type="text" datepicker datepicker-format="mm-dd-yyyy" name="tanggal_lahir" id="tgl_lahir" placeholder="Masukkan Nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= set_value("tanggal_lahir") ?>">
						<div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("errors.tanggal_lahir")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("errors.tanggal_lahir") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
                    <div class="">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Jenis Kelamin<span class="me-2 text-red-500">*</span></label>
						<select id="jenis_kelamin" name="jenis_kelamin" value="<?= set_value("jenis_kelamin") ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0"> Pilih Jenis Kelamin</option>
                                <option value="l"> Laki-Laki</option>
                                <option value="p"> Perempuan</option>
                        </select>
                        <div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("errors.jenis_kelamin")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("errors.jenis_kelamin") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
                    <div class="">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">DPJP<span class="me-2 text-red-500">*</span></label>
						<input type="text" placeholder="Masukkan DPJP" name="dpjp" id="dpjp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= set_value("dpjp") ?>">
						<div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("errors.dpjp")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("errors.dpjp") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
                    <div class="">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Alamat<span class="me-2 text-red-500">*</span></label>
                        <textarea id="alamat" rows="4" name="alamat" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    </div>
                    <div class="">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Diagnosa<span class="me-2 text-red-500">*</span></label>
                        <textarea id="diagnosa" rows="4" name="diagnosa" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    </div>
                    <div class="col-span-2">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal Terakhir Kunjungan<span class="me-2 text-red-500">*</span></label>
						<input type="text" datepicker datepicker-format="mm-dd-yyyy" name="tgl_kunjungan" id="tgl_kunjungan" placeholder="Masukkan Tanggal Kunjungan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= set_value("nama") ?>">
						<div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("errors.tgl_kunjungan")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("errors.tgl_kunjungan") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
                </div>
                <div class="flex justify-end align-middle content-center bg-gray-100 p-3 rounded-md">
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
<?=$this->endSection()?>