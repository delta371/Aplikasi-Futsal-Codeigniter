<div class="menu mb-5">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-key icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>

<div class="bookingSelesai">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('admin/booking/bookingSelesaiAksi'); ?>">
                        <input type="hidden" name="kode" id="kode" value="<?= $booking['kd_booking']; ?>">
                        <input type="hidden" name="id" id="id" value="<?= $booking['id_user']; ?>">
                        <div class="form-group">
                            <label for="tanggal">Tanggal Booking</label>
                            <input type="text" class="form-control" id="tanggal" value="<?= $booking['tgl_booking']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="text" class="form-control" id="jam_mulai" value="<?= $booking['jam_mulai']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jam_selesai">Jam Selesai</label>
                            <input type="text" class="form-control" id="jam_selesai" value="<?= $booking['jam_selesai']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status_booking">Status Booking</label>
                            <select class="form-control" id="status_main" name="status_main">
                                <?php if ($booking['status_main'] == 'Belum Selesai') { ?>
                                    <option value="<?= $booking['status_main']; ?>"><?= $booking['status_main']; ?></option>
                                    <option value="Selesai">Selesai</option>
                                <?php } else { ?>
                                    <option value="<?= $booking['status_main']; ?>"><?= $booking['status_main']; ?></option>
                                    <option value="Belum Selesai">Belum Selesai</option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning text-white" style="width: 100%;">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>