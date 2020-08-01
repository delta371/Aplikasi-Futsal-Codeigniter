<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">


    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/lapangan.css'); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">

    <title><?= $judul; ?></title>
</head>

<body>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="warning-data" data-flashdata="<?= $this->session->flashdata('warning'); ?>"></div>
    <div class="error-data" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>