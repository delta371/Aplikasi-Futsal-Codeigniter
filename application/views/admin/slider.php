<div class="menu mb-3">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-sliders-h icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>


<div class="card shadow-lg" style="border-top: 3px solid #fbc02d;">
    <div class="card-body text-left">
        <a data-toggle="modal" data-target="#modalSlider" class="btn btn-warning text-white tombolTambahSlider"><i class="fas fa-plus"></i> Tambah
            Slider</a>
        <hr>
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped text-center">
                <thead class="bg-warning text-white">
                    <tr>
                        <th>
                            No
                        </th>
                        <th>
                            Slider
                        </th>
                        <th>
                            Action
                        </th>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($slider as $s) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $s['slider']; ?></td>
                            <td>
                                <a class="badge badge-success btn-icon-text p-2 pb-1 text-white tombolUbahSlider" data-toggle="modal" data-target="#modalSlider" data-id="<?= $s['id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('admin/slider/deleteSlider/' . $s['id']); ?>" class="badge badge-danger btn-icon-text p-2 text-white tombol-hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>