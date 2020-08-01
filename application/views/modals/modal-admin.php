<!-- Modal Lapangan -->
<div class="modal modal-admin fade" id="modalLapangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="POST" action="<?= base_url('admin/lapangan/tambahLapangan'); ?>" enctype="multipart/form-data">
                        <h5 class="text-center mt-3 font-weight-bold" id="formLabel">Form Tambah Lapangan</h5>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="kode" name="kode" placeholder="Kode Lapangan">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lapangan">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-sm-3">
                                    <img src="" style="width: 100px;" id="pict">
                                </div>
                                <div class=" col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" value="asdsadsada" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row text-center" id="tombol">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger mb-3 text-white" data-dismiss="modal"><i class="fas fa-backward"></i> Kembali</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-warning mb-1 text-white">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal News -->
<div class="modal modal-admin fade" id="modalNews" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="POST" action="<?= base_url('admin/tambahNews'); ?>" enctype="multipart/form-data">
                        <h5 class="text-center mt-3 font-weight-bold" class="formLabelNews" id="formLabelNews">Form Tambah News</h5>
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/users/'); ?>default.jpg" class="image_news" id="image_news" style="width: 100px;">
                                </div>
                                <div class=" col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center" id="tombol">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger mb-3 text-white" data-dismiss="modal"><i class="fas fa-backward"></i> Kembali</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-warning mb-1 text-white">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Team -->
<div class="modal modal-admin fade" id="modalTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="POST" action="<?= base_url('admin/tambahNews'); ?>" enctype="multipart/form-data">
                        <h5 class="text-center mt-3 font-weight-bold" class="formLabelPertandingan" id="formLabelTeam">Form Tambah Team</h5>
                        <input type="hidden" name="id_team" id="id_team">
                        <div class="form-group">
                            <input type="text" class="form-control" id="team" name="team" placeholder="Nama Team">
                        </div>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/users/'); ?>default.jpg" class="logo_team" id="logo_team" style="width: 100px;">
                                </div>
                                <div class=" col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo">
                                        <label class="custom-file-label" for="logo">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center" id="tombol">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger mb-3 text-white" data-dismiss="modal"><i class="fas fa-backward"></i> Kembali</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-warning mb-1 text-white">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Pertandingan -->
<div class="modal modal-admin fade" id="modalPertandingan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="POST" enctype="multipart/form-data">
                        <h5 class="text-center mt-3 font-weight-bold" class="formLabelPertandingan" id="formLabelPertandingan">Form Tambah Pertandingan</h5>
                        <input type="hidden" name="id_pertandingan" id="id_pertandingan">
                        <div class="form-group">
                            <label for="competition">Competition</label>
                            <select class="form-control" id="competition" name="competition">
                                <option value=""></option>
                                <?php $competition = $this->db->get('competition')->result_array();
                                foreach ($competition as $c) :
                                ?>
                                    <option value="<?= $c['competition']; ?>"><?= $c['competition']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="waktu">Waktu Main</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Waktu Pertandingan">
                                </div>
                                <div class="col-lg-4">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    <label for="jam_mulai"></label>
                                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" placeholder="Jam Mulai">
                                </div>
                                <div class="col-lg-4">
                                    <label for="jam_selesai">Jam Selesai</label>
                                    <label for="jam_selesai"></label>
                                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="home">Home</label>
                                    <select class="form-control" id="home" name="home">
                                        <option>-- pilih --</option>
                                        <?php $home = $this->db->get('team')->result_array();
                                        foreach ($home as $h) :
                                        ?>
                                            <option value="<?= $h['id_team']; ?>"><?= $h['nm_team']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="away">Away</label>
                                    <select class="form-control" id="away" name="away">
                                        <option>-- pilih --</option>
                                        <?php
                                        $away = $this->db->get('team')->result_array();
                                        foreach ($away as $a) : ?>
                                            <option value="<?= $a['id_team']; ?>"><?= $a['nm_team']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </div>






                        <div class="form-group">
                            <label for="away">Lapangan</label>
                            <select class="form-control" id="lapangan" name="lapangan">
                                <option>-- pilih --</option>
                                <?php
                                $lapangan = $this->db->get('lapangan')->result_array();
                                foreach ($lapangan as $lap) :
                                ?>
                                    <option value="<?= $lap['kd_lapangan']; ?>"><?= $lap['nm_lapangan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <hr>

                        <div class="row text-center" id="tombol">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger mb-3 text-white" data-dismiss="modal"><i class="fas fa-backward"></i> Kembali</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-warning mb-1 text-white">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Season -->
<div class="modal modal-admin fade" id="modalSeason" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="container">
                    <div class="text-center mt-2 mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="POST" action="<?= base_url('admin/tambahNews'); ?>" enctype="multipart/form-data">
                        <h5 class="text-center mt-3 font-weight-bold" class="formLabelSeason" id="formLabelSession">Form Tambah Season</h5>
                        <input type="hidden" name="id_season" id="id_season">
                        <div class="form-group">
                            <div class="form-group">
                                <select class="form-control" id="season" name="season">
                                    <?php $y = date("Y");
                                    $max = $y + 4;
                                    for ($t = $y; $t <= $max; $t++) :
                                    ?>
                                        <option value="<?= $t; ?>"><?= $t; ?></option>
                                    <?php endfor; ?>
                                </select>

                            </div>
                        </div>
                        <hr>
                        <div class="row text-center" id="tombol">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger mb-3 text-white" data-dismiss="modal"><i class="fas fa-backward"></i> Kembali</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-warning mb-1 text-white">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Competition -->
<div class="modal modal-admin fade" id="modalCompetisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="container">
                    <div class="text-center mt-2 mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="POST" action="<?= base_url('admin/tambahNews'); ?>" enctype="multipart/form-data">
                        <h5 class="text-center mt-3 font-weight-bold" class="formLabelCompetition" id="formLabelCompetition">Form Tambah Competition</h5>
                        <input type="hidden" name="id_competition" id="id_competition">
                        <div class="form-group">
                            <input type="text" class="form-control" id="competition" name="competition" placeholder="Nama Competition">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="season" name="season">
                                <?php
                                $season = $this->db->get('season')->result_array();
                                foreach ($season as $s) :
                                ?>
                                    <option value="<?= $s['id_season']; ?>"><?= $s['season']; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <hr>
                        <div class="row text-center" id="tombol">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger mb-3 text-white" data-dismiss="modal"><i class="fas fa-backward"></i> Kembali</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-warning mb-1 text-white">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MY PROFILE -->
<!-- MODAL GANTI FOTO -->
<div class="modal fade" id="modalUbahFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>">
                    </div>
                    <form method="POST" action="<?= base_url('admin/profile/ubahFoto'); ?>" enctype="multipart/form-data">
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

<!-- MODAL GANTI TELEPON -->
<div class="modal fade" id="modalUbahTelepon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>">
                    </div>
                    <form method="POST" action="<?= base_url('admin/profile/ubahTelepon'); ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" value="<?= $user['id_user']; ?>">
                        <div class="form-group">
                            <label for="telepon" class="font-weight-bold text-dark">Ponsel</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $user['telepon']; ?>">
                        </div>
                        <button type="submit" class="btn bg-warning mt-3 text-white kirim">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL GANTI JK -->
<div class="modal fade" id="modalUbahJk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>">
                    </div>
                    <form method="POST" action="<?= base_url('admin/profile/ubahGender'); ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" value="<?= $user['id_user']; ?>">
                        <div class="form-group">
                            <label for="gender" class="font-weight-bold text-dark">Jenis Kelamin</label>
                            <select class="form-control" id="gender" name="gender">
                                <?php if ($user['gender'] = 'pria') { ?>
                                    <option value="<?= $user['gender']; ?>"><?= $user['gender']; ?></option>
                                    <option value="wanita">wanita</option>
                                <?php } else { ?>
                                    <option value="<?= $user['gender']; ?>"><?= $user['gender']; ?></option>
                                    <option value="pria">pria</option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn bg-warning mt-3 text-white kirim">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL UBAH TGL LAHIR -->
<div class="modal fade" id="modalUbahTglLahir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>">
                    </div>
                    <form method="POST" action="<?= base_url('admin/profile/ubahTglLahir'); ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" value="<?= $user['id_user']; ?>">
                        <div class="form-group">
                            <label for="tgl_lahir" class="font-weight-bold text-dark">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                        </div>
                        <button type="submit" class="btn bg-warning mt-3 text-white kirim">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL UBAH ALAMAT -->
<div class="modal fade" id="modalUbahAlamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>">
                    </div>
                    <form method="POST" action="<?= base_url('admin/profile/ubahAlamat'); ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" value="<?= $user['id_user']; ?>">
                        <div class="form-group">
                            <label for="alamat" class="font-weight-bold text-dark">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat"><?= $user['alamat']; ?></textarea>
                        </div>
                        <button type="submit" class="btn bg-warning mt-3 text-white kirim">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Slider -->
<div class="modal fade" id="modalSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="POST" action="<?= base_url('admin/tambahNews'); ?>">
                        <h5 class="text-center mt-3 font-weight-bold" class="formLabelSlider" id="formLabelSlider">Form Tambah </h5>
                        <input type="hidden" name="no" id="no">
                        <div class="form-group">
                            <input type="text" class="form-control" id="slider" name="slider">
                        </div>
                        <hr>
                        <div class="row text-center" id="tombol">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger mb-3 text-white" data-dismiss="modal"><i class="fas fa-backward"></i> Kembali</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-warning mb-1 text-white">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- TESTIMONI -->
<div class="modal fade" id="modalTestimoni" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="POST" action="<?= base_url('admin/testimoni/tambahTestimoni'); ?>">
                        <h5 class="text-center mt-3 mb-2 font-weight-bold" class="formLabelSlider" id="formLabelSlider">Form Tambah Testimoni </h5>
                        <div class="form-group">
                            <select class="form-control" name="member" id="member">
                                <option>-- Pilih Member --</option>
                                <?php foreach ($member as $m) : ?>
                                    <option value="<?= $m['id_user']; ?>"><?= $m['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="ulasan" name="ulasan" placeholder="Ulasan member"></textarea>
                        </div>
                        <hr>
                        <div class="row text-center" id="tombol">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger mb-3 text-white" data-dismiss="modal"><i class="fas fa-backward"></i> Kembali</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-warning mb-1 text-white">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Register -->

<div class="modal fade" id="modalRegisterMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="text-center mb-2">
                        <img src="<?= base_url('assets/img/logo/logooren.jpg'); ?>" alt="">
                    </div>
                    <form method="post" action="<?= base_url('admin/member/tambahMember'); ?>" class="formRegistrasi">
                        <h5 class="text-center mt-3 font-weight-bold">Form Tambah Member</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirm Password">
                            </div>
                            <hr>
                            <div class="row text-center">
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-danger mb-3 text-white" data-dismiss="modal"><i class="fas fa-backward"></i> Kembali</button>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-warning mb-1 text-white">Tambah</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>