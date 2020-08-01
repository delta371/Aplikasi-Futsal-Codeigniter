<div class="menu mb-3">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-newspaper icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>

<div class="notifikasi">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg" style="border-top: 3px solid #fbc02d;">
                    <div class="card-body">
                        <h5 class="mb-3">Notifikasi :</h5>
                        <table class="table table-hover">
                            <?php foreach ($notif as $n) : ?>

                                <tr class="<?php if ($n['status'] == 'unread') {
                                                echo 'active';
                                            } ?>">
                                    <td><a href="<?= base_url('admin/notifikasi/detailNotifikasi/' . $n['id']); ?>"><?= $n['nama']; ?> </a></td>
                                    <td class="text-right"><?= $n['type']; ?></td>
                                    <td><a href="<?= base_url('admin/notifikasi/deleteNotifikasi/' . $n['id']); ?>"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>