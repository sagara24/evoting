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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
  <body>
    <!-- nav header-->
    <?php $this->load->view('./admin/_partials/navhead'); ?>
    <!-- Header-->
    <?php $this->load->view('./admin/_partials/header'); ?>
    <!-- Sidebar menu-->
    <?php $this->load->view('./admin/_partials/navbar'); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <div class="welcome-text">
          <h4>Data Kandidat</h4>
          <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Kandidat</a></li>
                        </ol>
                    </div>
                </div>        
          <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <h4 class="card-title">Laporan Data Kandidat</h4>
                          </div>
                          <?php
                          if($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                          <?php
                          }
                          ?>
                          <?php
                          if($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                          <?php
                          }
                          ?>
                          <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dt" class="table align-middle table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kandidat</th>
                                                <th>Nomor Kandidat</th>
                                                <th>Visi & Misi</th>
                                                <th>Foto Kandidat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $no = 1;
                                          foreach ($kandidat as $data) : ?>
                                          <tr>
                                              <td><?= $no; ?></td>
                                              <td><?= $data->nama_kandidat; ?></td>
                                              <td><?= $data->no_kandidat; ?></td>
                                              <td><?= $data->visi_misi; ?></td>
                                              <td>
                                                <img src="<?= base_url('gambar/' . $data->foto_kandidat); ?>" class="img-thumbnail" style="width:200px;height:200px;">
                                              </td>
                                          </tr>
                                          <?php
                                          $no++;
                                          endforeach;
                                          ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="<?= base_url('admin/kandidat/cetak'); ?>" target="blank" class="btn btn-primary">Cetak</a>
        </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <?php $this->load->view('./admin/_partials/bottom'); ?>
  </body>
</html>