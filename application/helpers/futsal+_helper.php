<?php

function is_logged_in()
{
    $ci = get_instance(); //pengganti this, karena $this pada helper tidak termasuk bagian dari CI

    if (!$ci->session->userdata('email')) {
        redirect('admin/auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        if ($role_id == 1) {
        } else {
            redirect('home');
        }
    }
}


function count_lapangan()
{
    $ci = get_instance();
    return $ci->db->count_all_results('lapangan');
}
function count_bank()
{
    $ci = get_instance();
    return $ci->db->count_all_results('bank');
}
function count_member()
{
    $ci = get_instance();
    $ci->db->where(['role_id' => 2]);
    return $ci->db->count_all_results('users');
}
function count_user()
{
    $ci = get_instance();
    $ci->db->where(['role_id' => 1]);
    return $ci->db->count_all_results('users');
}

if (!function_exists('bulan')) {
    function bulan()
    {
        $bulan = Date('m');
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;

            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

if (!function_exists('tanggal')) {
    function tanggal()
    {
        $tanggal = Date('d') . " " . bulan() . " " . Date('Y');
        return $tanggal;
    }
}


function time_since($original)
{
    date_default_timezone_set('Asia/Jakarta');
    $chunks = array(
        array(60 * 60 * 24 * 365, 'tahun'),
        array(60 * 60 * 24 * 30, 'bulan'),
        array(60 * 60 * 24 * 7, 'minggu'),
        array(60 * 60 * 24, 'hari'),
        array(60 * 60, 'jam'),
        array(60, 'menit'),
    );

    $today = time();
    $since = $today - $original;

    if ($since > 604800) {
        $print = date("M jS", $original);
        if ($since > 31536000) {
            $print .= ", " . date("Y", $original);
        }
        return $print;
    }

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];

        if (($count = floor($since / $seconds)) != 0)
            break;
    }

    $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
    return $print . ' yang lalu';
}


function get_Menu()
{
    $ci = get_instance();
    $ci->load->model('ModelUser');
    $ci->load->model('Admin_model');
    $ci->load->model('ModelLapangan');
    $ci->load->model('ModelNews');
    $ci->load->model('ModelBooking');
    $ci->load->model('ModelInvoice');
    $ci->load->model('ModelBookingHistori');
    $ci->load->model('ModelProfit');
    $ci->load->model('ModelNotifikasi');
    $ci->load->model('ModelSlider');
    $ci->load->model('ModelTeam');
    $ci->load->model('ModelCompetition');
    $ci->load->model('ModelTestimoni');
    $ci->load->model('ModelSeason');
    $ci->load->model('ModelPertandingan');
    $ci->load->model('ModelContact');
}
