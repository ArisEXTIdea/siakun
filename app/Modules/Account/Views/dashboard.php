<?= $this->extend('themes\MainContainer') ?>

<?= $this->section('meta_data') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="main-container">
    <div id="header" class="w-full py-5 bg-violet-500">
        <h1 class="text-white text-center text-2xl font-bold">SISTEM INFORMASI AKUN</h1>
    </div>
    <div id="content" class="w-full flex flex-col items-center">
        <div id="page-control" class="w-11/12 md:w-2/3 pt-10">
            <a href="/register" class="py-3 px-5 bg-green-400 hover:bg-green-500 rounded text-white">
                <i class="fas fa-plus mr-1"></i>
                Registrasi
            </a>
        </div>
        <?php $session = \Config\Services::session();?>
        <?php if($session->getFlashdata('alert') == 'active'): ?>
        <div id="page-alert" class="w-11/12 md:w-2/3 pt-10">
            <?php if($session->getFlashdata('alert-fail') == 'active'): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Gagal</strong>
                <span class="block sm:inline">Data gagal dihapus.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
            <?php endif;?>
            <?php if($session->getFlashdata('alert-success') == 'active'): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil</strong>
                <span class="block sm:inline">Data berhasil dihapus.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
            <?php endif;?>
        </div>
        <?php endif;?>
        <div id="page-table" class="w-11/12 md:w-2/3 p-10 mt-10 rounded-lg drop-shadow-lg bg-white">
            <table class="w-full">
                <thead>
                    <tr class="bg-violet-500">
                        <th class="py-3 text-white">No</th>
                        <th class="py-3 text-white">Nama</th>
                        <th class="py-3 text-white">Email</th>
                        <th class="py-3 text-white">Level Akun</th>
                        <th class="py-3 text-white"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($userData as $index => $ud):?>
                    <tr>
                        <td class="py-3 border-b text-center"><?= $index + 1 ?></td>
                        <td class="py-3 border-b"><?= $ud['name'] ?></td>
                        <td class="py-3 border-b"><?= $ud['email'] ?></td>
                        <td class="py-3 border-b"><?= $ud['level'] == '0'? 'Admin': 'User' ?></td>
                        <td class="py-3 border-b text-center">
                            <a href="/deleteData/<?= $ud['uid']?>" class="p-3 bg-red-400 hover:bg-red-500 text-white rounded"><i class="fas fa-trash"></i></a>
                            <a href="/detail-akun/<?= $ud['uid']?>" class="p-3 bg-sky-400 hover:bg-sky-500 text-white rounded"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>