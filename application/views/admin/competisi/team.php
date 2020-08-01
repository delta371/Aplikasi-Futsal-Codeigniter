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
                <a data-toggle="modal" data-target="#modalTeam" class="btn btn-warning text-white tombolTambahTeam "><i class="fas fa-plus"></i> Tambah
                    Team
                </a>
            </div>
            <div class="col-lg-4 offset-2 col-md-5 col-sm-12 text-right">
                <form method="POST" action="">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="cari team" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <input class="btn btn-warning text-white" type="submit" value="cari" name="submit">
                        </div>
                    </div>
                </form>

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
                                    Logo
                                </th>
                                <th>
                                    Team
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
                            foreach ($team as $t) : ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><img class="rounded-0" src="<?= base_url('assets/img/logo_team/') .  $t['logo']; ?>" class="img-fluid"></td>
                                    <td><?= $t['nm_team']; ?></td>
                                    <td><?= $t['tgl_input']; ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalTeam" data-id="<?= $t['id_team']; ?>" class=" badge badge-success p-2 tombolUbahTeam"><i class="fas fa-edit text-white"></i></a>
                                        <a href="<?= base_url('admin/team/hapusTeam/') . $t['id_team']; ?>" class="badge badge-danger p-2 tombol-hapus"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-6 mt-3">
                <button class="btn btn-warning text-white">Result : <?= $total_rows; ?></button>
            </div>

            <div class="col-lg-6">
                <p><?= $this->pagination->create_links(); ?></p>
            </div>
        </div>

    </div>
</div>