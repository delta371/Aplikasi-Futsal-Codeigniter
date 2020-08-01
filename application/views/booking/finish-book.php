<div class="crumb ">
    <div class="row">
        <div class="col-lg-2 col-sm-12">
            <div class="content">
                <a href="<?= base_url('home'); ?>"><img src="<?= base_url('assets/img/logo/logooren1.png'); ?>"></a>
            </div>
        </div>
        <div class="col-lg-10 col-sm-12">
            <ul class="nav-crumb text-white">
                <li id="booking"><a class="link">Booking</a></li>
                <li id="payment"><a class="link">Payment</a></li>
                <li id="finnished"><a class="link">Finished</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="finishbook mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="detail-booking">
                    <h5 class="text-success">Booking Finished - Please Make a Payment</h5>
                    <table>
                        <th colspan="2">Member</th>
                        <tr>
                            <td>Tanggal Booking &ensp; &ensp;</td>
                            <td>:</td>
                            <td><?= tanggal($booking['tgl_booking']); ?></td>
                        </tr>
                        <tr>
                            <td>ID Member</td>
                            <td>:</td>
                            <td><?= $booking['id_user']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $booking['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <?php if (empty($invoice['bukti_pembayaran'])) {  ?>
                                <td>Menunggu Pembayaran</td>
                            <?php } elseif ($invoice['status_pembayaran'] == 0) { ?>
                                <td>Menunggu Konfirmasi</td>
                            <?php } elseif ($invoice['status_pembayaran'] == 1) { ?>
                                <td>Pembayaran Selesai</td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $booking['email']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        <div class="invoice mt-5">
            <h5 class="text-danger">INVOICE : <?= $invoice['kd_invoice']; ?></h5>

            <table class="table ">
                <tr>
                    <td>Lapangan</td>
                    <td class="text-right text-danger"><?= $booking['nm_lapangan']; ?> &ensp; Futsal+</td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td class="text-right text-danger"><?= $booking['jam_mulai']; ?></td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td class="text-right text-danger"><?= $booking['total_jam']; ?> &ensp; Jam</td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td class="text-right text-danger">IDR <?= number_format($invoice['uang_muka'], 0, ',', ',');  ?></td>
                </tr>
                <tr>
                    <td>Grand Total</td>
                    <td class="text-right text-danger">IDR <?= number_format($invoice['uang_muka'] + 123, 0, ',', ',');  ?></td>
                </tr>
            </table>

        </div>


        <div class="keterangan">
            <p>Silahkan Lakukan Pembayaran Dengan Jumlah : </p>
            <p class="text-danger"><span class="font-weight-bold">IDR <?= number_format($invoice['uang_muka'] + 123, 0, ',', ',');  ?></span> (dengan 3 digit kode unik) </p>
            <p>Untuk membedakan pembayaran anda dengan customer lainnya dan proses verifikasi pembayaran otomatis dalam hitungan menit oleh sistem kami</p>

            <div class="row p-3 border">
                <div class="col-lg-6 text-center">
                    <p>Metode Pembayaran yang dipilih</p>
                    <p>Transfer Bank</p>
                    <img src="<?= base_url('assets/img/logobank/'); ?><?= $invoice['image_bank']; ?>" alt="">
                    <p class="pt-3"><?= $invoice['no_rekening']; ?></p>
                    <p>Futsal+</p>
                </div>
                <div class="col-lg-6 text-center">
                    <p class="font-wight-bold">Batas waktu pembayaran</p>
                    <p class="pt-5"><?= tanggal($invoice['batas_pembayaran']); ?> </p>
                    <p>Pukul, <?= date("H:i", strtotime($invoice['batas_pembayaran'])); ?> </p>
                </div>
            </div>

            <p class="pt-5">Konfirmasi pembayaran</p>
            <?php if (empty($invoice['bukti_pembayaran'])) {  ?>
                <p>Upload bukti pembayaran untuk mempercepat verifikasi</p>

                <a data-toggle="modal" data-target="#modalBuktiPembayaran" class="btn btn-danger text-white">Konfirmasi Pembayaran</a>
                <p class="mb-5 mt-2">Demi keamanan transaksi anda, pastikan untuk menginformasikan bukti dan data pembayaran ke pihak lain</p>
            <?php } elseif ($invoice['status_pembayaran'] == 0) { ?>
                <p>Pembayaran segera di proses, silahkan untung menunggu</p>

                <a href="<?= base_url('home'); ?>" class="btn btn-warning text-white">Menunggu Konfirmasi</a>
                <p class="mb-5 mt-2">Demi keamanan transaksi anda, pastikan untuk menginformasikan bukti dan data pembayaran ke pihak lain</p>
            <?php } elseif ($invoice['status_pembayaran'] == 1) { ?>
                <p>Download bukti transaksi untuk di menunjukkan ke pihak Futsal+</p>

                <a href="" class="btn btn-success text-white"><i class="fas fa-check"></i> Pembayaran Selesai</a>
                <p class="mb-5 mt-2">Demi keamanan transaksi anda, pastikan untuk menginformasikan bukti dan data pembayaran ke pihak Futsal+</p>
            <?php } ?>



        </div>



    </div>
</div>