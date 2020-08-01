<div class="menu mb-5">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-user icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>

<div class="myprofile">
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="image text-center p-5 mb-5">
                <img src="<?= base_url('assets/img/users/'); ?><?= $user['image']; ?>" class="rounded-pill border-lg">
                <h5 class="mt-3 font-weight-bold text-white"><?= $user['nama']; ?></h5>
                <?php if ($user['role_id'] == 1) { ?>
                    <p class="text-white">Admin</p>
                <?php } ?>
                <a href="" class="btn btn-secondary p-3 rounded-pill" data-toggle="modal" data-target="#modalUbahFoto"><img src="<?= base_url('assets/img/icon/camera.png'); ?>" class="image-tombol" alt=""></a>
            </div>
            <div class="kontak mb-2">
                <h5 class="text-dark font-weight-bold">Info Kontak</h5>
                <p>Ponsel</p>
                <div class="row border-bottom">
                    <div class="col-8">
                        <h5 class="text-dark"><button class="rounded-pill btn btn-secondary p-2"><img src="<?= base_url('assets/img/icon/phone.png'); ?>" class="image-tombol" alt=""></button>&ensp;<?= $user['telepon']; ?></h5>
                    </div>
                    <div class="col-4 pt-2 text-right edit">
                        <a href="" data-toggle="modal" data-target="#modalUbahTelepon"><i class="far fa-edit ubah"></i></a>
                    </div>
                </div>
            </div>
            <div class="umum">
                <h5 class="text-dark font-weight-bold">Info Umum</h5>
                <div class="gender">
                    <p>Jenis Kelamin</p>
                    <div class="row border-bottom">
                        <div class="col-6">
                            <h5 class="text-dark"><button class="rounded-pill btn btn-secondary p-2"><i class="far fa-user tombol"></i></button>&ensp;<?= $user['gender']; ?></h5>
                        </div>
                        <div class="col-6 pt-2 text-right edit">
                            <a href="" data-toggle="modal" data-target="#modalUbahJk"><i class="far fa-edit ubah"></i></a>
                        </div>
                    </div>
                    <div class="birthday mt-2">
                        <p>Tanggal Lahir</p>
                        <div class="row border-bottom">
                            <div class="col-6">
                                <h5 class="text-dark"><button class="rounded-pill btn btn-secondary p-2"><img src="<?= base_url('assets/img/icon/birthday.png'); ?>" class="image-tombol" alt=""></button>&ensp;<?= $user['tanggal_lahir']; ?></h5>
                            </div>
                            <div class="col-6 pt-2 text-right edit">
                                <a href="" data-toggle="modal" data-target="#modalUbahTglLahir"><i class="far fa-edit ubah"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="admin mt-2">
                        <p>Admin Sejak</p>
                        <div class="row border-bottom">
                            <div class="col-6">
                                <h5 class="text-dark"><button class="rounded-pill btn btn-secondary p-2"><img src="<?= base_url('assets/img/icon/admin.png'); ?>" class="image-tombol" alt=""></button>&ensp;<?= $user['tanggal_buat']; ?></h5>
                            </div>

                        </div>
                    </div>
                    <div class="admin mt-2">
                        <p>Alamat</p>
                        <div class="row border-bottom">
                            <div class="col-6">
                                <h5 class="text-dark"><button class="rounded-pill btn btn-secondary p-2"><img src="<?= base_url('assets/img/icon/alamat.png'); ?>" class="image-tombol" alt=""></button>&ensp;<?= $user['alamat']; ?></h5>
                            </div>
                            <div class="col-6 pt-2 text-right edit">
                                <a href="" data-toggle="modal" data-target="#modalUbahAlamat"><i class="far fa-edit ubah"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>