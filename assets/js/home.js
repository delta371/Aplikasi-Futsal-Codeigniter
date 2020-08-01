$(document).ready(function () {

    $(".navbar-menu  li a").click(function () {
        $("a").removeClass("active");
        $(this).addClass("active");
    });


    $("#next-1").click(function () {
        $("#second").show();
        $("#first").hide();
        $("#booking a").addClass('link');
        $("#booking a").css('color', '#ffffff');
        $("#payment a").addClass('link');
        $("#payment a").css('color', '#ffffff');

    });

    $("#kembali-2").click(function () {
        $("#first").show();
        $("#second").hide();
        $("#payment a").removeClass('link');
        $("#payment a").css('color', '#111111');
        $("#booking a").addClass('link');
        $("#booking a").css('color', '#ffffff');

    });


    // HEADER
    $(window).scroll(function () {
        var wScroll = $(this).scrollTop();

        $('.header h1').css({
            'transform': 'translate(0, ' + wScroll / 1.5 + '%)'
        });

        $('.header .link').css({
            'transform': 'translate(0, ' + wScroll / 1.5 + '%)'
        });

    });


    // Modal GANTI FOTO
    $('.custom-file-input').on('change', function () {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });


    // Modal Login
    $('#submit').on('click', function (e) {
        e.preventDefault();
        var error_email = false;
        var error_password = false;


        var email = $('#email').val();
        var password = $('#password').val();

        if (email == "") {
            $('.show_error').html('**email tidak boleh kosong.');
            $('.show_error').css('color', 'red');
            error_email = true;
        } else {
            $('.show_error').html('');
            error_email = false;
        }
        if (password == "") {
            $('.show_error_password').html('**password tidak boleh kosong.');
            $('.show_error_password').css('color', 'red');
            error_password = true;
        } else {
            $('.show_error_password').html('');
            error_password = false;
        }

        if (error_email == true && error_password == true) {
            return false;
        } else {


            Swal.fire({
                title: 'Anda Yakin ?',
                text: "Pastikan Email dan Password Benar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#fbc02d',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Login'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/futsal+/member/index",
                        data: {
                            email: email,
                            password: password
                        },
                        success: function (data) {
                            var object = JSON.parse(data);
                            Swal.fire({
                                icon: object.icon,
                                title: object.icon,
                                text: object.msg,
                            });
                            if (object.is_true == 1) {
                                setTimeout(function () {
                                    document.location.href = 'http://localhost/futsal+/home/index';
                                }, 1000);
                            } else {
                                setTimeout(function () {
                                    document.location.href = 'http://localhost/futsal+/home/index';
                                }, 1000);
                            }
                        }
                    });
                }
            });
        }

    });


    // Modal Register
    $('#register').on('click', function () {

        var error_nama = false;
        var error_email = false;
        var error_password = false;
        var error_confirm_password = false;


        var namaLengkap = $('#nama').val();
        var emailAddres = $('#alamat_email').val();
        var password = $('#password1').val();
        var confirm_password = $('#password2').val();

        if (namaLengkap == "") {
            $('.show_error_nama').html('**Nama tidak boleh kosong.');
            $('.show_error_nama').css('color', 'red');
            error_nama = true;
        } else {
            $('.show_error_nama').html('');
            error_nama = false;
        }

        if (namaLengkap.length < 3) {
            $('.show_error_nama').html('**Nama lengkap minimal 3 karakter.');
            $('.show_error_nama').css('color', 'red');
            error_nama = true;
        } else {
            $('.show_error_nama').html('');
            error_nama = false;
        }



        if (emailAddres == "") {
            $('.show_error_email').html('**email tidak boleh kosong.');
            $('.show_error_email').css('color', 'red');
            error_email = true;
        } else {
            $('.show_error_email').html('');
            error_email = false;
        }

        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        if (pattern.test(emailAddres)) {
            $('.show_error_email').html('');
            error_email = false;
        } else {
            $('.show_error_email').html('**email tidak valid');
            $('.show_error_email').css('color', 'red');
            error_email = true;
        }



        if (password == "") {
            $('.show_error_password').html('**password tidak boleh kosong.');
            $('.show_error_password').css('color', 'red');
            error_password = true;
        } else {
            $('.show_error_password').html('');
            error_password = false;
        }

        if (password.length < 8) {
            $('.show_error_password').html('**password minimal 8 karakter.');
            $('.show_error_password').css('color', 'red');
            error_password = true;
        } else {
            $('.show_error_password').html('');
            error_password = false;
        }


        if (password != confirm_password) {
            $('.show_error_confirm_password').html('**confirm password tidak cocok dengan password.');
            $('.show_error_confirm_password').css('color', 'red');
            error_confirm_password = true;
        } else {
            $('.show_error_confirm_password').html('');
            error_confirm_password = false;
        }


        if (error_nama == false && error_email == false && error_password == false && error_confirm_password == false) {
            return true;
        } else {
            return false;
        }


    });


    $('#alamat_email').keyup(function () {
        var alamat_email = $('#alamat_email').val();
        if (alamat_email == "") {
            $.ajax({
                type: 'POST',
                url: 'http://localhost/futsal+/member/getMember/',
                data: {
                    'email': email
                },
                success: function (hasil) {
                    console.log()
                }
            })
        }
    });




    // FORM BOOKING
    $('#jam_selesai').keyup(function () {
        var jam_mulai = $('#jam_mulai').val();
        var jam_selesai = $('#jam_selesai').val();

        if (jam_mulai < "12:00:00") {
            biaya = 75000;
            hours = jam_selesai.split(':')[0] - jam_mulai.split(':')[0];
            total = biaya * hours;
            $('#biaya').val('IDR. ' + total);
            $('#subtotal').html('IDR. ' + total);
            $('#grandtotal').html('IDR. ' + total);
        } else if (jam_mulai < "18:00:00") {
            biaya = 100000;
            hours = jam_selesai.split(':')[0] - jam_mulai.split(':')[0];
            total = biaya * hours;
            $('#biaya').val('IDR. ' + total);
            $('#subtotal').html('IDR. ' + total);
            $('#grandtotal').html('IDR. ' + total);
        } else {
            biaya = 125000;
            hours = jam_selesai.split(':')[0] - jam_mulai.split(':')[0];
            total = biaya * hours;
            $('#biaya').val('IDR. ' + total);
            $('#subtotal').html('IDR. ' + total);
            $('#grandtotal').html('IDR. ' + total);
        }

        if (jam_selesai == "") {
            $('#biaya').val('');
            $('#subtotal').html('');
            $('#grandtotal').html('');
        }
    });

    // FINISH BOOKING
    $('#finish-booking').on('click', function () {
        var error_tgl_booking = false;
        var error_jam_mulai = false;
        var error_jam_selesai = false;
        var error_lapangan = false;
        var error_bank = false;

        var tgl_booking = $('#tgl_booking').val();
        var jam_mulai = $('#jam_mulai').val();
        var jam_selesai = $('#jam_selesai').val();
        var lapangan = $('#lapangan').val();
        var bank = $('#bank').val();
        var tgl = new Date();

        if (tgl_booking == '') {
            $('.show_error_tgl_booking').html('**tanggal belum dimasukkan');
            $('.show_error_tgl_booking').css('color', 'red');
            error_tgl_booking = true;
        } else {
            $('.show_error_tgl_booking').html('');
            error_tgl_booking = false;
        }


        if (tgl_booking <= tgl.getDate()) {
            $('.show_error_tgl_booking').html('**tanggal tidak valid');
            $('.show_error_tgl_booking').css('color', 'red');
            error_tgl_booking = true;
        } else {
            $('.show_error_tgl_booking').html('');
            error_tgl_booking = false;
        }

        if (jam_mulai == '') {
            $('.show_error_jam_mulai').html('**jam mulai belum dimasukkan');
            $('.show_error_jam_mulai').css('color', 'red');
            error_jam_mulai = true;
        } else {
            $('.show_error_jam_mulai').html('');
            error_jam_mulai = false;
        }

        if (jam_selesai == '') {
            $('.show_error_jam_selesai').html('**jam selesai belum dimasukkan');
            $('.show_error_jam_selesai').css('color', 'red');
            error_jam_selesai = true;
        } else {
            $('.show_error_jam_selesai').html('');
            error_jam_selesai = false;
        }

        if (lapangan == 'Pilih') {
            $('.show_error_lapangan').html('**lapangan belum dipilih');
            $('.show_error_lapangan').css('color', 'red');
            error_lapangan = true;
        } else {
            $('.show_error_lapangan').html('');
            error_lapangan = false;
        }

        if (bank == '') {
            $('.show_error_bank').html('**bank belum dipilih');
            $('.show_error_bank').css('color', 'red');
            error_bank = true;
        } else {
            $('.show_error_bank').html('');
            error_bank = false;
        }

        if (error_jam_mulai == false && error_jam_selesai == false && error_lapangan == false && error_bank == false) {
            return true;
        } else {
            return false;
        }

    });



    // BATAL BOOKING
    // tombolhapus
    $('#batal-booking').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin',
            text: "Anda akan membatalkan booking",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#fbc02d',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Batal Booking!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
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
    const warningData = $('.warning-data').data('flashdata');
    if (warningData) {
        Swal.fire({
            title: 'Warning',
            text: warningData,
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    }
    const errorData = $('.error-data').data('flashdata');
    if (errorData) {
        Swal.fire({
            title: 'Error',
            text: warningData,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }

});
