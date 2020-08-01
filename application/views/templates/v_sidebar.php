<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <img src="<?= base_url('assets/img/users/'); ?><?= $user['image']; ?>">
        </div>
        <div class="user-name">
            <?= $user['nama']; ?>
        </div>
        <div class="user-designation">
            <?php if ($user['role_id'] == 1) { ?>
                Admin
            <?php } else { ?>
                Member
            <?php } ?>
        </div>
    </div>
    <ul class="nav">
        <?php
        $main_menu = $this->db->get_where('menu', array('is_main_menu' => 0))->result();
        foreach ($main_menu as $main) {
            $sub_menu = $this->db->query("SELECT * FROM menu WHERE is_main_menu = $main->id_menu ORDER BY id_menu DESC");

            if ($sub_menu->num_rows() > 0) {
                echo '<li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="' . $main->url . '" aria-expanded="false" aria-controls="auth">
                    <i class="' . $main->icon . '"></i>
                    <span class="menu-title">' . $main->menu . '</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="' . $main->menu . '">
                    <ul class="nav flex-column sub-menu">
                ';
                foreach ($sub_menu->result() as $sub) {
                    echo '<li class="nav-item"> <a class="nav-link" href="' . base_url($sub->url) . '">' . $sub->menu . '</a></li>';
                }
                echo '</ul></div></li>';
            } else {
                echo '<li class="nav-item">
                <a class="nav-link active" href="' . base_url($main->url) . '">
                    <i class="' . $main->icon . '"></i>
                    <span class="menu-title">' . $main->menu . '</span>
                </a>
            </li>';
            }
        }
        ?>
    </ul>
</nav>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
        <div class="warning-data" data-flashdata="<?= $this->session->flashdata('warning'); ?>"></div>
        <div class="error-data" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>