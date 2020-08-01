<div class="myprofile pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul>
                    <li><a href="<?= base_url('profile'); ?>" class="active">My Account</a></li>
                    <li><a href="<?= base_url('profile/editPassword'); ?>">Edit Password</a></li>
                    <li><a href="<?= base_url('profile/bookingTransaksi'); ?>">Booking Transaksi</a></li>
                    <li><a href="<?= base_url('profile/bookingHistori'); ?>">Booking History</a></li>
                    <li><a href="<?= base_url('member/logout'); ?>">Logout</a></li>
                </ul>
            </div>

            <div class="col-lg-8">
                <div class="myprofile">
                    <h3>My Profile</h3>
                    <div class="image text-center mb-5">
                        <img src="<?= base_url('assets/img/users/'); ?><?= $user['image']; ?>" class="rounded-pill mt-5 border-lg">
                        <h5 class=" mt-3 font-weight-bold text-white"><?= $user['nama']; ?></h5>
                        <?php if ($user['role_id'] == 1) { ?>
                            <p class=" mb-5 text-light">Admin</p>
                        <?php } else { ?>
                            <p class="pb-4 text-light">Member</p>
                        <?php } ?>
                        <a href="" class="btn btn-light  rounded-pill" data-toggle="modal" data-target="#modalUbahFoto"><img src="<?= base_url('assets/img/icon/camera.png'); ?>" class="image-tombol" alt=""></a>
                    </div>
                    <div class="kontak mb-2">
                        <h5 class="text-dark font-weight-bold">Info Kontak</h5>
                        <p>Ponsel</p>
                        <div class="row border-bottom">
                            <div class="col-8">
                                <h5 class="text-dark"><button class="rounded-pill btn tombol "><img src="<?= base_url('assets/img/icon/phone.png'); ?>" class="image-tombol" alt=""></button>&ensp;<?= $user['telepon']; ?></h5>
                            </div>
                            <div class="col-4 pt-2 text-right edit">
                                <a href="<?= base_url('profile/ubahTelepon'); ?>"><i class="far fa-edit ubah"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="umum">
                        <h5 class="text-dark font-weight-bold">Info Umum</h5>
                        <div class="gender">
                            <p>Jenis Kelamin</p>
                            <div class="row border-bottom">
                                <div class="col-6">
                                    <h5 class="text-dark"><button class="rounded-pill btn tombol"><img src="<?= base_url('assets/img/icon/user.png'); ?>" class="image-tombol"></button>&ensp;<?= $user['gender']; ?></h5>
                                </div>
                                <div class=" col-6 pt-2 text-right edit">
                                    <a href="<?= base_url('profile/ubahGender'); ?>"><i class="far fa-edit ubah"></i></a>
                                </div>
                            </div>
                            <div class="birthday mt-2">
                                <p>Tanggal Lahir</p>
                                <div class="row border-bottom">
                                    <div class="col-6">
                                        <h5 class="text-dark"><button class="rounded-pill btn tombol"><img src="<?= base_url('assets/img/icon/birthday.png'); ?>" class="image-tombol" alt=""></button>&ensp;<?= $user['tanggal_lahir']; ?></h5>
                                    </div>
                                    <div class="col-6 pt-2 text-right edit">
                                        <a href="<?= base_url('profile/ubahTglLahir'); ?>"><i class="far fa-edit ubah"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="admin mt-2">
                                <p>Member Sejak</p>
                                <div class="row border-bottom">
                                    <div class="col-6">
                                        <h5 class="text-dark"><button class="rounded-pill btn tombol"><img src="<?= base_url('assets/img/icon/admin.png'); ?>" class="image-tombol" alt=""></button>&ensp;<?= $user['tanggal_buat']; ?></h5>
                                    </div>

                                </div>
                            </div>
                            <div class="admin mt-2">
                                <p>Alamat</p>
                                <div class="row border-bottom">
                                    <div class="col-6">
                                        <h5 class="text-dark"><button class="rounded-pill btn tombol"><img src="<?= base_url('assets/img/icon/alamat.png'); ?>" class="image-tombol" alt=""></button>&ensp;<?= $user['alamat']; ?></h5>
                                    </div>
                                    <div class="col-6 pt-2 text-right edit">
                                        <a href="<?= base_url('profile/ubahAlamat'); ?>"><i class="far fa-edit ubah"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>