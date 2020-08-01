<div class="brands mt-5 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="<?= base_url('assets/img/brands/adidas1.png'); ?>">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="<?= base_url('assets/img/brands/molten.png'); ?>">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="<?= base_url('assets/img/brands/adidas1.png'); ?>">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="<?= base_url('assets/img/brands/molten.png'); ?>">
            </div>
        </div>
    </div>
</div>


<div class="contact pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 pt-5">
                <?php $contact = $this->db->get('info_contact')->row_array(); ?>
                <ul>
                    <h3 class="mb-4">Contact Us</h3>
                    <li><a class="d-inline-block"><i class="fas fa-phone-alt icon"></i></a><span><?= $contact['telepon']; ?></span></li>
                    <li><a class="d-inline-block"><i class="fas fa-map-marker-alt icon"></i></a><span><?= $contact['lokasi']; ?></span></li>
                    <li><a class="d-inline-block"><i class="fas fa-globe icon"></i></a><span><?= $contact['website']; ?></span></li>
                    <li><a class="d-inline-block"><i class="fas fa-envelope icon"></i></a><span><?= $contact['email']; ?></span></li>
                </ul>

            </div>
            <div class="col-lg-8 col-md-12 col-sm-12  pt-5 pl-5 mb-5 d-none">
                <h3 class="mb-3">Maps</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63417.016917467365!2d106.73072226583314!3d-6.576632332321363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4f738972703%3A0x2c04739fc32b8e0e!2sKec.%20Bogor%20Bar.%2C%20Kota%20Bogor%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1587555507440!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>