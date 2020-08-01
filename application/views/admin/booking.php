<div class="menu mb-3">
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
<div class="card shadow-lg" style="border-top: 3px solid #fbc02d;">
    <div class="card-body text-right">
        <div class="table-responsive pt-3" style="overflow-x: auto;">
            <table class="table table-bordered table-striped text-center" style="width: 1500px !important;">
                <thead class="bg-warning text-white">
                    <tr>
                        <th>No</th>
                        <th>
                            Kode Booking
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Tanggal Booking
                        </th>
                        <th>
                            Jam Mulai
                        </th>
                        <th>
                            Jam Selesai
                        </th>
                        <th>
                            Total Jam
                        </th>
                        <th>
                            Harga
                        </th>
                        <th>
                            Lapangan
                        </th>
                        <th>
                            Status Main
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($booking as $b) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $b['kd_booking']; ?></td>
                            <td><?= $b['nama']; ?></td>
                            <td><?= $b['email']; ?></td>
                            <td><?= tanggal($b['tgl_booking']); ?></td>
                            <td><?= $b['jam_mulai']; ?></td>
                            <td><?= $b['jam_selesai']; ?></td>
                            <td><?= $b['total_jam']; ?></td>
                            <td>Rp. <?= number_format($b['harga'], 0, ',', ','); ?></td>
                            <td><?= $b['nm_lapangan']; ?></td>
                            <td><?= $b['status_main']; ?></td>
                            <?php if ($b['status_main'] == 'Belum Selesai') { ?>
                                <td>
                                    <a href="<?= base_url('admin/booking/bookingSelesai/' . $b['id_user']); ?>" class="badge badge-success p-2 mb-1">
                                        <i class="fas fa-check-circle tombol"></i>
                                    </a>
                                    <a href="<?= base_url('admin/booking/bookingBatal/' . $b['id_user']); ?>" class="badge badge-danger p-2">
                                        <i class="fas fa-times-circle tombol"></i>
                                    </a>
                                </td>
                            <?php } elseif ($b['status_main'] == "Selesai") { ?>
                                <td>
                                    <a class="badge badge-success p-2 mb-1 text-white">
                                        <i class="fas fa-check-circle tombol"></i>
                                    </a>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <a href="<?= base_url('admin/booking/bookingBatal/' . $b['id_user']); ?>" class="badge badge-danger p-2">
                                        <i class="fas fa-times-circle tombol"></i>
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>