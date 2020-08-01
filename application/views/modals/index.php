<!-- Modal Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="text-center mb-3">
                                <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <a href="" class="media warna1 shadow-sm"><span class="shadow-lg warna1"><i class="fab fa-google-plus-g icon"></i></span>
                                        &nbsp; Google+
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="" class="media warna2 shadow-lg"><span class="shadow-lg warna2"><i class="fab fa-twitter icon"></i></span> &nbsp; &nbsp; Twitter</a>
                                </div>
                                <div class="col-4">
                                    <a href="" class="media warna3"><span class="shadow-lg warna3"><i class="fab fa-facebook-f icon"></i></span> Facebook</a>
                                </div>
                            </div>
                            <form method="POST" action="<?= base_url('member'); ?>">
                                <p class="text-center text-secondary mt-3">Or Login With Email</p>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" autocomplete>
                                    <div class="show_error" style="font-size: 12px;"></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <div class="show_error_password" style="font-size: 12px;"></div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label font-weight-light text-secondary" for="exampleCheck1">Keep me logged in</label>

                                    <a href="http://" data-dismiss="modal" data-toggle="modal" data-target="#modalForgotPassword" class="font-weight-light">Forgot password</a>
                                </div>
                                <button type="submit" id="submit" name="submit" class="btn mt-2 text-white">Log in</button>
                                <div class="text-center font-weight-light mt-4 text-secondary">Dont have an account? <a href="" data-dismiss="modal" data-toggle="modal" data-target="#modalRegister">Register</a></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="modal-image"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="text-center mb-3">
                                <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <a href="" class="media warna1 shadow-sm"><span class="shadow-lg warna1"><i class="fab fa-google-plus-g icon"></i></span>
                                        &nbsp; Google+
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="" class="media warna2 shadow-lg"><span class="shadow-lg warna2"><i class="fab fa-twitter icon"></i></span> &nbsp; &nbsp; Twitter</a>
                                </div>
                                <div class="col-4">
                                    <a href="" class="media warna3"><span class="shadow-lg warna3"><i class="fab fa-facebook-f icon"></i></span> Facebook</a>
                                </div>
                            </div>
                            <form method="post" action="<?= base_url('member/daftar'); ?>" class="formRegistrasi" autocomplete="off" id="formRegistrasi">
                                <p class="text-center text-secondary mt-3">Register to Member</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                    <div class="show_error_nama" style="font-size: 12px;"></div>
                                    <p id="check_nama"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="alamat_email" name="alamat_email" placeholder="Email">
                                    <div class="show_error_email" style="font-size: 12px;"></div>
                                    <!-- <p id="check_email"></p> -->
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                    <div class="show_error_password" style="font-size: 12px;"></div>
                                    <p id="check_password"></p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirm Password">
                                    <div class="show_error_confirm_password" style="font-size: 12px;"></div>
                                    <p id="check_confirm_password"></p>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label font-weight-light text-secondary" for="exampleCheck1">I agree the terms of service</label>
                                </div>
                                <button type="submit" id="register" name="register" class="btn mt-2 text-white">Register</button>
                                <div class="text-center font-weight-light mt-4 text-secondary">Have you an account? <a href="" data-dismiss="modal" data-toggle="modal" data-target="#modalLogin">Login</a></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="modal-image-register"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<!-- MODAL FORGOT PASSWORD -->
<div class="modal fade" id="modalForgotPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="text-center mb-3">
                                <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <a href="" class="media warna1 shadow-sm"><span class="shadow-lg warna1"><i class="fab fa-google-plus-g icon"></i></span>
                                        &nbsp; Google+
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="" class="media warna2 shadow-lg"><span class="shadow-lg warna2"><i class="fab fa-twitter icon"></i></span> &nbsp; &nbsp; Twitter</a>
                                </div>
                                <div class="col-4">
                                    <a href="" class="media warna3"><span class="shadow-lg warna3"><i class="fab fa-facebook-f icon"></i></span> Facebook</a>
                                </div>
                            </div>
                            <form method="POST" action="<?= base_url('member/forgotPassword'); ?>">
                                <p class="text-center text-secondary mt-3">Forgot Password ?</p>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="alamat_email" name="alamat_email" placeholder="Email Address" autocomplete>
                                    <div class="show_error" style="font-size: 12px;"></div>
                                </div>
                                <button type="submit" id="submit" name="submit" class="btn mt-2 text-white">Reset Password</button>
                                <div class="text-center font-weight-light mt-4 text-secondary"><a href="" data-dismiss="modal" data-toggle="modal" data-target="#modalLogin">Back to login</a></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="modal-image-forgot"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>






<!-- MODAL BUKTI PEMBAYARAN -->

<div class="modal fade" id="modalBuktiPembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-3">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="POST" action="<?= base_url('invoice/invoice'); ?>" enctype="multipart/form-data">
                        <p class="text-center text-secondary mt-3">Upload Bukti Pembayaran</p>
                        <input type="hidden" name="id_user" id="id_user" value="<?= $booking['id_user']; ?>">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" id="pembayaran" class="btn bg-warning mt-3 text-white">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL GANTI FOTO -->
<div class="modal fade" id="modalUbahFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>">
                    </div>
                    <form method="POST" action="<?= base_url('profile/ubahFoto'); ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" value="<?= $user['id_user']; ?>">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        <button type="submit" class="btn bg-warning mt-3 text-white kirim">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL TESTIMONI -->
<div class="modal fade" id="modalTestimoni" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="POST" action="<?= base_url('booking/ulasan'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" id="id_user" value="<?= $booking['id_user']; ?>">
                        <p>Beri Ulasan anda :</p>
                        <div class="form-group">
                            <textarea class="form-control" id="ulasan" name="ulasan" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn bg-warning mt-3 text-white">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Info Batal Booking -->
<!-- Modal -->
<div class="modal fade" id="infoBatal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>">
                    </div>
                    <p class="text-center">Maaf , Booking anda sudah selesai dan tidak bisa dibatalkan!</p>
                    <button type="submit" class="btn bg-warning mt-3 text-white kirim w-100" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>