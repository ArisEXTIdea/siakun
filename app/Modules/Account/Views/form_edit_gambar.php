<?= $this->extend('themes\MainContainer') ?>

<?= $this->section('meta_data') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="main-container">
    <div id="header" class="w-full py-5 bg-violet-500">
        <h1 class="text-white text-center text-2xl font-bold">Edit Photo Profil</h1>
    </div>
    <div id="content" class="w-full flex flex-col items-center">
        <div id="page-control" class="w-11/12 md:w-2/3 pt-10">
            <a href="/" class="py-3 px-5 bg-orange-400 hover:bg-orange-500 rounded text-white">
                <i class="fas fa-arrow-left mr-1"></i>
                Dashboard
            </a>
        </div>
        <?php $session = \Config\Services::session();?>
        <div id="page-form" class="w-11/12 md:w-2/3 p-10 mt-10 rounded-lg drop-shadow-lg bg-white">
            <form action="/editDataGambar" method="post" enctype="multipart/form-data">
                <div class="mt-3 hidden"> 
                    <label for="uid" class="font-semibold">UID</label>
                    <input type="text" name="uid" class="px-5 py-3 border rounded w-full mt-3" placeholder="contoh: Muhammad Afrini" value="<?= $userData['uid']?>">
                </div>
                <div class="mt-3"> 
                    <label for="image" class="font-semibold">Foto Profil</label>
                    <input type="file" name="image" class="px-5 py-3 border rounded w-full mt-3">
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