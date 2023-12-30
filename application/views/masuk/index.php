<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/smk salaf.png'); ?>">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form text-center">
                                    <img src="<?= base_url('assets/images/smk salaf.png'); ?>" alt="Image" class="img-fluid mb-4 mx-auto" style="max-width: 150px;">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form class="login-form" action="<?= base_url('masuk/aksi_login'); ?>" method="POST">
                                    <?php
                                    if($this->session->flashdata('error')) { ?>
                                        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                                    <?php    
                                    }
                                    ?>
                                        <div class="form-group">
                                          <label class="control-label">NO. INDUK</label>
                                          <input class="form-control" name="no_induk" type="text" placeholder="No. Induk" autofocus>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label">PASSWORD</label>
                                          <input class="form-control" type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
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


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets/vendor/global/global.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/quixnav-init.js'); ?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js'); ?>"></script>

</body>

</html>