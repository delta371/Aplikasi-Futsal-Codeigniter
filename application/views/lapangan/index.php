<div class="headerLapangan">
    <h1 class="text-center">Lapangan Futsal+</h1>
    <h5>Home <i class="fas fa-link"></i> <span>Lapangan</span></h5>
</div>

<div class="lapangan mt-5 mb-5">
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <?php foreach ($lapangan as $l) : ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3 img-lapangan">
                    <div class="card">
                        <div class="image">
                            <img src="<?= base_url('assets/img/lapangan/' . $l['image']); ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="about">
                            <div class="content">
                                <h4><?= $l['nm_lapangan']; ?></h4>
                                <p><?= substr($l['keterangan'], 0, 160); ?></p>
                                <button class="btn btn-outline-warning">Read More</button>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="<?= base_url('booking'); ?>" class="btn btn-warning rounded-0 mt-2 booking text-white">Booking</a>
                        <a href="<?= base_url('lapangan/jadwalLapangan/' . $l['kd_lapangan']); ?>" class="btn btn-danger rounded-0 mt-2 booking text-white">Jadwal</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <p class="mt-5"><?= $this->pagination->create_links(); ?></p>
    </div>
</div>

<div class="fasilitas mb-5">
    <div class="container">
        <div class="text mb-3">
            <h3>Fasilitas</h3>
        </div>

        <div class="row jusify-content-center">
            <div class="col-lg-1 col-md-4 col-sm-6">
                <div class="border d-inline-block mr-3">
                    <a href="http://" class="m-1"><i class="fas fa-restroom icon"></i></a>
                </div>
                <div class="content p-0 pl-2">
                    <p>Toilet</p>
                </div>
            </div>
            <div class="col-lg-1 col-md-4 col-sm-6">
                <div class="border d-inline-block">
                    <a href="http://" class="m-1"><i class="fas fa-wifi icon"></i></a>
                </div>
                <div class="content p-0 pl-2">
                    <p>Wifi</p>
                </div>
            </div>
            <div class="col-lg-1 col-md-4 col-sm-6">
                <div class="border d-inline-block">
                    <a href="http://" class="m-1"><i class="fas fa-mug-hot icon"></i></a>
                </div>
                <div class="content  p-0 pl-2">
                    <p>Caffe</p>
                </div>
            </div>
            <div class="col-lg-1 col-md-4 col-sm-6">
                <div class="border d-inline-block">
                    <a href="http://" class="m-1"><i class="fas fa-shopping-basket icon"></i></a>
                </div>
                <div class="content  p-0">
                    <p>Minimarket</p>
                </div>
            </div>
            <div class="col-lg-1 col-md-4 col-sm-6">
                <div class="border d-inline-block">
                    <a href="http://" class="m-1"><i class="fas fa-music icon"></i></a>
                </div>
                <div class="content p-0 pl-2">
                    <p>Music</p>
                </div>
            </div>
        </div>




    </div>
</div>