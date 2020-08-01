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
            <div class="col-lg-3">
                <a data-toggle="modal" data-target="#modalPertandingan" class="btn btn-warning text-white tombolTambahPertandingan "><i class="fas fa-plus"></i> Tambah
                    Pertandingan
                </a>

            </div>


            <div class="col-lg-12">
                <hr>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-striped text-center " style="width: 1200px;">
                        <thead class="bg-warning text-white">
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Competition
                                </th>
                                <th>
                                    Tanggal Main
                                </th>
                                <th>
                                    Jam Mulai
                                </th>
                                <th>
                                    Jam Selesai
                                </th>
                                <th>
                                    Home
                                </th>
                                <th>
                                    Away
                                </th>
                                <th>
                                    Lapangan
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
                            foreach ($pertandingan as $p) :

                            ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?= $p['competition']; ?></td>
                                    <td><?= $p['tgl_main']; ?></td>
                                    <td><?= $p['jam_mulai']; ?></td>
                                    <td><?= $p['jam_selesai']; ?></td>
                                    <?php $logo1 = $p['home'];
                                    $home = $this->db->get_where('team', ['id_team' => $logo1])->row_array();
                                    echo '<td><img src="' . base_url('assets/img/logo_team/') . $home['logo'] . '" class="rounded-0" style="width:50px; height:50px;"></td>' ?>

                                    <?php $logo2 = $p['away'];
                                    $away = $this->db->get_where('team', ['id_team' => $logo2])->row_array();
                                    echo '<td><img src="' . base_url('assets/img/logo_team/') . $away['logo'] . '" class="rounded-0" style="width:50px; height:50px;"></td>' ?>
                                    <td><?= $p['lapangan']; ?></td>

                                    <td><?= $p['tgl_input_pertandingan']; ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalPertandingan" data-id="<?= $p['id_pertandingan']; ?>" class=" badge badge-success p-2 tombolUbahPertandingan"><i class="fas fa-edit text-white"></i></a>
                                        <a href="<?= base_url('admin/pertandingan/hapusPertandingan/') . $p['id_pertandingan']; ?>" class="badge badge-danger p-2 tombol-hapus"><i class="fas fa-trash"></i></a>
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