<form method="POST" action="<?= base_url('booking/booking'); ?>">
    <div class="crumb ">
        <div class="row">
            <div class="col-lg-2 col-sm-12">
                <div class="content">
                    <a href="<?= base_url('home'); ?>"><img src="<?= base_url('assets/img/logo/logooren1.png'); ?>" alt=""></a>
                </div>
            </div>
            <div class="col-lg-10 col-sm-12">
                <ul class="nav-crumb">
                    <li id="booking"><a class="link text-white">Booking</a></li>
                    <li id="payment"><a>Payment</a></li>
                    <li id="finnished"><a>Finished</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="form-booking mt-5 mb-5">
            <div class="container">
                <div class="row" id="first">
                    <div class="col-lg-8">
                        <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user']; ?>">
                        <div class="form-group user">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control input" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly>
                            <i class="fas fa-user tombol"></i>
                        </div>
                        <div class="form-group email">
                            <label for="email">Email</label>
                            <input type="text" class="form-control input" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                            <i class="fas fa-envelope tombol"></i>
                        </div>
                        <div class="form-group tanggal">
                            <label for="tgl_booking">Tanggal</label>
                            <input type="date" class="form-control input" id="tgl_booking" name="tgl_booking" style="width: 350px;">
                            <img src="<?= base_url('assets/img/icon/tanggal.png'); ?>" alt="">
                            <p class="show_error_tgl_booking"></p>
                        </div>
                        <div class="form-row total_biaya">
                            <div class="form-group col-md-3">
                                <label for="jam">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                                <p class="show_error_jam_mulai"></p>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="jam_selesai">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
                                <p class="show_error_jam_selesai"></p>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Biaya">Biaya (Otomatis Muncul)</label>
                                <input type="text" class="form-control" id="biaya" name="biaya" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="durasi">Pilih lapangan</label><br>
                            <select class="custom-select input" id="lapangan" name="lapangan" style="width: 420px;">
                                <option>Pilih</option>
                                <?php foreach ($lapangan as $l) : ?>
                                    <option value="<?= $l['kd_lapangan']; ?>"><?= $l['nm_lapangan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="show_error_lapangan"></p>
                        </div>

                        <div class="peraturan mt-5">
                            <div class="container">
                                <h5 class="mb-4">* Syarat dan Ketentuan :</h5>


                                <p>- Biaya yang di transfer hanya 1/2 dari harga asli</p>
                                <p>- Untuk sisa pembayaran di lakukan di tempat Futsal+</p>
                                <p>- Batas Waktu Keterlambatan Saat Tiba Hanya 10 menit</p>
                                <p>- Jika melewati batas waktu transfer maka pembokingan <br> di anggap hangus</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-6 action">
                        <a href="<?= base_url('home'); ?>" class="page"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="col-6 text-right action">
                        <a id="next-1" class="page">Next Step <i class="fas fa-chevron-right"></i></a>
                    </div>


                </div>

                <div class="row mt-5" id="second">
                    <div class="col-lg-12">
                        <h3>Payment Method</h3>
                    </div>
                    <div class="col-lg-8">
                        <div class="payment p-5">
                            <div class="row">
                                <?php $i = 1;
                                foreach ($bank as $b) : ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="bank" name="inlineRadioOptions" value="<?= $b['id_bank']; ?>">
                                        <label class="form-check-label" for="<?= $b['nm_bank']; ?>">
                                            <img src="<?= base_url('assets/img/logobank/' . $b['image_bank']); ?>" alt="">
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                                <p class="show_error_bank"></p>
                            </div>
                            <p class="font-weight-bold mt-4">Bagi yang ingin transfer melalui : <br>
                                ATM Sektor tunai, M-banking, SMS Banking, E-Banking </p>
                            <p>Harap perhatikan setelah selesai melakukan booking harap segera <br>
                                lakukan transfer dan konfirmasi transfer <span>Maksimal 24 jam</span> setelah selesai booking
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 biaya mt-5">
                        <h5>Biaya yang harus di transfer</h5>
                        <table class="table border mt-3">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Biaya Perjam</th>
                                    <th scope="col">Transfer</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>06.00 - 12.00</td>
                                    <td>Rp.75.000</td>
                                    <td>Rp.36.000</td>
                                </tr>
                                <tr>
                                    <td>12.00 - 18.00</td>
                                    <td>Rp.100.000</td>
                                    <td>Rp.50.000</td>
                                </tr>
                                <tr>
                                    <td>18.00 - 22.00</td>
                                    <td>Rp.125.000</td>
                                    <td>Rp.63.000</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>* Sisa pembayaran dilakukan ditempat Futsal+ *</p>
                    </div>

                    <div class="col-lg-8 mt-5">
                        <div class="subtotal">
                            <table class="table ">
                                <th colspan="2">Cost Summary</th>

                                <tr>
                                    <td>Subtotal</td>
                                    <td class="text-right" id="subtotal"></td>
                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td class="text-right" class="grandtotal" id="grandtotal"></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-6 action">
                                <a href="http://" class="page" id="kembali-2"><i class="fas fa-chevron-left"></i> Kembali</a>
                            </div>
                            <div class="col-6 text-right action">
                                <button type="submit" id="finish-booking" class="page">Finish Book <i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>



                    </div>

                </div>

            </div>

        </div>
    </div>



</form>