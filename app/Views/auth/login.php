<?= $this->extend('layouts/guest/app.php') ?>
<?= $this->section('content') ?>
    <div class="flex flex-row justify-start content-center">
        <div class="flex-auto w-1/2 border bg-white h-screen">
            <div class="flex flex-col justify-center content-center overflow-hidden h-screen p-5">
                <div class="w-full">
                    <div class="space-y-2 text-center mb-5">
                        <div>
                            <h4 class="font-semibold text-sm">RSUD WALUYO JATI KRAKSAAN PROBOLINGGO</h4>
                            <h1 class="font-bold text-5xl text-center">Selamat datang!</h1>
                        </div>
                        <p class="text-gray-500 text-sm">SISTEM ELEKTRONIK RETENSI DAN PEMUSNAHAN REKAM MEDIS (E-RETNA)</p>
                    </div>
                    <div>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= url_to('login') ?>" class="space-y-4 md:space-y-6" method="POST">
                            <?= csrf_field() ?>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email/Username</label>
                                <input type="text" id="username" name="login" value="" class="<?php if (session('errors.login')) : ?>is-invalid<?php endif ?> bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Username" required="">
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" value="" class="<?php if (session('errors.password')) : ?>is-invalid<?php endif ?> bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Password" required="">
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>
                            <?php if ($config->allowRemembering): ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                        <?=lang('Auth.rememberMe')?>
                                    </label>
                                </div>
                            <?php endif; ?>
							<button type="submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-4 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Masuk Akun</button>
                            <p class="text-center text-sm">© Copyright 2022 - 2024 RSD Waluyo jati</p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" relative flex-auto w-full">
            <img src="<?= base_url('image-HPEm3lmkU-transformed.png') ?>" class="bg-cover w-full h-screen bg-no-repeat bg-center" alt="">
            <div class="overlay"></div>
            <div class="absolute inset-0 flex items-center justify-center text-center content-text">
                <!-- <h1 class="text-white text-4xl font-bold">Rancang Bangun Sistem Elektronik Retensi <br>dan Pemusnahan Rekam Medis (E-RETNA)</h1> -->
            </div>
        </div>
    </div>
<?= $this->endSection() ?>