<div class="menu mb-3   ">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-futbol icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>


<div class="card shadow-lg" style="border-top: 3px solid #fbc02d;">
    <div class="card-body">

        <div class="row">
            <div class="col-lg-6">
                <a data-toggle="modal" data-target="#modalSeason" class="btn btn-warning text-white tombolTambahSeason "><i class="fas fa-plus"></i> Tambah
                    Season
                </a>
            </div>

            <div class="col-lg-12">
                <hr>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="bg-warning text-white">
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Season
                                </th>
                                <th>
                                    Tanggal Input
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($season as $s) : ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?= $s['season']; ?></td>
                                    <td><?= $s['tgl_input']; ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalSeason" data-id="<?= $s['id_season']; ?>" class=" badge badge-success p-2 tombolUbahSeason"><i class="fas fa-edit text-white"></i></a>
                                        <a href="<?= base_url('admin/season/hapusSeason/') . $s['id_season']; ?>" class="badge badge-danger p-2 tombol-hapus"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>



        </div>

    </div>
</div>