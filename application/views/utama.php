<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pilketos - Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/smk salaf.png'); ?>">
    <link href="<?= base_url('assets/vendor/pg-calendar/css/pignose.calendar.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/chartist/css/chartist.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>
  <body>
    <!-- nav header-->
    <?php $this->load->view('_partials/navhead'); ?>
    <!-- Header-->
    <?php $this->load->view('_partials/header'); ?>
    <!-- Sidebar menu-->
    <?php $this->load->view('_partials/navbar'); ?>
    <main class="app-content">
      <div class="app-title">
        
      </div>
      <?php $this->load->view('_partials/card'); ?>
    </main>
    <!-- Essential javascripts for application to work-->
    <?php $this->load->view('_partials/bottom'); ?>
  </body>
</html>