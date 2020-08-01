<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo text-center">
                            <img src="<?= base_url('assets/img/logo/logooren1.png'); ?>" style="width: 200px;">
                        </div>


                        <form class="pt-3" method="POST" action="<?= base_url('admin/auth/index'); ?>">
                            <div class="text-center">
                                <?= $this->session->flashdata('pesan'); ?>
                            </div>
                            <div class="form-group text-center">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-account-outline text-warning"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="email" class="form-control form-control-lg border-left-0" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-lock-outline text-warning"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg border-left-0" id="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="my-3">
                                <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn text-white">LOGIN</button>
                            </div>


                        </form>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018 All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->