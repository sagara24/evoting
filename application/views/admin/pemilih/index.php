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
    <!-- data tables -->
    <link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.css'); ?>">
    <script src="<?= base_url('assets/datatables/datatables.js'); ?>"></script>
    <style>
        .toolbar {
            display: flex;
            margin: 1rem 0;
            justify-content: space-between;
            align-items: center;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#dt').DataTable();
        });
    </script>
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
        <div class="welcome-text">
          <div class="content-body">
            <div class="container-fluid">
              <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Pemilih</a></li>
                  </ol>
                </div>
              </div>
              <div class="toolbar">
                <a href="<?= base_url('admin/pemilih/tambah'); ?>" class="btn btn-primary">Tambah</a>
                <div>
                  <form class="form-inline ml-auto" method="get" action="<?= base_url('admin/pemilih'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control" name="search" placeholder="Cari Nama Pemilih">
                    </div>
                    <button type="submit" class="btn btn-success">Cari</button>
                  </form>
                </div>
              </div>
              <div class="container">
                    <div class="row mt-2">
                      <div class="col-12">

                      </div>
                      <div class="card">
                        <div class="card-body">
                          <?= form_open_multipart('admin/pemilih/uploaddata'); ?>
                            <div class="input-group mb-3">
                              <input type="file" class="form-control" id="importexcel" name="importexcel" accept=".xlsx,.xls">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                          <?= form_close(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Data Pemilih</h4>
                    </div>
                    <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error')) { ?>
                      <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table id="dt" class="table align-middle table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Pemilih</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>No. Induk</th>
                                <th>Status</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($pemilih as $data) : ?>
                            <tr>
                              <td><?= $no; ?></td>
                              <td><?= $data->nama_pemilih; ?></td>
                              <td><?= $data->jenis_kelamin; ?></td>
                              <td><?= $data->kelas; ?></td>
                              <td><?= $data->no_induk; ?></td>
                              <td>
                                <?php if ($data->status_pemilih == 'sudah_memilih') : ?>
                                  <p class="badge bg-success">Sudah Memilih</p>
                                <?php else : ?>
                                  <p class="badge bg-danger">Belum Memilih</p>
                                <?php endif; ?>
                              </td>
                              <td>
                                <a href="<?= base_url('admin/pemilih/ubah/' . $data->id_pemilih); ?>" class="btn btn-info">Edit</a>
                                <a href="<?= base_url('admin/pemilih/hapus/' . $data->id_pemilih); ?>" class="btn btn-danger">Hapus</a>
                                <a href="<?= base_url('admin/pemilih/reset_status/' . $data->id_pemilih); ?>" class="btn btn-warning">Reset Status</a>
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