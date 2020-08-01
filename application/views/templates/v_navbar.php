<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img class="shadow-lg" src="<?= base_url('assets/img/logo/logo baru.png'); ?>" style="width: 150px" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-flex notifikasi">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                            <?php
                            $count = $this->db->query("SELECT * FROM notifikasi_system notif WHERE notif.status = 'unread'")->num_rows();
                            $pesan = $this->db->query("SELECT * FROM notifikasi_system notif, users us WHERE notif.id_user = us.id_user ORDER BY notif.tanggal DESC limit 5")->result_array();
                            if ($count > 0) { ?>
                                <i class="far fa-bell icon mx-0"></i><span class="badge badge-warning text-white mb-3"><?= $count; ?></span>
                            <?php } else { ?>
                                <i class="far fa-bell icon mx-0"></i>
                            <?php }  ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list">
                            <h5 class="mb-0 float-left dropdown-header">Notifikasi</h5>
                            <?php if ($count > 0) {
                                foreach ($pesan as $p) :
                            ?>
                                    <a href="<?= base_url('admin/notifikasi/detailNotifikasi/' . $p['id']); ?>" class="dropdown-item preview-item mb-1 <?php if ($p['status'] == 'unread') {
                                                                                                                                                            echo 'active';
                                                                                                                                                        } ?>">
                                        <div class="image-notif">
                                            <img src="<?= base_url('assets/img/users/' . $p['image']); ?>" alt="image" class="profile-pic">
                                        </div>
                                        <div class="preview-item-content flex-grow ml-3">
                                            <h5 class="preview-subject ellipsis font-weight-normal"><?= $p['nama']; ?></h5>
                                            <small style="font-size: 12px; padding-top: -6px;"><?= time_since(strtotime($p['tanggal'])); ?></small>
                                            <p class="font-weight-light small-text text-muted mb-0">
                                                <?= $p['nama']; ?> melakukan <?= $p['type']; ?>
                                            </p>
                                        </div>
                                        <hr>
                                    </a>
                                <?php endforeach;
                            } else { ?>

                            <?php }  ?>
                            <div class="dropdown-item ">
                                <a href="<?= base_url('admin/notifikasi'); ?>" style="text-decoration: none;">Lihat Semua Notifikasi</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-flex mr-4 ">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="icon-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
                            <a href="<?= base_url('admin/profile/index'); ?>" class="dropdown-item preview-item">
                                <i class="icon-head"></i> Profile
                            </a>
                            <a class="dropdown-item preview-item" href="<?= base_url('admin/auth/logout'); ?>">
                                <i class="icon-inbox"></i> Logout
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-4 d-lg-flex d-none">
                        <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
                            <i class="icon-grid"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">