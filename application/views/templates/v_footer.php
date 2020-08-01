</div>
<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://www.templatewatch.com/" target="_blank" class="text-muted">templatewatch</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="icon-heart"></i></span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- base:js -->
<script src="<?= base_url('assets/template/'); ?>vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= base_url('assets/template/'); ?>js/off-canvas.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/template.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="<?= base_url('assets/template/'); ?>vendors/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="<?= base_url('assets/template/'); ?>js/dashboard.js"></script>
<!-- End custom js for this page-->

<!-- FONTAWESOME -->
<script src="<?= base_url('assets/js/all.min.js'); ?>"></script>

<!-- JAVASCRIPT -->
<script src="<?= base_url('assets/js/admin.js'); ?>"></script>

<!-- Sweet Alert -->
<script src="<?= base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>

<!-- High CHART -->
<script src="<?= base_url('assets/highchart/highcharts.js'); ?>"></script>
<script src="<?= base_url('assets/highchart/exporting.js');  ?>"></script>
<script src="<?= base_url('assets/highchart/export-data.js');  ?>"></script>
<script src="<?= base_url('assets/highchart/accessibility.js');  ?>"></script>

<!-- CANVAS JS -->

<script src="<?= base_url('assets/canvasjs/canvasjs.min.js'); ?>"></script>
<?php
$profit = $this->db->query("SELECT * FROM profit ORDER BY tahun ASC")->result();


foreach ($profit as $p) {
    $data_tahun[] = $p->tahun;
    $data_penghasilan[] = $p->penghasilan;
}

?>


<script>
    // HIGHCHART
    Highcharts.chart('container', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Data Profit Per Tahun Futsal+'
        },
        xAxis: {
            categories: <?php echo json_encode($data_tahun); ?>,
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Millions'
            },
            labels: {
                formatter: function() {
                    return this.value;
                }
            }
        },
        tooltip: {
            split: true,
            valueSuffix: ' millions'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
            name: 'Profit',
            data: <?php echo json_encode($data_penghasilan, JSON_NUMERIC_CHECK); ?>
        }]
    });
</script>

</body>

</html>