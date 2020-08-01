<div class="menu mb-5">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-newspaper icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>


<div class="detail-notifikasi">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-3 font-wight-bold"><b>Rincian Notifikasi</b></h5>
                        <table class="table">
                            <tr>
                                <td>nama</td>
                                <td class=text-right>:</td>
                                <td class="text-right"><?= $notif['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Pesan</td>
                                <td class=text-right>:</td>
                                <td class="text-right"><?= $notif['nama']; ?> Melakukan <?= $notif['type']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td class=text-right>:</td>
                                <td class="text-right"><?= $notif['tanggal']; ?></td>
                            </tr>

                        </table>
                        <div class="text-center">
                            <?php if ($notif['type'] == 'Booking') {  ?>
                                <a href="<?= base_url('admin/booking'); ?>" class="btn btn-warning text-white">Cek Booking</a>
                            <?php } elseif ($notif['type'] == 'Pembayaran') { ?>
                                <a href="<?= base_url('admin/invoice'); ?>" class="btn btn-warning text-white">Cek invoice</a>
                            <?php } else { ?>
                                <a href="<?= base_url('admin/booking'); ?>" class="btn btn-warning text-white">Cek Booking</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>