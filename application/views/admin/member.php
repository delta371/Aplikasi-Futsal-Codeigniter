<div class="menu mb-3">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-users icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>

<div class="card shadow-lg" style="border-top: 3px solid #fbc02d;">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <a data-toggle="modal" data-target="#modalRegisterMember" class="btn btn-warning text-white tombolTambahLapangan mb-3"><i class="fas fa-plus"></i> Tambah
                    Member
                </a>
            </div>
            <div class="col-lg-4 offset-2 col-md-5 col-sm-12 text-right">
                <form method="POST" action="">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="cari member" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <input class="btn btn-warning text-white" type="submit" value="cari" name="submit">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-12">
                <hr>

                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-striped text-center" style="width: 1150px;">
                        <thead class="bg-warning text-white">
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Gabung
                                </th>
                                <th>
                                    Telepon
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    Image
                                </th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($member)) { ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger" role="alert">
                                            Data not found
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php
                            $i = $page + 1;
                            foreach ($member as $m) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $m['nama']; ?></td>
                                    <td><?= $m['email']; ?></td>
                                    <td><?= $m['role']; ?></td>
                                    <td><?= $m['tanggal_buat']; ?></td>
                                    <td><?= $m['telepon']; ?></td>
                                    <td><?= $m['alamat']; ?></td>
                                    <td class="text-center">
                                        <img src="<?= base_url('assets/img/users/'); ?><?= $m['image']; ?>" class="img-fluid" style="border-radius: 0px; width: 150px; height: 70px;">
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/member/hapusMember/' . $m['id_user']); ?>" class="badge badge-danger btn-icon-text p-2 tombol-hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
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