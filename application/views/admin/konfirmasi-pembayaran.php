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

<div class="card shadow-lg" style="width: 55%; border-top: 3px solid #fbc02d;">
    <div class="card-header">
        Konfirmasi Pembayaran
    </div>
    <div class="card-body text-center">
        <form method="POST" action="<?= base_url('admin/invoice/cekInvoice'); ?>">
            <input type="hidden" name="email" value="<?= $pembayaran['email']; ?>">
            <input type="hidden" name="kode" value="<?= $pembayaran['kd_invoice']; ?>">
            <input type="hidden" name="id" value="<?= $pembayaran['id_user']; ?>">
            <a href="<?= base_url('admin/invoice/invoiceDownload/'); ?><?= $pembayaran['kd_invoice']; ?>" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Download Bukti Pembayaran</a>
            <div class="custom-control custom-switch mt-3">
                <input type="checkbox" class="custom-control-input" id="status_pembayaran" name="status_pembayaran" value="1">
                <label class="custom-control-label" for="status_pembayaran">Konfirmasi Pembayaran</label>
            </div>
            <hr>
            <button type="submit" class="btn btn-sm btn-warning text-white">Simpan</button>
        </form>
    </div>
</div>