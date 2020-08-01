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
                <a data-toggle="modal" data-target="#modalCompetisi" class="btn btn-warning text-white tombolTambahCompetition "><i class="fas fa-plus"></i> Tambah
                    Competisi
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
                                    Competition
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
                            $t = 1;
                            foreach ($competition as $c) : ?>
                                <tr>
                                    <td><?= $t++; ?></td>
                                    <td><?= $c['competition'] ?></td>
                                    <td><?= $c['season']; ?></td>
                                    <td><?= $c['tgl_input_competition']; ?></td>
                                    <td>
                                        <a href="" class="badge badge-success p-2  tombolUbahCompetition " data-id="<?= $c['id_competition']; ?>" data-toggle="modal" data-target="#modalCompetisi"><i class="fas fa-edit"></i></a>
                                        <a href="" class="badge badge-danger p-2"><i class="fas fa-trash"></i></a>
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