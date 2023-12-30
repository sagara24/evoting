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
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Validation</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ubah Kandidat</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                  <form action="<?= base_url('admin/kandidat/subah'); ?>" method="POST" enctype="multipart/form-data">
                                    <?php
                                    foreach ($cari as $data) :
                                      ?>
                                      <input type="hidden" name="kode" value="<?= $data->id_kandidat; ?>">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Nama Kandidat
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <input class="form-control" type="text" name="nama" placeholder="Enter full name" value="<?= $data->nama_kandidat; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Nomor Kandidat <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <input class="form-control" type="text" name="nomor" placeholder="Nomor Kandidat" value="<?= $data->no_kandidat; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Visi & Misi
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="hidden" name="visi_misi" value="<?= $data->visi_misi; ?>">
                                                        <div id="editor" style="min-height: 160px;"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-password">Foto
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <input class="form-control-file" type="file" name="foto">
                                                    </div>
                                                    <?php endforeach; ?>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                                    <script>
                                        var quill = new Quill('#editor', {
                                            theme: 'snow',
                                            modules: {
                                                toolbar: [
                                                        [{ header: [1, 2, 3, 4, 5, 6, false] }],
                                                        [{ font: [] }],
                                                        ["bold", "italic"],
                                                        ["link", "blockquote", "code-block", "image"],
                                                        [{ list: "ordered" }, { list: "bullet" }],
                                                        [{ script: "sub" }, { script: "super" }],
                                                        [{ color: [] }, { background: [] }],
                                                ]
                                        },
                                        });
                                        quill.on('text-change', function(delta, oldDelta, source) {
                                            document.querySelector("input[name='visi_misi']").value = quill.root.innerHTML;
                                        });
                                    </script>
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