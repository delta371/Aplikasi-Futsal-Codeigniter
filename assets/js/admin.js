$(document).ready(function () {



    $('.tombolTambahLapangan').on('click', function () {
        $('#formLabel').html('Tambah Data Lapangan');
        $('#tombol button[type=submit]').html('Tambah');
        $('#kode').val('');
        $('#nama').val('');
        $('#keterangan').val('');
        $('.custom-file-label').addClass("selected").html('');
        $(".modal-body #pict").attr("src", "http://localhost/futsal+/assets/img/lapangan/default.jpg");
    });
    $('.tombolUbahLapangan').on('click', function () {
        $('#formLabel').html('Ubah Data Lapangan');
        $('#tombol button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/lapangan/ubahLapangan')

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/futsal+/admin/lapangan/getUbahLapangan',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#kode').val(data.kd_lapangan);
                $('#nama').val(data.nm_lapangan);
                $('#keterangan').val(data.keterangan);
                $(".modal-body #pict").attr("src", "http://localhost/futsal+/assets/img/lapangan/" + data.image);
                $('.custom-file-label').addClass("selected").html(data.image);
            }
        });
    });

    $('.tombolTambahNews').on('click', function () {
        $('#tombol button[type=submit]').html('Tambah');
        $('#formLabelNews').html('Tambah Data News');
        $('#judul').val('');
        $('#deskripsi').val('');
        $('.custom-file-label').addClass("selected").html('');
        $(".modal-body #image_news").attr("src", "http://localhost/futsal+/assets/img/news/default.jpg");
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/news/tambahNews');
    });

    $('.tombolUbahNews').on('click', function () {
        $('#formLabelNews').html('Ubah Data News');
        $('#tombol button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/news/ubahNews');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/futsal+/admin/news/getUbahNews',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#judul').val(data.judul);
                $('#deskripsi').val(data.keterangan);
                $(".modal-body #image_news").attr("src", "http://localhost/futsal+/assets/img/news/" + data.image);
                $('.custom-file-label').addClass("selected").html(data.image);
            }
        });
    });

    $('.tombolBuktiPembayaran').on('click', function () {
        const id = $(this).data('id_booking');
        $.ajax({
            url: 'http://localhost/futsal+/home/getUploadBooking',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_booking').val(data.id_booking);
            }
        });
    });


    // SLIDER
    $('.tombolTambahSlider').on('click', function () {
        $('#formLabelSlider').html('Tambah Data Slider');
        $('#tombol button[type=submit]').html('Tambah');
        $('#id').val('');
        $('#slider').val('');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/slider/tambahSlider')
    });
    $('.tombolUbahSlider').on('click', function () {
        $('#formLabelSlider').html('Ubah Data Slider');
        $('#tombol button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/slider/getUbahSlider')

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/futsal+/admin/slider/ubahSlider',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#no').val(data.id);
                $('#slider').val(data.slider);
            }
        });
    });



    // TEAM
    $('.tombolTambahTeam').on('click', function () {
        $('#formLabelTeam').html('Tambah Data Team');
        $('#tombol button[type=submit]').html('Tambah');
        $('#id_team').val('');
        $('#team').val('');
        $('.custom-file-label').addClass("selected").html('');
        $(".modal-body #logo_team").attr("src", "http://localhost/futsal+/assets/img/lapangan/default.jpg");
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/team/tambahTeam');

    });
    $('.tombolUbahTeam').on('click', function () {
        $('#formLabelTeam').html('Ubah Data Team');
        $('#tombol button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/team/ubahTeam')

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/futsal+/admin/team/getUbahTeam',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_team').val(data.id_team);
                $('#team').val(data.nm_team);
                $('#tgl_input').val(data.tgl_input);
                $(".modal-body #logo_team").attr("src", "http://localhost/futsal+/assets/img/logo_team/" + data.logo);
                $('.custom-file-label').addClass("selected").html(data.logo);
            }
        });
    });


    // MODAL SEASON
    $('.tombolTambahSeason').on('click', function () {
        $('#formLabelSeason').html('Tambah Data Season');
        $('#tombol button[type=submit]').html('Tambah');
        $('#id_season').val('');
        $('#season').val('');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/season/tambahSeason')

    });
    $('.tombolUbahSeason').on('click', function () {
        $('#formLabelSession').html('Ubah Data Season');
        $('#tombol button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/season/ubahSeason')

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/futsal+/admin/season/getUbahSeason',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_season').val(data.id_season);
                $('#season').val(data.season);
            }
        });
    });


    // MODAL COMPETITION
    $('.tombolTambahCompetition').on('click', function () {
        $('#formLabelSeason').html('Tambah Data Competition');
        $('#tombol button[type=submit]').html('Tambah');
        $('#id_competition').val('');
        $('#competition').val('');
        $('#season').val('');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/competition/tambahCompetition')

    });
    $('.tombolUbahCompetition').on('click', function () {
        $('#formLabelCompetition').html('Ubah Data Competition');
        $('#tombol button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/competition/ubahCompetition')

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/futsal+/admin/competition/getUbahCompetition',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_competition').val(data.id_competition);
                $('#competition').val(data.competition);
                $('#season').val(data.season);
            }
        });
    });


    // MODAL PERTANDINGAN
    $('.tombolTambahPertandingan').on('click', function () {
        $('#formLabelPertandingan').html('Tambah Data Pertandingan');
        $('#tombol button[type=submit]').html('Tambah');
        $('#id_pertandingan').val('');
        $('#competition').val('');
        $('#tanggal').val('');
        $('#jam_mulai').val('');
        $('#jam_selesai').val('');
        $('#home').val('');
        $('#away').val('');
        $('#lapangan').val('');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/pertandingan/tambahPertandingan');

    });
    $('.tombolUbahPertandingan').on('click', function () {
        $('#formLabelPertandingan').html('Ubah Data Pertandingan');
        $('#tombol button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/futsal+/admin/pertandingan/ubahPertandingan')

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/futsal+/admin/pertandingan/getUbahPertandingan',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_pertandingan').val(data.id_pertandingan);
                $('#competition').val(data.competition);
                $('#tanggal').val(data.tgl_main);
                $('#jam_mulai').val(data.jam_mulai);
                $('#jam_selesai').val(data.jam_selesai);
                $('#home').val(data.home);
                $('#away').val(data.away);
                $('#lapangan').val(data.lapangan);
            }
        });
    });

    // Modal Lapangan
    $('.custom-file-input').on('change', function () {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    // SWEET ALERT
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            title: 'Success',
            text: flashData,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }


    // tombolhapus
    $('.tombol-hapus').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin',
            text: "data ini akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#fbc02d',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });






});    