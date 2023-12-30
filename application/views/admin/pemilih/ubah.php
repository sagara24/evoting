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
      <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Pemilih</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ubah</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ubah Pemilih</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form action="<?= base_url('admin/pemilih/subah'); ?>" method="POST">
                                    <?php foreach ($cari as $data): ?>
                                        <input type="hidden" name="kode" value="<?= $data->id_pemilih; ?>">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Nama Pemilih
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <input class="form-control" type="text" name="nama" placeholder="Enter full name" value="<?= $data->nama_pemilih; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Jenis Kelamin <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <select name="jekel" class="form-control">
                                                        <option value="<?= $data->jenis_kelamin; ?>"><?= $data->jenis_kelamin; ?></option>
                                                        <option value=">Pilih">--Pilih--</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Kelas <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <select name="kelas" class="form-control">
                                                        <option value="<?= $data->kelas; ?>"><?= $data->kelas; ?></option>
                                                        <option value=">Pilih">--Pilih--</option>
                                                        <option value="X DKV PA">X DKV PA</option>
                                                        <option value="X DKV PI">X DKV PI</option>
                                                        <option value="X PPLG PA">X PPLG PA</option>
                                                        <option value="X PPLG PI">X PPLG PI</option>
                                                        <option value="XI DKV PA">XI DKV PA</option>
                                                        <option value="XI DKV PI">XI DKV PI</option>
                                                        <option value="XI PPLG PA">XI PPLG PA</option>
                                                        <option value="XI PPLG PI">XI PPLG PI</option>
                                                        <option value="XII CC PA">XII CC PA</option>
                                                        <option value="XII CC PI">XII CC PI</option>
                                                        <option value="XII DMI PA">XII DMI PA</option>
                                                        <option value="XII DMI PI">XII DMI PI</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-password">No. Induk
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="no_induk" value="<?= $data->no_induk; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-password">Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <input type="password" class="form-control" name="password">
                                                    </div>
                                                </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="edit" class="btn btn-primary">Ubah</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </form>
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