<div class="menu mb-3   ">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-address-book icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>


<div class="info-contact">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg" style="border-top: 3px solid #fbc02d;">
                <div class="card-body">
                    <h3>Contact Us</h3>
                    <hr>
                    <form method="POST" action="<?= base_url('admin/contact/ubahContact'); ?>">
                        <input type="hidden" name="id_contact" value="<?= $contact['id_contact']; ?>">
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control form-control-sm rounded-0 " id="telepon" name="telepon" value="<?= $contact['telepon']; ?>">
                            <div class="icon-telepon"><i class="fas fa-phone-alt font"></i></div>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control form-control-sm rounded-0" id="lokasi" name="lokasi" value="<?= $contact['lokasi']; ?>">
                            <div class="icon-lokasi"><i class="fas fa-map-marker-alt font"></i></div>
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control form-control-sm rounded-0" id="website" name="website" value="<?= $contact['website']; ?>">
                            <div class="icon-website"><i class="fas fa-globe font"></i></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control form-control-sm rounded-0" id="email" name="email" value="<?= $contact['email']; ?>">
                            <div class="icon-email"><i class="fas fa-envelope font"></i></div>
                        </div>

                        <button class="btn rounded-0 text-white" style="background-color: black;">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>