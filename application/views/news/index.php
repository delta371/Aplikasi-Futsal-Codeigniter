<div class="headerLapangan">
    <h1 class="text-center">News Futsal+</h1>
    <h5>Home <i class="fas fa-link"></i> <span>News</span></h5>
</div>


<div class="newsLapangan pt-5">
    <div class="container">
        <div class="row pl-4 pt-4">
            <?php foreach ($news as $n) : ?>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <figure>
                        <img src="<?= base_url('assets/img/news/' . $n['image']); ?>" class="img-fluid" alt="">
                        <figcaption class="figure-caption mt-2">
                            <h4><?= $n['judul']; ?></h4>
                            <a href="" class="btn rounded-0">Read more</a>
                        </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>