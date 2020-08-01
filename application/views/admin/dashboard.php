<div class="menu mb-5">
    <div class="row judul">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 link">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt icon"></i></a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
        </div><!-- /.col -->
    </div>
</div>


<!-- Main content -->
<section class="dashboard">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
            <div class="info-box">
                <span class="icon bg-info"><i class="fas fa-futbol text-white font"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text text-uppercase">Lapangan</span>
                    <span class="info-box-number"><?= count_lapangan(); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
            <div class="info-box">
                <span class="icon bg-danger"><i class="fas fa-money-check-alt text-white font"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text text-uppercase">Bank</span>
                    <span class="info-box-number"><?= count_bank() ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
            <div class="info-box">
                <span class="icon bg-success"><i class="fas fa-users text-white font"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text text-uppercase">Member</span>
                    <span class="info-box-number"><?= count_member(); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
            <div class="info-box">
                <span class="icon bg-warning"><i class="fas fa-user-plus text-white font"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text text-uppercase">Admin</span>
                    <span class="info-box-number"><?= count_user(); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
</section>


<div class="chart">
    <div class="container">
        <figure class="highcharts-figure">
            <div id="container"></div>

        </figure>
    </div>
</div>