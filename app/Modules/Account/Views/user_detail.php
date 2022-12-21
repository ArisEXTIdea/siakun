<?= $this->extend('themes\MainContainer') ?>

<?= $this->section('meta_data') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="main-container">
    <div id="header" class="w-full py-5 bg-violet-500">
        <h1 class="text-white text-center text-2xl font-bold">Akun : <?= $userData['name'] ?> </h1>
    </div>
    <div id="content" class="w-full flex flex-col items-center">
        <div id="page-control" class="w-11/12 md:w-2/3 pt-10">
            <a href="/" class="py-3 px-5 bg-orange-400 hover:bg-orange-500 rounded text-white">
                <i class="fas fa-arrow-left mr-1"></i>
                dashboard
            </a>
        </div>
        <?php $session = \Config\Services::session();?>
        <?php if($session->getFlashdata('alert') == 'active'): ?>
        <div id="page-alert" class="w-11/12 md:w-2/3 pt-10">
            <?php if($session->getFlashdata('alert-fail') == 'active'): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Gagal</strong>
                <span class="block sm:inline">Data gagal diedit.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
            <?php endif;?>
            <?php if($session->getFlashdata('alert-success') == 'active'): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil</strong>
                <span class="block sm:inline">Data berhasil diedit.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
            <?php endif;?>
        </div>
        <?php endif;?>
        <div id="page-detail" class="w-11/12 md:w-2/3 p-10 mt-10 rounded-lg drop-shadow-lg bg-white">
            <div>
                <img src="/assets/uploads/<?= $userData['image']?>" alt="image" class="w-full">
            </div>
            <div id="account-control" class="w-11/12 md:w-2/3 pt-10">
                <a href="/edit-akun/<?= $userData['uid']?>" class="py-3 px-5 bg-blue-400 hover:bg-blue-500 rounded text-white">
                    <i class="fas fa-edit mr-1"></i>
                    Edit Akun
                </a>
                <a href="/ubah-gambar/<?= $userData['uid']?>" class="py-3 px-5 bg-blue-400 hover:bg-blue-500 rounded text-white mx-2">
                    <i class="fas fa-edit mr-1"></i>
                    Ubah Gambar
                </a>
            </div>
            <div id="user-data" class="w-full mt-10">
                <div class="w-full flex flex-row px-10 bg-stone-100 py-4">
                    <div class="w-1/3">
                        <p class="font-bold">Nama</p>
                    </div>
                    <div class="w-2/3">
                        <p>
                            : <?= $userData['name'] ?>
                        </p>
                    </div>
                </div>
                <div class="w-full flex flex-row px-10 bg-stone-100 py-4">
                    <div class="w-1/3">
                        <p class="font-bold">Email</p>
                    </div>
                    <div class="w-2/3">
                        <p>
                            : <?= $userData['email'] ?>
                        </p>
                    </div>
                </div>
                <div class="w-full flex flex-row px-10 bg-stone-100 py-4">
                    <div class="w-1/3">
                        <p class="font-bold">Alamat</p>
                    </div>
                    <div class="w-2/3">
                        <p>
                            : <?= $userData['address'] ?>
                        </p>
                    </div>
                </div>
                <div class="w-full flex flex-row px-10 bg-stone-100 py-4">
                    <div class="w-1/3">
                        <p class="font-bold">Jenis Kelamin</p>
                    </div>
                    <div class="w-2/3">
                        <p>
                            : <?= $userData['gender'] == 'L'? 'Laki-Laki' : 'Perempuan' ?>
                        </p>
                    </div>
                </div>
                <div class="w-full flex flex-row px-10 bg-stone-100 py-4">
                    <div class="w-1/3">
                        <p class="font-bold">Level Pengguna</p>
                    </div>
                    <div class="w-2/3">
                        <p>
                            : <?= $userData['level'] == '0'? 'Admin' : 'User' ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>