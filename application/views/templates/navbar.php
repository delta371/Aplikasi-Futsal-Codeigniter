<div class="daftar-navbar fixed-top">
    <nav class="navbar navbar1 navbar-expand navbar-light ">
        <div class="container">
            <a href="" class="email"><i class="fas fa-envelope icon"></i></a>
            <a class="navbar text-dark" href="<?= base_url('home'); ?>">info@futsalplus.com</a>
            <div class="navbar-nav ml-auto">
                <?php if (empty($this->session->userdata('email'))) { ?>
                    <div class="media mr-5">
                        <a href="" class="nav-item  text-dark"><i class="fab fa-twitter icon"></i></a>
                        <a href="" class="nav-item  text-dark"><i class="fab fa-facebook-f icon"></i></a>
                        <a href="" class="nav-item  text-dark"><i class="fab fa-instagram icon"></i></a>
                    </div>
                <?php } else { ?>
                <?php } ?>
                <?php if (!empty($this->session->userdata('email'))) { ?>
                    <a class="nav-item nav-link text-dark" href="<?= base_url('profile'); ?>"> <?= $user['nama']; ?> <i class="far fa-user-circle mt-1 ml-2"></i></a>
                    <a class="nav-item nav-link text-secondary" href="<?= base_url('member/logout'); ?>">/ Sign Up</a>
                <?php } else { ?>
                    <a class="nav-item nav-link text-dark" data-toggle="modal" data-target="#modalLogin"><i class="fas fa-sign-in-alt"></i> Login</a>
                    <a class="nav-item nav-link text-dark" data-toggle="modal" data-target="#modalRegister">/ Sign In</a>
                <?php } ?>
            </div>
        </div>

    </nav>
    <nav class="navbar navbar2 navbar-expand-sm navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('home'); ?>"><img src="<?= base_url('assets/img/logo/logo baru.png'); ?>" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navbar-menu ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($judul == 'Home') {
                                                echo 'active';
                                            } ?>" href="<?= base_url('home'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php if ($judul == 'Lapangan') {
                                                echo 'active';
                                            } ?>" href="<?= base_url('lapangan'); ?>">Lapangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php if ($judul == 'Waktu') {
                                                echo 'active';
                                            } ?>" href="<?= base_url('waktu'); ?>">Waktu & Biaya</a>
                    </li>
                    <li class="nav-item">

                        <?php
                        $id = $this->session->userdata('id_user');
                        $cek_booking =   $this->db->get_where('booking', ['id_user' => $id])->row_array();
                        if ($cek_booking) { ?>
                            <a class="nav-link  <?php if ($judul == 'Booking') {
                                                    echo 'active';
                                                } ?>" href="<?= base_url('booking/finishBook'); ?>">Booking</a>
                        <?php } else { ?>
                            <a class="nav-link  <?php if ($judul == 'Booking') {
                                                    echo 'active';
                                                } ?>" href="<?= base_url('booking'); ?>">Booking</a>
                        <?php } ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php if ($judul == 'News') {
                                                echo 'active';
                                            } ?>" href="<?= base_url('news'); ?>">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($judul == 'Contact') {
                                                echo 'active';
                                            } ?>" href="<?= base_url('contact'); ?>">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>