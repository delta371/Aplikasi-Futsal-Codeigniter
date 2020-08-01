<div class="headerLapangan">
    <h1 class="text-center">Jadwal Lapangan Futsal+</h1>
    <h5>Home <i class="fas fa-link"></i> <span>Jadwal Lapangan</span></h5>
</div>


<div class="jadwal">
    <div class="container">
        <table class="table mt-5 text-center table-bordered table-striped">
            <thead class="text-white" style="background-color: #fbc02d;">
                <tr>
                    <td>Kode</td>
                    <td>Nama Lapangan</td>
                    <td>Jam Booking</td>
                    <td>Jam Selesai</td>
                    <td>Tanggal Booking</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jadwal as $j) : ?>
                    <tr>
                        <td><?= $j['kd_lapangan']; ?></td>
                        <td><?= $j['nm_lapangan']; ?></td>
                        <td><?= $j['jam_mulai']; ?></td>
                        <td><?= $j['jam_selesai']; ?></td>
                        <td><?= tanggal($j['tgl_booking']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>