<div class="menu mb-3">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file-invoice icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>


<div class="card shadow-lg" style="border-top: 3px solid #fbc02d;">
    <div class=" card-body text-right">
        <div class="table-responsive pt-3" style="overflow-x: auto;">
            <table class="table table-bordered table-striped text-center" style="width: 1500px !important;">
                <thead class="bg-warning text-white">
                    <tr>
                        <th>No</th>
                        <th>
                            Kode Incoice
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Total Bayar
                        </th>
                        <th>
                            Uang Muka
                        </th>
                        <th>
                            Sisa Bayar
                        </th>
                        <th>
                            Bank
                        </th>
                        <th>
                            Tanggal Pemesanan
                        </th>
                        <th>
                            Batas Pembayaran
                        </th>
                        <th>
                            Status Pembayaran
                        </th>
                        <th>
                            Cek Pembayaran
                        </th>
                    </tr>
                </thead>
                <?php $p = 1;
                foreach ($invoice as $i) : ?>
                    <tr>
                        <td><?= $p++; ?></td>
                        <td><?= $i['kd_invoice']; ?></td>
                        <td><?= $i['nama']; ?></td>
                        <td>Rp. <?= number_format($i['total_bayar'], 0, ',', ','); ?></td>
                        <td>Rp. <?= number_format($i['uang_muka'], 0, ',', ','); ?></td>
                        <td>Rp. <?= number_format($i['sisa_bayar'], 0, ',', ','); ?></td>
                        <td><?= $i['nm_bank']; ?></td>
                        <td><?= $i['tanggal_pemesanan']; ?></td>
                        <td><?= $i['batas_pembayaran']; ?></td>
                        <td><?= $i['status_pembayaran']; ?></td>
                        <?php if (empty($i['bukti_pembayaran'])) { ?>
                            <td><a class="badge badge-danger p-2"><i class="fas fa-times-circle tombol text-white"></i></a></td>
                        <?php } else { ?>
                            <td><a href="<?= base_url('admin/invoice/KonfirmasiInvoice/'); ?><?= $i['kd_invoice']; ?>" class="badge badge-success p-2"><i class="fas fa-check-circle tombol "></i></a></td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>