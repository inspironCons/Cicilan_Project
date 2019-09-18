<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=title()?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>css/bootstrap-daterangepicker.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <span class="navbar-brand mb-0 h1"></span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="<?=set_url('Konsumen')?>">Dashboard <span class="sr-only"></span></a>
      <a class="nav-item nav-link" href="<?=set_url('Konsumen')?>">Konsumen</a>
      <a class="nav-item nav-link" href="<?=set_url('Laporan')?>">Laporan</a>
      <a class="nav-item nav-link" href="#">Users</a>
    </div>
  </div>
</div>
</nav>