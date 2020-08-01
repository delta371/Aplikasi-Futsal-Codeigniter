<div class="header">
    <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators visible-xs carousel-header">
            <?php $i = 0;
            foreach ($slider as $s) {
                $actives = '';
                if ($i == 0) {
                    $actives = 'active';
                }
            ?>
                <li data-target="#carousel-slider" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>

            <?php $i++;
            } ?>
        </ol>
        <div class="carousel-inner">
            <?php $i = 0;
            foreach ($slider as $s) {
                $actives = '';
                if ($i == 0) {
                    $actives = 'active';
                }
            ?>
                <div class="carousel-item <?= $actives; ?> text-center ">
                    <h1><?= $s['slider']; ?></h1>
                    <a href="http://" class="btn rounded-0 link">Booking</a>
                </div>

            <?php $i++;
            } ?>

        </div>
    </div>
</div>

<div class="competition">
    <div class="container">
        <div class="row">
            <?php
            $tanggal = date('Y-m-d');
            $pertandingan = $this->db->query("SELECT * FROM pertandingan per, lapangan lap WHERE per.lapangan = lap.kd_lapangan AND tgl_main > '$tanggal' OR tgl_main = '$tanggal' OR  tgl_main < '$tanggal'  ")->row_array();
            $home = $pertandingan['home'];
            $away = $pertandingan['away'];
            $get_home = $this->db->get_where('team', ['id_team' => $home])->row_array();
            $get_away = $this->db->get_where('team', ['id_team' => $away])->row_array();

            ?>
            <div class="col-4 text-right">
                <figure class="figure">

                    <div class="figure-img">
                        <img src="<?= base_url('assets/img/competition/') . $get_home['logo']; ?>" class=" figure-img img-fluid">
                    </div>
                    <figcaption class="figure-caption text-center">
                        <h5 class="text-white text-uppercase"><?= $get_home['nm_team']; ?></h5>
                    </figcaption>
                </figure>
            </div>
            <div class="col-4 text-center vs">
                <h2 class="text-white pb-5"><?= $pertandingan['competition']; ?></h2>
                <div class="jadwal">
                    <h5 class="pb-3"><?= tanggal($pertandingan['tgl_main']); ?></h5>
                    <h1 class="pb-3">Vs</h1>
                    <h5><?= $pertandingan['nm_lapangan']; ?> Futsal+</h5>

                </div>
            </div>
            <div class="col-4 text-left">
                <figure class="figure">
                    <div class="figure-img">
                        <img src="<?= base_url('assets/img/competition/') . $get_away['logo']; ?>" class=" figure-img img-fluid">
                    </div>
                    <figcaption class="figure-caption text-center">
                        <h5 class="text-white text-uppercase"><?= $get_away['nm_team']; ?></h5>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</div>

<div class="lapangan mt-5">
    <div class="container">
        <div class="text">
            <h3>Lapangan</h3>
        </div>

        <div class="row mt-3">
            <?php foreach ($lapangan as $l) : ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
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
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>


<div class="waktudanbiaya mb-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 waktuBuka">
                <div class="text">
                    <h3>Waktu Buka</h3>
                </div>
                <table class="table table-striped table-borderless table-dark mt-3">
                    <div class="container">
                        <tbody>
                            <tr class="text-center">
                                <td>Senin</td>
                                <td>06.00.00 am - 10.00.00 pm</td>
                            </tr>
                            <tr class=" text-center">
                                <td>Selasa</td>
                                <td>06.00.00 am - 10.00.00 pm</td>
                            </tr>
                            <tr class="text-center">
                                <td>Rabu</td>
                                <td>06.00.00 am - 10.00.00 pm</td>
                            </tr>
                            <tr class="text-center">
                                <td>Kamis</th>
                                <td>06.00.00 am - 10.00.00 pm</td>
                            </tr>
                            <tr class="text-center">
                                <th>Jumat</th>
                                <td>06.00.00 am - 10.00.00 pm</td>
                            </tr>
                            <tr class="text-center">
                                <td>Sabtu</td>
                                <td>06.00.00 am - 10.00.00 pm</td>
                            </tr>
                            <tr class="text-center">
                                <td>Minggu</td>
                                <td>06.00.00 am - 10.00.00 pm</td>
                            </tr>
                        </tbody>
                    </div>
                </table>
            </div>

            <div class="col-lg-4 biaya">
                <div class="text">
                    <h3>Biaya</h3>
                </div>
                <table class="table border mt-3">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Jam</th>
                            <th scope="col">Biaya Perjam</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>06.00 - 12.00</td>
                            <td>Rp.75.000</td>
                        </tr>
                        <tr>
                            <td>12.00 - 18.00</td>
                            <td>Rp.100.000</td>
                        </tr>
                        <tr>
                            <td>18.00 - 22.00</td>
                            <td>Rp.125.000</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="http://" class="btn rounded-0">Booking</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="news pt-1">
    <div class="container">
        <div class="text mt-5">
            <h3>News</h3>
        </div>
        <div class="row pl-4 pt-4">
            <?php foreach ($news as $n) : ?>
                <div class="col-lg-6 col-md-6 col-sm-12 ">
                    <figure>
                        <img src="<?= base_url('assets/img/news/' . $n['image']); ?>" class="img-fluid" alt="">
                        <figcaption class="figure-caption">
                            <h4 class="text-white"><?= $n['judul']; ?></h4>
                            <a href="" class="btn rounded-0">Read more</a>
                        </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<div class="testimonial pt-5">
    <div class="container">
        <div class="text">
            <h3>Testimonial</h3>
        </div>

        <div id="carousel-slider-testimoni" class="carousel slide mt-3" data-ride="carousel">
            <div class="carousel-inner">
                <?php $i = 0;
                foreach ($testimoni as $t) {
                    $actives = '';
                    if ($i == 0) {
                        $actives = 'active';
                    }
                ?>
                    <div class="carousel-item <?= $actives; ?> text-center ">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12">
                                <img src="<?= base_url('assets/img/users/' . $t['image']); ?>" style="width:300px; height:250px;">
                            </div>
                            <div class="col-lg-5 col-sm-12 text-left">
                                <div class="content p-5">
                                    <h3><?= $t['nama']; ?></h3>
                                    <h5 class="pt-2"><?= $t['ulasan']; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php $i++;
                } ?>

            </div>
            <div class="row">
                <div class="col-2" style="margin-left: 70%;">
                    <a class="carousel-control-prev" href="#carousel-slider-testimoni" role="button" data-slide="prev">
                        <span class="p-1"><i class="fas fa-chevron-left"></i>
                        </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-slider-testimoni" role="button" data-slide="next">
                        <span class="p-1"><i class="fas fa-chevron-right"></i></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>


        </div>
    </div>
</div>