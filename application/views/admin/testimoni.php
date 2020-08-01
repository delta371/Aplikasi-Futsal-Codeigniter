<div class="menu mb-3">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-user icon"></i></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>

<div class="card shadow-lg" style="border-top: 3px solid #fbc02d;">
    <div class=" card-body">
        <div class="row">
            <div class="col-lg-12">
                <a data-toggle="modal" data-target="#modalTestimoni" class="btn btn-warning text-white tombolTambahLapangan mb-3"><i class="fas fa-plus"></i> Tambah
                    Testimoni
                </a>
            </div>
            <div class="col-12">
                <hr>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="bg-warning text-white">
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Tanggal Ulasan
                                </th>
                                <th>
                                    Ulasan
                                </th>
                                <th>
                                    Action
                                </th>
                        </thead>
                        <tbody>
                            <?php
                            $i = $page + 1;
                            foreach ($testimoni as $t) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $t['nama']; ?></td>
                                    <td><?= $t['tanggal_ulasan']; ?></td>
                                    <td><?= $t['ulasan']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/testimoni/deleteTestimoni/' . $t['id_testimoni']); ?>" class="badge badge-danger btn-icon-text p-2 text-white tombol-hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p><?= $this->pagination->create_links(); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>