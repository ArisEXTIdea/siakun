<?= $this->extend('themes\MainContainer') ?>

<?= $this->section('meta_data') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="main-container">
    <div id="header" class="w-full py-5 bg-violet-500">
        <h1 class="text-white text-center text-2xl font-bold">Edit Akun</h1>
    </div>
    <div id="content" class="w-full flex flex-col items-center">
        <div id="page-control" class="w-11/12 md:w-2/3 pt-10">
            <a href="/" class="py-3 px-5 bg-orange-400 hover:bg-orange-500 rounded text-white">
                <i class="fas fa-arrow-left mr-1"></i>
                Dashboard
            </a>
        </div>
        <?php $session = \Config\Services::session();?>
        <?php if($session->getFlashdata('alert') == 'active'): ?>
        <div id="page-alert" class="w-11/12 md:w-2/3 pt-10">
            <?php if($session->getFlashdata('alert-fail') == 'active'): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Gagal</strong>
                <span class="block sm:inline">Data gagal disimpan.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
            <?php endif;?>
            <?php if($session->getFlashdata('alert-success') == 'active'): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil</strong>
                <span class="block sm:inline">Data berhasil disimpan.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
            <?php endif;?>
        </div>
        <?php endif;?>
        <div id="page-form" class="w-11/12 md:w-2/3 p-10 mt-10 rounded-lg drop-shadow-lg bg-white">
            <form action="/editData" method="post" enctype="multipart/form-data">
                <div class="mt-3 hidden"> 
                    <label for="uid" class="font-semibold">UID</label>
                    <input type="text" name="uid" class="px-5 py-3 border rounded w-full mt-3" placeholder="contoh: Muhammad Afrini" value="<?= $userData['uid']?>">
                </div>
                <div class="mt-3"> 
                    <label for="name" class="font-semibold">Nama Lengkap</label>
                    <input type="text" name="name" class="px-5 py-3 border rounded w-full mt-3" placeholder="contoh: Muhammad Afrini" value="<?= $userData['name']?>">
                </div>
                <div class="mt-3">
                    <label for="email" class="font-semibold">Email</label>
                    <input type="email" name="email" class="px-5 py-3 border rounded w-full mt-3" placeholder="contoh: emailku@gmail.com" value="<?= $userData['email']?>">
                </div>
                <div class="mt-3">
                    <label for="password" class="font-semibold">Password</label>
                    <input type="password" name="password" class="px-5 py-3 border rounded w-full mt-3" placeholder="Masukkan Password" value="<?= $userData['password']?>">
                </div>
                <div class="mt-3">
                    <label for="address" class="font-semibold">Alamat</label>
                    <input type="text" name="address" class="px-5 py-3 border rounded w-full mt-3" placeholder="contoh: Jl. Gunung KILO" value="<?= $userData['address']?>">
                </div>
                <div class="mt-3">
                    <label for="gender" class="font-semibold">Jenis Kelamin</label>
                    <select  name="gender" class="px-5 py-3 border rounded w-full mt-3">
                        <option value="L">Pilih salah satu</option>
                        <option value="L" <?= $userData['gender'] == 'L' ? 'selected': ''  ?>>Laki-laki</option>
                        <option value="P" <?= $userData['gender'] == 'P' ? 'selected': ''  ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="level" class="font-semibold">Level Akun</label>
                    <select  name="level" class="px-5 py-3 border rounded w-full mt-3">
                        <option value="1">Pilih salah satu</option>
                        <option value="0" <?= $userData['level'] == '0' ? 'selected': ''  ?>>Admin</option>
                        <option value="1" <?= $userData['level'] == '1' ? 'selected': ''  ?>>User</option>
                    </select>
                </div>
                <div class="mt-3">
                <button type="submit" class="py-3 px-5 bg-violet-400 hover:bg-violet-500 rounded text-white">
                    Simpan
                </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>