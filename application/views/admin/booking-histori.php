<div class="menu mb-3">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-history icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>


<div class="card shadow-lg" style="border-top: 3px solid #fbc02d;">
    <div class="card-body text-right">
        <div class="table-responsive-xl pt-3" style="overflow-x: auto;">
            <table class="table table-bordered table-striped text-center" style="width: 1100px !important;">
                <thead class="bg-warning text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <td>Invoice</td>
                        <th>Lapangan</th>
                        <th>Tanggal Booking</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Total Jam</th>
                        <th>Harga</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $page + 1;
                    foreach ($histori as $h) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $h['nama']; ?></td>
                            <td><?= $h['kd_invoice']; ?></td>
                            <td><?= $h['nm_lapangan']; ?></td>
                            <td><?= $h['tgl_booking']; ?></td>
                            <td><?= $h['jam_mulai']; ?></td>
                            <td><?= $h['jam_selesai']; ?></td>
                            <td><?= $h['total_jam']; ?></td>
                            <td>Rp. <?= number_format($h['harga'], 0, ',', ','); ?></td>
                            <td>Rp. <?= number_format($h['total_bayar'], 0, ',', ','); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><?= $this->pagination->create_links(); ?></p>
        </div>
    </div>
</div>